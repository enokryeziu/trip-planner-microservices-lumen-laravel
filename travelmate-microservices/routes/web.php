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

$router->group(['prefix' => 'api/v1/country'], function($app)
{
	$app->post('add','CountryController@create');
	$app->get('view/{id}','CountryController@show');
	$app->put('edit/{id}','CountryController@update');
	$app->delete('delete/{id}','CountryController@destroy');
	$app->get('index','CountryController@index');
    $app->get('{name}','CountryController@getByName');
});
$router->group(['prefix' => 'api/v1/city'], function($app)
{
	$app->post('add','CityController@create');
	$app->get('view/{id}','CityController@show');
	$app->put('edit/{id}','CityController@update');
	$app->delete('delete/{id}','CityController@destroy');
	$app->get('index','CityController@index');
	$app->get('countryName/{name}','CityController@getCityCountry');
});
$router->group(['prefix' => 'api/v1/type'], function($app)
{
	$app->post('add','TypeController@create');
	$app->get('view/{id}','TypeController@show');
	$app->put('edit/{id}','TypeController@update');
	$app->delete('delete/{id}','TypeController@destroy');
	$app->get('index','TypeController@index');
});
$router->group(['prefix' => 'api/v1/places'], function($app)
{
	$app->post('add','PlacesController@create');
	$app->get('view/{id}','PlacesController@show');
	$app->put('edit/{id}','PlacesController@update');
	$app->delete('delete/{id}','PlacesController@destroy');
	$app->get('index','PlacesController@index');
    $app->get('bycityid/{id}','PlacesController@getPlacesByCityId');
    $app->get('bycityname/{name}','PlacesController@getPlacesByCityName');
});