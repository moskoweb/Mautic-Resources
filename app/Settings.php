<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mautic\Auth\ApiAuth;
use Mautic\MauticApi;

class Settings extends Model
{
    public static function setSettings($value)
    {
        if (ends_with($value['mautic']['url'], '/')) {
            $value['mautic']['url'] = str_replace_last('/', '', $value['mautic']['url']);
        }
        return setcookie("mautic_manager", json_encode($value), time() + (3600 * 24), '/');
    }

    public static function getSettings()
    {
        return json_decode($_COOKIE['mautic_manager']);
    }

    public static function hasSettings()
    {
        return isset($_COOKIE['mautic_manager']);
    }

    public static function mauticNewApi($type)
    {
        $settings = array(
            'userName' => Settings::getSettings()->mautic->user,
            'password' => Settings::getSettings()->mautic->pass,
        );

        $initAuth = new ApiAuth();
        $auth = $initAuth->newAuth($settings, 'BasicAuth');

        $api = new MauticApi();
        return $api->newApi($type, $auth, Settings::getSettings()->mautic->url);
    }

    public static function mauticValidate()
    {
        $user = Settings::mauticNewApi('users')->getSelf();
        return (isset($user['errors'])) ? false : true;
    }
}
