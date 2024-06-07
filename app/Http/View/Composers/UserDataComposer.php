<?php
/**
 * Bekende Vloggende Nederlanders
 */

namespace App\Http\View\Composers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class UsersMenuComposer
 *
 * @package App\Providers
 */
class UserDataComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        if (Auth::check() === false) {
            return;
        }

        $user                     = Auth::user();
        $userData                 = App::make('stdClass');

        $userData->name           = $user->name;
        $userData->image          = 'themes/default/demo_img/user-1.png';
        $userData->favoritesCount = $user->vloggers()->count();

        $view->with('userData', $userData);
    }
}