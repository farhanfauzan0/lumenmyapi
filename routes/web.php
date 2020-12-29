<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Support\Facades\Crypt;
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

$router->get('/id/{id}', function($id)
{
    return 'User '. $id;
});

$router->get('/key', function() {
    // return \Illuminate\Support\Str::random(32);
    //return Crypt::encrypt('123456');
    return sha1(time());
    
    // date_default_timezone_set('Asia/Jakarta');
    
    // $date = date('H:i:s');
    
    // if ($date >= '14:50:00') {
    //     $ket = "Its Time";
    // }else{
    //     $ket = "Nope";
    // }
    // return $date;
    
});

$router->get('/', function () use ($router) {
    $res['success'] = true;
    $res['result'] = "Hello";
    return response($res);
});

$router->group(['middleware' => 'auth', 'prefix' => '/api/v1'], function() use ($router){
    $router->post('/user/saldo/{id}', ['uses' =>  'DataController@index']);
    $router->get('/user/{id}', ['uses' =>  'UserController@get_user']);
    $router->get('/user/saldo/{id}', ['uses' =>  'DataController@index']);

    $router->get('/ceksaldo/{id}', ['uses' => 'DataController@getapi']);
});

$router->group(['prefix' => '/api/v1'], function() use ($router)
{
    $router->get('/bpkh/saldo', []);
});

$router->get('/testreq', ['uses' => 'DataController@getapi']);

$router->post('/login', 'LoginController@index');
$router->post('/register', 'UserController@register');




