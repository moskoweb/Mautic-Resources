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
        $filter = 'segment:' . $id;

        $contacts = Settings::mauticNewApi('contacts')->getList($filter, null, 5000)['contacts'];
        foreach ($contacts as $contact) {
            Settings::mauticNewApi('contacts')->addDnc($contact['id'], 'Mautic Resources - Api', null, null, 'Marcado como "Não Contactar" manualmente.');
        }
        return redirect()->route('do-not-contact.index');
    }
}
