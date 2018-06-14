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


Auth::routes();
Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/category/{category_path}', 'HomeController@category')->name('category')->where('category_path', '.+');

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['can:admin-panel']
    ],
    function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('category', 'CategoriesController');
        Route::resource('users', 'UsersController')->only(['index']);
        Route::post('users/verify/{user}', 'UsersController@verify')->name('users.verify');
    }
);

Route::group(
    [
        'prefix' => 'cabinet',
        'as' => 'cabinet.',
        'namespace' => 'Cabinet',
        'middleware' => ['auth']
    ],
    function () {
        Route::get('/', 'PostsController@index')->name('home');
        Route::resource('post', 'PostsController');
    }
);
