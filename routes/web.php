
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

use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/contact', function () {
    return view('layouts.about');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('threads', 'ThreadsController@index');
Route::get('threads/create', 'ThreadsController@create');

Route::get('/threads/search', 'SearchController@index');



Route::get('threads/{channel}/{thread}', 'ThreadsController@show');
Route::patch('threads/{channel}/{thread}', 'ThreadsController@update');
Route::delete('threads/{channel}/{thread}', 'ThreadsController@destroy');

Route::post('threads', 'ThreadsController@store');

Route::post('channelcreate', 'ThreadsController@storeChannel');

Route::get('threads/{channel}', 'ThreadsController@index');
Route::get('/threads/{channel}/{thread}/replies', 'RepliesController@index');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');
Route::patch('/replies/{reply}', 'RepliesController@update');
Route::delete('/replies/{reply}', 'RepliesController@destroy')->name('replies.destroy');

Route::post('/replies/{reply}/best', 'BestRepliesController@store')->name('best-replies.store');

Route::post('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@store')->middleware('auth');
Route::delete('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@destroy')->middleware('auth');


Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('/replies/{reply}/favorites', 'FavoritesController@destroy');


Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
Route::get('/profiles/{user}/notifications', 'userNotificationsController@index');
Route::delete('/profiles/{user}/notifications/{notification}', 'UserNotificationsController@destroy');

Route::get('api/users','Api\UsersController@index');
Route::post('api/users/{user}/avatar','Api\UserAvatarController@store')->middleware('auth')->name('avatar');

Route::get('/admin', 'AdminController@index')->middleware('auth');

Route::get('/admin/threads', 'AdminController@show')->name('admin.thread')->middleware('auth');

Route::get('/admin/user', 'AdminController@user')->name('admin.user')->middleware('auth');

Route::delete('threads/{channel}/{thread}', 'AdminController@destroy')->name('admin.destroy');

Route::delete('admin/user/delete/{id}', 'AdminController@userDestroy')->name('admin.userDestroy');




