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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', 'ExampleController@generateKey');



$router->group(['prefix' => 'pemilik'], function() use ($router){
    $router->get('info',function(){

    });

    $router->get('home',['middleware' => 'role', function(){
        return 'Access Granted';
    }]);
    
    $router->get('fail', function(){
        return ('Access Denied');
    });
});

$router->group(['prefix' => 'registration'], function() use ($router){
    $router->get('pemilik',['middleware' => 'role'], function(){
        return 'Access Granted';
    });

    $router->get('fail', function(){
        return ('Access Denied');
    });

    $router->post('pegawai',function(){
        
    });
});