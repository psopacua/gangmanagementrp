<?php
/**
 * Bekende Vloggende Nederlanders
 */

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Response;

class VideosController extends Controller
{
    /**
     * Return all videos
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();

        return response($videos->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Get the video by id and return information.
     *
     * @param int $videoId
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function show(int $videoId)
    {
        $video = Video::find($videoId);

        return response($video->jsonSerialize(), Response::HTTP_OK);
    }
}
