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

//app()->singleton('example', function(){
//
//    return new \App\Example;
//
//});


//app()->singleton('twitter', function(){
//
//        return new \App\Services\Twitter('dfgdfgdfg');
//});


//
//Route::get('/', function (){
//
//    //dd(app('example'),app('example'));
//    dd(app('App\Example'));
//
//});

use App\Repositories\UserRepository;
use App\Services\Twitter;

//Route::get('/', function (Twitter $users){
//
//
//    dd($users);
//
//});


Route::get('/','PagesController@home');
Route::get('/about','PagesController@about');
//Route::get('/about', function () {
//    return view('about');
//});



Route::get('/contact','PagesController@contact');

/*
        GET /projects (index)

        GET /projects/create (create)

        GET /projects/1 (show)

        POST /projects (store)

        PUT

        GET /projects/1/edit (edit)

        PACTH /projects/1 (update)

        DELETE /projects/1 (destory)

 */

Route::resource('/projects','ProjectsController')
    ->middleware('can:update,project')
    ->except('index');

Route::get('/projects/create','ProjectsController@create');
Route::post('/projects', 'ProjectsController@store');
Route::get('/projects','ProjectsController@index');
//Route::resource('projects','ProjectsController');

Route::post('/projects/{project}/tasks','ProjectTasksController@store');
Route::patch('/tasks/{task}','ProjectTasksController@update');
Route::get('tasks/{task}/remove','ProjectTasksController@remove');
//Route::get('/projects/{project}/remove','ProjectsController@remove' );
//Route::get('/projects','ProjectsController@index');
//Route::get('/projects/create','ProjectsController@create');
//Route::get('/projects/{project}','ProjectsController@show');
//Route::post('/projects', 'ProjectsController@store');
//Route::get('/projects/{project}/edit','ProjectsController@edit' );
//Route::patch('/project/{project}','ProjectsController@update');
//Route::delete('/project/{project}','ProjectsController@destroy');




//Route::get('/', function () {
//    $tasks = [
//        'Go to the store',
//        'Go to the market',
//        'Go to work',
//        'Go to concert'
//    ];
//
////    return view('welcome', [
////        'tasks' => $tasks,
////        'foo' => 'foobar'
////    ]);
//
//    return view ('welcome')->withTasks($tasks)->withFoo('foo'); // Above commended code works same with this line.
//
//});


//Route::get('about', function () {
//    return view('about');
//});
//
//Route::get('contact', function () {
//    return view('contact');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'PagesController@home');
