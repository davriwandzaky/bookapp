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

$router->get('/', function () use ($router) {
    return $router->app->version();
    
});

//BOOKS
// Read
$router-> get ('books', 'BooksController@index');
$router-> get ('/books/{id}', 'BooksController@show');
//post
$router -> post ('books', 'BooksController@store');
//put
$router -> put ('books/{id}', 'BooksController@update');
//delete
$router -> delete ('books/{id}', 'BooksController@destroy');

//AUTHORS
// Read
$router-> get ('authors', 'AuthorsController@index');
$router-> get ('/authors/{id}', 'AuthorsController@show');
//post
$router -> post ('authors', 'AuthorsController@store');
//put
$router -> put ('authors/{id}', 'AuthorsController@update');
//delete
$router -> delete ('authors/{id}', 'AuthorsController@destroy');