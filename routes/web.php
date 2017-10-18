<?php

Route::get('/', function () {
   return view('welcome');
});


// -- A single page app using Vue-Router needs this to allow you to type in Uri's...
Route::any('{all}', function () {
   	return view('welcome'); 
});
