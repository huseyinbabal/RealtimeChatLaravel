<?php

Route::get('/chat', '\App\Http\Controllers\Chat\ChatController@getChat');

Route::get('/login', '\App\Http\Controllers\Chat\ChatController@getLogin');

Route::get('/messages', '\App\Http\Controllers\Chat\ChatController@listMessages');

Route::post('/messages', '\App\Http\Controllers\Chat\ChatController@saveMessage');
