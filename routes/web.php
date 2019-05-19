<?php

// use App\Target;

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


Route::group(['middleware' => ['web']], function(){
    
    Route::get('/', function () {
        if(Auth::check()){
            return view('welcome');
        }else{
            return redirect('/login');
        }
    });
    Route::auth();

    Route::resource('users', 'UsersController', ['only' => 'show']);

    Route::post('upload', 'UsersController@upload');

    Route::resource('targets', 'TargetsController');
    
    Route::resource('targets.tasks', 'TasksController', ['only' => ['store', 'update', 'destroy']]);
    
    Route::get('targets/{id}/delete', 'TargetsController@destroy');
    
    Route::resource('buckets', 'BucketsController', ['only' => ['index', 'store', 'update', 'destroy']]);
    
    Route::get('/time', 'TargetsController@passedTime');

    Route::get('/duetime', 'TargetsController@dueTime');

});
