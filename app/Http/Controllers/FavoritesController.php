<?php
/**
 * Bekende Vloggende Nederlanders
 */

namespace App\Http\Controllers;

/**
 * Class FavoritesController
 *
 * @package App\Http\Controllers
 */
class FavoritesController extends Controller
{
    public function showChangeForm()
    {
        return view('favorites.change');
    }
}
