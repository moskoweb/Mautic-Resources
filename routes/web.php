<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('tags-manager', 'TagsManagerController');
Route::get('tags-manager/{tagsManager}/delete', 'TagsManagerController@delete')->name('tags-manager.delete');
Route::resource('settings', 'SettingsController');
Route::resource('do-not-contact', 'DoNotContactController');
Route::get('do-not-contact/{id}/check', 'DoNotContactController@check')->name('do-not-contact.check');
