<?php
/**
 * Bekende Vloggende Nederlanders
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AccountController
 *
 * @package App\Http\Controllers
 */
class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUpdateForm()
    {
        return view('account.update', [
            'account' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $accountData = $request->only('name', 'email');
        $account     = Auth::user();

        $account->update($accountData);

        return view('account.update', [
            'account' => $account
        ]);
    }
}
