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

// Route::get('ingredients', 'IngredientController@index');
// Route::get('ingredients/{ingredient}', 'IngredientController@show');
// Route::post('ingredients', 'IngredientController@store');
// Route::put('ingredients/{ingredient}', 'IngredientController@update');
// Route::delete('ingredients/{ingredient}', 'IngredientController@delete');

Route::get('ingredients', 'IngredientController@index');
Route::get('ingredients/find', 'IngredientController@show');
Route::post('ingredients', 'IngredientController@store');
Route::put('ingredients/{title}', 'IngredientController@update');
Route::delete('ingredients/{title}', 'IngredientController@delete');



Route::get('ingredients/search/result', 'SearchController@result');


Route::get('/tmp-ingredients', 'TmpIngredientController@index');
Route::get('tmp-ingredients/find', 'TmpIngredientController@show');
Route::get('tmp-ingredients/select', 'TmpIngredientController@showFiveResults');
Route::put('tmp-ingredients/{id}', 'TmpIngredientController@update');
Route::post('/tmp-ingredients', 'TmpIngredientController@store');

// Route::get('ingredients', 'IngredientController@index');
// Route::get('ingredients/{id}', 'IngredientController@show');
// Route::get('ingredients/find', 'IngredientController@find');
// Route::post('ingredients', 'IngredientController@store');
// Route::put('ingredients/{id}', 'IngredientController@update');



// Route::get('ingredients/search/result', 'SearchController@result');


// Route::get('tmp-ingredients', 'TmpIngredientController@index');
// Route::get('tmp-ingredients/{id}', 'TmpIngredientController@show');
// Route::get('tmp-ingredients/find', 'TmpIngredientController@find');
// Route::get('tmp-ingredients/select', 'TmpIngredientController@showFiveResults');
// Route::put('tmp-ingredients/{id}', 'TmpIngredientController@update');
// Route::post('tmp-ingredients', 'TmpIngredientController@store');