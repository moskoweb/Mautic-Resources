<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Settings::hasSettings()) {
            $mauticValidate = Settings::mauticValidate();
            $settings = Settings::getSettings();
            return view('model.settings.edit', compact('settings', 'mauticValidate'));
        } else {
            return view('model.settings.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Settings::setSettings($request->settings);

        return redirect()->route('settings.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $settings)
    {
        Settings::setSettings($request->settings);

        return redirect()->route('settings.index');
    }
}
