<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return "test";
});

Route::options('*', function () {
    $response = Response::make('');
    $response->header('Access-Control-Allow-Origin', '*');
    $response->header('Access-Control-Allow-Methods', 'POST, GET, DELETE,  OPTIONS');
    $response->header('Access-Control-Allow-Headers', 'X-Requested-With');
    return $response;
});


Route::get('/users', 'UserController@index');
Route::get('/login', 'UserController@GetLogin');
Route::post('/signup', 'UserController@SignUp');
//::get('/user/{id}', 'userController@show');

/***** Title ****/
Route::get('/alltitle/{user_id}', 'TodoListController@AllTitle');
Route::get('/addtitle', 'TodoListController@AddTitle');
Route::patch('/updatetitle/{id}','TodoListController@updateTitle');
Route::delete('title/{id}', 'TodoListController@delete');

/***** Items ****/
Route::get('/addlist', 'ListItemsController@AddList');

