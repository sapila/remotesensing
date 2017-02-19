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

use App\FieldImage;

$app->get('/', function () use ($app) {
    echo 'alll here ' . '<br>';
    echo PHP_EOL . $app->version();
    return $fieldImage = FieldImage::where('id', 8)->first();
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

//Event Comments
$app->get('/api/images/events/{image_id}/getcomments', 'ImageController@getEventComments');
$app->post('/api/images/events/{image_id}/postcomments', 'ImageController@addEventComment');
$app->delete('/api/images/events/comments/{comment_id}', 'ImageController@deleteEventComment');


//Field Images
$app->get('/api/images/fields/{image_id}', 'ImageController@fieldImage');
$app->get('/api/images/fields/{image_id}/delete', 'ImageController@deleteFieldImage');
// Field Comments
$app->get('/api/images/fields/{image_id}/comments', 'ImageController@getFieldComments');
$app->post('/api/images/fields/{image_id}/comments', 'ImageController@addFieldComment');
$app->delete('/api/images/fields/comments/{comment_id}', 'ImageController@deleteFieldComment');




// Event Images
$app->get('/api/images/events/{image_id}', 'ImageController@eventImage');
$app->get('/api/images/events/{image_id}/delete', 'ImageController@deleteEventImage');

$app->post('/api/images/events/{image_id}/comments', 'EventController@addImage');
$app->get('/api/images/events/{image_id}/comments', 'EventController@getImages');

