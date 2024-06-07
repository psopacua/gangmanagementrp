<?php
/**
 * Bekende Vloggende Nederlanders
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as DefaultController;
use Illuminate\Support\Facades\Auth;

/**
 * Class Controller
 *
 * @package App\Http\Controllers\Api
 */
class Controller extends DefaultController
{
    /**
     * Get auth by guard.
     *
     * @return mixed
     */
    protected function getAuth()
    {
        return Auth::guard('api');
    }
}
