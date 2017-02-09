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
    echo 'alll here ' . '<br>';
    echo PHP_EOL . $app->version();
    return PHP_EOL.'lol';
});

$app->get('/api/{device_id}/fields', 'FieldController@index');
$app->post('/api/{device_id}/fields', 'FieldController@create');
$app->put('/api/{device_id}/fields/{field_id}', 'FieldController@update');
$app->delete('/api/{device_id}/fields/{field_id}', 'FieldController@delete');

$app->get('/api/{device_id}/events', 'EventController@index');
$app->post('/api/{device_id}/events', 'EventController@create');
$app->put('/api/{device_id}/events/{event_id}', 'EventController@update');
$app->delete('/api/{device_id}/events/{event_id}', 'EventController@delete');
