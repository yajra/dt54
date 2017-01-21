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

use Symfony\Component\Finder\Finder;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/users', function () {
	return Datatables::of(App\User::with('posts', 'post'))->make(true);
});

Route::get('eloquent', 'EloquentController@index');
Route::get('eloquent/users-data', 'EloquentController@usersData');
foreach(Finder::create()->in(__DIR__.'/eloquent')->files() as $file) {
    require $file->getPathname();
}
Route::get('eloquent/{view}', 'EloquentController@display');
