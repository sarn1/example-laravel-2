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
  $data = [
    'name'=>'jane'
    , 'email'=>'jane@jane.com'
  ];
  return View::make('welcome',$data);

  // alternative syntax
  // return View::make('welcome')->with('name','friend');
  // return View::make('welcome')->withName('friend'); <-- withVariableName
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

//single vs all actions
Route::get('/todos', function () {
  return View::make('todos');
});

Route::get('/todos/{id}', function ($id) {
  return View::make('todos-single')->withId($id);
});


//restful
/*
 * /todo = all
 * /todo/1 = show
 * /todo/1/edit = edit and replace
 * /todo/1/create = create
 */

//create manually
Route::get('/todolist', 'TodoListController@index');
Route::get('/todolist/create', 'TodoListController@create');
Route::get('/todolist/{id}', 'TodoListController@show');

//creates all restful pattern for TodoListController
Route::resource('todo','TodoListController');

//test db
Route::get('/db', function () {

  // Query Builders: https://laravel.com/docs/5.4/queries

  //return DB::select('select database();');
  //return DB::select('show tables;');

  // select *
  //return DB::table('todo_lists')->get();

  // insert
  /*
  DB::table('todo_lists')->insert([
    'name' => 'Your List'
  ]);
  return DB::table('todo_lists')->get();
  */

  // chaining
  $r = DB::table('todo_lists')->where('name','Your List')->first();
  return $r->name;
});
