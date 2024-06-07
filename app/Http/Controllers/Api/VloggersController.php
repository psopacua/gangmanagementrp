<?php
/**
 * Bekende Vloggende Nederlanders
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\Vlogger;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 * Class VloggersController
 *
 * @package App\Http\Controllers\Api
 */
class VloggersController extends Controller
{
    /**
     * Return all vloggers
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        $vloggers = $this->getVloggers();

        return response($vloggers->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Get vloggers based on authentication.
     *
     * @return Vlogger[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|null
     */
    private function getVloggers()
    {
        $auth = $this->getAuth();

        if ($auth->check()) {
            $vloggers = $auth->user()
                             ->vloggers()
                             ->with('videos')
                             ->withPivot('order')
                             ->orderBy('vlogger_user.order')
                             ->get();
        } else {
            $vloggers = Vlogger::with('videos')->get();
        }

        return $vloggers;
    }
}
