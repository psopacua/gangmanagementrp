<?php
/**
 * Bekende Vloggende Nederlanders
 */

namespace App\Http\Controllers\Admin;

use Alaouy\Youtube\Youtube;
use App\Models\Vlogger;
use Illuminate\Http\Request;

/**
 * Class VloggersController
 *
 * @package App\Http\Controllers\Admin
 */
class VloggersController extends Controller
{
    /** @var Youtube $youtube */
    private $youtube;

    /**
     * VloggersController constructor.
     *
     * @param Youtube $youtube
     */
    public function __construct(Youtube $youtube)
    {
        $this->youtube = $youtube;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $vloggers = Vlogger::all();
        $viewData = [
            'vloggers'      => $vloggers,
            'vloggersCount' => $vloggers->count()
        ];

        return view('admin.vloggers.index', $viewData);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddForm()
    {
        return view('admin.vloggers.add');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request)
    {
        // Defaults
        $vloggerData = $request->only('name', 'external_id');

        // Create new vlogger entity.
        $vlogger              = new Vlogger();
        $vlogger->name        = $vloggerData['name'];
        $vlogger->external_id = $vloggerData['external_id'];

        // Persist vlogger in the database.
        $vlogger->save();

        return redirect()->route('admin.vloggers.edit', $vlogger->id);
    }

    /**
     * @param int $vloggerId
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUpdateForm(int $vloggerId)
    {
        $vlogger = Vlogger::find($vloggerId);
        $videos  = $this->youtube->listChannelVideos($vlogger->external_id, 50, 'date');

        $viewData = [
            'vlogger' => $vlogger,
            'videos'  => $videos
        ];

        return view('admin.vloggers.update', $viewData);
    }

    /**
     * @param Request $request
     * @param int     $vloggerId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $vloggerId)
    {
        // Defaults
        $vloggerData = $request->only('name', 'external_id');
        $vlogger     = Vlogger::find($vloggerId);

        // Update vlogger data
        $vlogger->name        = $vloggerData['name'];
        $vlogger->external_id = $vloggerData['external_id'];

        // Persist changes in database.
        $vlogger->save();

        return redirect()->route('admin.vloggers');
    }
}
