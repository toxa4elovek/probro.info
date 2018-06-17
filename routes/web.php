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

Route::get('/post/{slug}', 'PostController@show')->name('post.show');

Route::get('/profile', function () {
    return view('user.profile.update');
});

Route::get('/about_us',function () {
    return view('footer.about');
});

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
        Route::resource('posts', 'PostsController');
        Route::post('/posts/activate/{post}', 'PostsController@activate')->name('posts.activate');
        Route::post('/posts/moderate/{post}', 'PostsController@moderate')->name('posts.moderate');
        Route::put('/seo/update/{post}', 'Post\SeoController@update')->name('posts.seo.update');
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
        Route::get('/profile', 'HomeController@profile')->name('profile');
        Route::resource('post', 'PostsController')->except('show');
        Route::post('/post/moderate/{post}', 'PostsController@moderate')->name('post.moderate');
        Route::put('/profile/update/{user}', 'UsersController@update')->name('profile.update');
        Route::put('/profile/change-password/{user}', 'UsersController@changePassword')->name('profile.changePassword');
    }
);
