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

Route::get('/',function(){
  if(Session::has('utilisateur'))
    return view('index');
  else
    return view('login');
});

Route::get('inscription',function(){
  if(Session::has('utilisateur'))
    return view('index');
  else return view('signup');
});

Route::get('/lostpw',function(){
  if(Session::has('utilisateur'))
    return view('index');
  else return view('lostpw');
});

Route::post('/','ControllerConnexion@connexion');
Route::post('/deconnexion','ControllerConnexion@deconnexion');
Route::post('/inscription','ControllerInscription@inscription');

/*Route::post('/',function(){
	return 'test';
});*/