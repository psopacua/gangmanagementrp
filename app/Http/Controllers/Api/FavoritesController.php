<?php
/**
 * Bekende Vloggende Nederlanders
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\User;
use App\Models\Vlogger;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class VloggersController
 *
 * @package App\Http\Controllers\Api
 */
class FavoritesController extends Controller
{
    /**
     * Return all vloggers
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        $vloggers = $this->getFavorites();

        return response($vloggers->jsonSerialize(), Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        $this->updateFavorites($request->all());

        return response([
            'succeed' => true
        ]);
    }

    /**
     * Get vloggers.
     *
     * @return Vlogger[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|null
     */
    private function getFavorites()
    {
        $auth     = $this->getAuth();
        $vloggers = $auth->user()->vloggers()
                                 ->with('videos')
                                 ->withPivot('order')
                                 ->orderBy('vlogger_user.order')
                                 ->get();

        return $vloggers;
    }

    private function updateFavorites(array $favorites)
    {
        /** @var User $user */
        $user = $this->getAuth()
                     ->user();

        foreach ($favorites as $favorite) {
            $user->vloggers()
                 ->updateExistingPivot(
                     $favorite['id'],
                     ['order' => $favorite['order']]
                 );
        }
    }
}
