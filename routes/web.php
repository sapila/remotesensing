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
    return url('uploads/');
});

// Fields
$app->get('/api/{device_id}/fields', 'FieldController@index');
$app->post('/api/{device_id}/fields', 'FieldController@create');
$app->put('/api/{device_id}/fields/{field_id}', 'FieldController@update');
$app->delete('/api/{device_id}/fields/{field_id}', 'FieldController@delete');

// Field images
$app->post('/api/{device_id}/fields/{field_id}/image', 'FieldController@addImage');
$app->get('/api/{device_id}/fields/{field_id}/images', 'FieldController@getImages');

// Events
$app->get('/api/{device_id}/events', 'EventController@index');
$app->post('/api/{device_id}/events', 'EventController@create');
$app->put('/api/{device_id}/events/{event_id}', 'EventController@update');
$app->delete('/api/{device_id}/events/{event_id}', 'EventController@delete');

$app->post('/api/{device_id}/events/{event_id}/image', 'EventController@addImage');
$app->get('/api/{device_id}/events/{event_id}/images', 'EventController@getImages');


//Images
$app->get('/api/images/fields/{image_id}', 'ImageController@fieldImage');

$app->get('/api/images/events/{image_id}', 'ImageController@eventImage');

