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
Route::resource('/', 'CourseController');

Route::get('/query-2', 'CourseController@query2')->name('query-2');

Route::get('/query-3', function (){
    return view('query3');
});

Route::get('/query-4', 'CourseController@query4')->name('query-4');

Route::get('/query-5', function (){
    return view('query5');
});
// Route::get('/query-5', 'CourseController@query5')->name('query-5');

Route::get('/query-6', 'CourseController@query6')->name('query-6');
Route::get('/query-7', 'CourseController@query7')->name('query-7');
