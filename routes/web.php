<?php
/**
 * Bekende Vloggende Nederlanders
 */

/** Defaults */
Route::get('/', 'HomeController@index')->name('home');

/** Favorites */
Route::prefix('favorites')->middleware('auth')
                          ->group(function () {
    Route::get('/',      'FavoritesController@index')->name('favorites');
    Route::get('change', 'FavoritesController@showChangeForm')->name('favorites.change');
});

/** Account */
Route::get('register',  'Auth\RegisterController@showRegistrationForm')->name('account.create');
Route::post('register', 'Auth\RegisterController@register');

Route::get('login',     'Auth\LoginController@showLoginForm')->name('account.login');
Route::post('login',    'Auth\LoginController@login');

Route::get('account',   'AccountController@showUpdateForm')->name('account.update');
Route::post('account',  'AccountController@update');

Route::get('logout',    'Auth\LoginController@logout')->name('account.logout');

/** Vlogger */
Route::prefix('vlogger/{vlogger_id}')->group(function () {
    Route::get('/{video_id?}', 'VloggerController@view');
});

/** Administration */
Route::namespace('Admin')->prefix('admin')
                         ->middleware('auth')
                         ->group(function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    /** Administration: Vloggers */
    Route::prefix('vloggers')->group(function () {
        Route::get('/', 'VloggersController@index')->name('admin.vloggers');

        Route::get('add',  'VloggersController@showAddForm')->name('admin.vloggers.add');
        Route::post('add', 'VloggersController@add');

        Route::get('edit/{vlogger_id}',  'VloggersController@showUpdateForm')->name('admin.vloggers.edit');
        Route::post('edit/{vlogger_id}', 'VloggersController@update');
    });
});
