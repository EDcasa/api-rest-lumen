<?php

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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'api/'], function($app){
	$app->get('/','LibrosController@listaLibros');
	$app->get('/autores','LibrosController@listaAutores');
	$app->get('/obras','LibrosController@listaAutoresLibros');

	$app->post('/registro-libro','LibrosController@registraLibros');
	$app->post('/registro-autor','LibrosController@registraAutores');

	$app->delete('/elimina-libro/{id}','LibrosController@eliminaLibros');
	$app->delete('/elimina-autor/{id}','LibrosController@eliminaAutores');

	$app->put('/edita-libro/{id}','LibrosController@editaLibros');
	$app->put('/edita-autor/{id}','LibrosController@editaAutores');
});

