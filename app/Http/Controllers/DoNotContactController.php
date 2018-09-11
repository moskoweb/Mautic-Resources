<?php

namespace App\Http\Controllers;

use App\Settings;

class DoNotContactController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( ! Settings::hasSettings() || ! Settings::mauticValidate()) {
            return redirect()->route('settings.index');
        }
        $segments = Settings::mauticNewApi('segments')->getList(null, null, 5000)['lists'];

        return view('model.do-not-contact.index', compact('segments'));
    }

    public function check($id)
    {
        $segments = Settings::mauticNewApi('contacts')->getList(urlencode('segment:"' . $id . '"'), null, 5000);
        dd($segments);
        return $id;
    }
}
