<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\User;
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
            ->where('buyer_id', '=', auth()->id())
            ->whereNull('deleted_at')
            ->orderByDesc('id')
            ->paginate(50);

        return response()->view('buyer.videos.index', [
            'videos' => $videos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->get('recipient')) {
            return redirect()->back()->withErrors(['message' => 'Ошибка платежа. Не указан получатель']);
        } else {
            $recipient_id = $request->get('recipient');
            $recipient = User::query()
                ->where('id', '=', $recipient_id)
                ->first();
        }

        $buyer = auth()->user();
        return response()->view('buyer.videos.create', [
            'buyer' => $buyer,
            'recipient' => $recipient,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
    {
        $videoFile = $request->file('video_file')->store('/', 'public');
        if (!$videoFile) {
            return response(['message' => 'Ошибка загрузки видео'], 500);
        }

        $video = Video::create([
            'buyer_id' => $request->buyer_id,
            'fighter_id' => $request->fighter_id,
            'title' => $request->title,
            'status'  => $request->status,
            'comment' => $request->comment,
            'video_file' => 'storage/photos/' . $videoFile,
        ]);
        $video->save();
        return response()->redirectTo(route('buyer.videos.show', $video))->withSuccess(['message' => 'Спасибо, ваше видео успешно отправлено! ']);
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
            ->with('videoRecipient')
            ->first();

        return response()->view('buyer.videos.show', [
            'video' => $video,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoRequest  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
