<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controller\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function(){
    $errore = false;
    return view('login')
    ->with('csrf_token', csrf_token())
    ->with('errore', $errore);
});


Route::get("/login", "LoginController@login")->name("login");
Route::get("/logout", "LoginController@logout")->name("logout");
Route::post("login", "LoginController@checkLogin")->name("login");
Route::get('login/{errore}', "HomeController@check");

Route::get('/register', "RegisterController@index")->name('register');
Route::post('/register', "RegisterController@create");
Route::get('/register/email/{query}', "RegisterController@checkEmail");
Route::get('/register/username/{q}', "RegisterController@checkUsername");

Route::get("/chirurgo", "ChirurgoController@chirurgo")->name("chirurgo");
Route::get('/ospedale', "OspedaleController@ospedale")->name('ospedale');
Route::get('/rubrica', "RubricaController@rubrica")->name('rubrica');

Route::post('commenti', 'CommentsController@comments');
Route::get('show', "CommentsController@show");
Route::get('/commenti', "CommentsController@commenti")->name('commenti');

Route::get("/homePage", "HomePageController@v")->name("homePage");
Route::get('/home', "HomeController@index")->name('home');

Route::get("chirurgo_fetch", "ChirurgoController@show");
Route::get("ospedale_fetch", "OspedaleController@showOsp");

Route::get("api1", "ChirurgoController@search");
Route::get("api2", "ChirurgoController@search1");
Route::get("API/{query}", "HomeController@API");

Route::get("operazione1_fetch", "ChirurgoController@operation1");
Route::get("fetch_ospOp1", "OspedaleController@ospOp");

Route::post("aggiungi", "ChirurgoController@aggiungi");

Route::get("mostra", "RubricaController@mostra");
Route::get("remove/{nome}", "RubricaController@remove");


?>