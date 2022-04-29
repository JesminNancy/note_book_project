<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->post('/registration', 'RegistrationController@onRegister');
$router->post('/login', 'LoginController@onLogin');

// $router->post('/token', ['middleware'=>'auth', 'uses'=>'LoginController@tokenTest']);

$router->post('/insert', ['middleware'=>'auth', 'uses'=>'NoteBookController@onInsert']);
$router->post('/select', ['middleware'=>'auth', 'uses'=>'NoteBookController@onSelect']);
$router->post('/update', ['middleware'=>'auth', 'uses'=>'NoteBookController@onUpdate']);
$router->post('/delete', ['middleware'=>'auth', 'uses'=>'NoteBookController@onDelete']);