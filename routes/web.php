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

<<<<<<< HEAD
Route::get('/post/view', function () {
    return view('post.view');
});

Route::get('/profile', function () {
    return view('user.profile.update');
});
=======
Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['can:admin-panel']
    ],
    function () {
        Route::get('/', 'HomeController@index')->name('home');
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
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('post', 'PostsController');
    }
);
>>>>>>> 665b01d5ec86acb1e37f12a34bf049938a654b09
