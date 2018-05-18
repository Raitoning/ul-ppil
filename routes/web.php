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
    return redirect('accueil');
  else
    return view('login');
});

Route::get('/inscription',function(){
  if(Session::has('utilisateur'))
    return redirect('accueil');
  else return view('signup');
});

Route::get('/lostpw',function(){
  if(Session::has('utilisateur'))
    return redirect('accueil');
  else return view('lostpw');
});

Route::get('/contacts',function(){
	if(Session::has('utilisateur'))
		return view('contacts');
	else return redirect('login');
});

Route::get('/account',function(){
	if(Session::has('utilisateur'))
		return view('account');
	else return redirect('login');
});

Route::get('/accueil',function(){
	if(Session::has('utilisateur'))
		return view('accueil');
	else return redirect('login');	
});


Route::post('/','ControllerConnexion@connexion');
Route::post('/deconnexion','ControllerConnexion@deconnexion');
Route::post('/inscription','ControllerInscription@inscription');