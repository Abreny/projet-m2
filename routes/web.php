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


Route::get('/', 'EtudiantController@index')->name('accueil');;

Route::prefix('etudiant')->group(function () {
    Route::get('/', 'EtudiantController@index')->name('index_etudiant');
    Route::get('nouveau', 'EtudiantController@nouveau')->name('nouveau_etudiant');
    Route::post('create', 'EtudiantController@create')->name('create_etudiant');
    Route::get('edit/{id}', 'EtudiantController@edit')->where('id','[0-9]*')->name('edit_etudiant');
    Route::post('update/{id}', 'EtudiantController@update')->where('id','[0-9]*')->name('update_etudiant');
    Route::get('delete/{id}', 'EtudiantController@delete')->where('id','[0-9]*')->name('delete_etudiant');
});

Route::prefix('matiere')->group(function () {
    Route::get('/', 'MatiereController@index')->name('index_matiere');
    Route::get('nouveau', 'MatiereController@nouveau')->name('nouveau_matiere');
    Route::post('create', 'MatiereController@create')->name('create_matiere');
    Route::get('edit/{id}', 'MatiereController@edit')->where('id','[0-9]*')->name('edit_matiere');
    Route::post('update/{id}', 'MatiereController@update')->where('id','[0-9]*')->name('update_matiere');
    Route::get('delete/{id}', 'MatiereController@delete')->where('id','[0-9]*')->name('delete_matiere');
});

Route::prefix('note')->group(function () {
    Route::get('/', 'NoteController@index')->name('index_note');
    Route::get('nouveau', 'NoteController@nouveau')->name('nouveau_note');
    Route::post('create', 'NoteController@create')->name('create_note');
    Route::get('edit/{id}', 'NoteController@edit')->where('id','[0-9]*')->name('edit_note');
    Route::post('update/{id}', 'NoteController@update')->where('id','[0-9]*')->name('update_note');
    Route::get('delete/{id}', 'NoteController@delete')->where('id','[0-9]*')->name('delete_note');
});
