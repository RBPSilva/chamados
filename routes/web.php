<?php

Route::group(['middleware' => ['auth'], 'namespace' => 'admin', 'prefix' => 'admin'], function(){
    
    Route::get('anexo/{image?}', 'ChamadoController@donloadAnexo')->name('anexo');
    Route::resource('chamado','ChamadoController');
    Route::get('desenvolvimento', 'ChamadoController@desenvolvimento')->name('desenvolvimento');
    Route::get('validar', 'ChamadoController@validar')->name('validar');
    Route::get('fechado', 'ChamadoController@fechado')->name('fechado');
    Route::post('editarChamado', 'ChamadoController@editarChamado')->name('editarChamado');
    Route::get('chamados', 'ChamadoController@register')->name('chamados');
    Route::get('chamado', 'ChamadoController@index')->name('chamado');
    Route::resource('user','Usercontroller');
    Route::get('register', 'UserController@register')->name('register.user');
    Route::post('editUser', 'UserController@editUser')->name('editUser');
    Route::get('user', 'UserController@index')->name('user');
    Route::get('/', 'AdminController@index')->name('admin.home');
});

//Route::get('admin', 'Site\SiteController@index');
Route::get('/', 'Site\SiteController@index');

//php artisan make:model --migration --controller Models\ChamadoItem --resource 

Auth::routes();



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
