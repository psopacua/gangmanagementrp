<?php
/**
 * Bekende Vloggende Nederlanders
 */

Route::resource('/videos', 'VideosController', [
    'except' => ['create', 'edit', 'update', 'delete', 'store']
]);

/**
 * API Route's
 */
Route::namespace('Api')->group(function () {
    /** Vloggers */
    Route::prefix('vloggers')->group(function () {
        Route::get('/', 'VloggersController@index');
    });

    /** Favorites */
    Route::prefix('favorites')->group(function () {
        Route::get('/', 'FavoritesController@index');

        Route::post('/', 'FavoritesController@update');
    });
});
