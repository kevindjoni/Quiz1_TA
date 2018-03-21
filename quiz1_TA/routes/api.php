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

Route::middleware('auth:api')->get('/user', function (Request $request)
{
    return $request->user();
});

Route::get('/userList', "UserController@UserList");
Route::post('/createUser', "UserController@CreateUser");
Route::get('/findUser/{id}', "UserController@FindUser");
Route::delete('/deleteUser/{id}', "UserController@DeleteUser");
Route::put('/updateUser/{id}', "UserController@Update");

Route::get('/itemList', "ItemController@ItemList");
Route::post('/insertItem', "ItemController@InsertItem");
Route::get('/findItem/{id}', "ItemController@FindItem");
Route::delete('/deleteItem/{id}', "ItemController@DeleteItem");
Route::get('/updateItem/{id}', "ItemController@Update");

Route::get('/showDetails', "UserController@ShowRelationship");
