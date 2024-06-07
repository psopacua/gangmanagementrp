<?php
/**
 * Bekende Vloggende Nederlanders
 */

namespace App\Http\Controllers;

use App\Models\Vlogger;

/**
 * Class VloggerController
 *
 * @package App\Http\Controllers
 */
class VloggerController extends Controller
{
    public function view($vloggerId)
    {
        $vlogger = Vlogger::with('videos')->findOrFail($vloggerId);
        $mainVideo = $vlogger->videos()
                             ->first();

        return view('view', [
            'vlogger'   => $vlogger,
            'mainVideo' => $mainVideo
        ]);
    }
}
