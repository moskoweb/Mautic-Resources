<?php

namespace App\Http\Controllers;

use App\Settings;
use App\TagsManager;
use Illuminate\Http\Request;

class TagsManagerController extends Controller
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
        $tags = Settings::mauticNewApi('tags')->getList(null, null, 5000)['tags'];

        return view('model.tags-manager.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('model.tags-manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'tag' => $request->tag,
        );

        $tag = Settings::mauticNewApi('tags')->create($data);

        return redirect()->route('tags-manager.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TagsManager  $tagsManager
     * @return \Illuminate\Http\Response
     */
    public function edit($tagsManager)
    {
        $tag = Settings::mauticNewApi('tags')->get($tagsManager)['tag'];

        return view('model.tags-manager.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TagsManager  $tagsManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tagsManager)
    {
        $data = array(
            'tag' => $request->tag,
        );

        $tag = Settings::mauticNewApi('tags')->edit($tagsManager, $data, false);

        return redirect()->route('tags-manager.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TagsManager  $tagsManager
     * @return \Illuminate\Http\Response
     */
    public function delete($tagsManager)
    {
        $tag = Settings::mauticNewApi('tags')->delete($tagsManager);

        return redirect()->route('tags-manager.index');
    }
}
