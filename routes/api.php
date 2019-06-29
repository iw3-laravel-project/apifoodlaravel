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
    return $request->user();
});

Route::get('ingredients', 'IngredientController@index');
Route::get('ingredients/{ingredient}', 'IngredientController@show');
Route::post('ingredients', 'IngredientController@store');
Route::put('ingredients/{ingredient}', 'IngredientController@update');
Route::delete('ingredients/{ingredient}', 'IngredientController@delete');


Route::get('ingredients/search/result', 'SearchController@result');
