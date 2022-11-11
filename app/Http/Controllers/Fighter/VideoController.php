<?php

namespace App\Http\Controllers\Fighter;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::query()
            ->where('fighter_id', '=', auth()->id())
            ->whereNull('deleted_at')
            ->orderByDesc('id')
            ->paginate(50);

        return response()->view('fighter.videos.index', [
            'videos' => $videos,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        $video = Video::query()
            ->where('id', '=', $video->id)
            ->with('videoMaker')
            ->first();

        return response()->view('fighter.videos.show', [
            'video' => $video,
        ]);
    }
}
