<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return View::make('welcome',$data);
  // alternative syntax
  // return View::make('hello')->with('name','friend');
  //return View::make('hello')->withName('friend'); <-- withVariableName
});

Route::get('/hello/{name?}', function ($name = 'world') {
    return View::make('hello',['name'=>$name]);
});

//pass data as individual variables
Route::get('/foundation', function () {
    return View::make('foundation')->with(
      [
        'name'=>'jane'
        , 'email'=>'jane@jane.com'
        , 'location'=>'chicago'
      ]
    );
});

//pass data as array
Route::get('/foundation-array', function () {
    return View::make('foundation-array')->withData(
      [
        'name'=>'jane'
        , 'email'=>'jane@jane.com'
        , 'location'=>'chicago'
        , 'stuff'=>'<script>alert("test")</script>chicago</a>'
      ]
    );
});
