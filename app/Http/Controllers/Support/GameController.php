<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGameRequest;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::query()
            ->with('members')
            ->orderByDesc('id')
            ->paginate(30);

        return 'Здесь будет список боёв';

//        return response()->view('support.games.index', [
//            'games' => $games,
//        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fighters = User::query()
            ->where('deleted_at', '=', null)
            ->where('role', '=', 'fighter')
            ->get()
            ->pluck('name', 'id');

        return response()->view('support.games.create', [
            'fighters' => $fighters,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGameRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameRequest $request)
    {
        $headImage = $request->file('head_image')->store('/', 'public');

        if (!$headImage) {
            return response(['message' => 'Ошибка загрузки фото'], 500);
        }
        $game = Game::create([
            'member_one_id' => $request->member_one_id,
            'member_two_id' => $request->member_two_id,
            'datetime' => $request->datetime,
            'city' => $request->city,
            'place' => $request->place,
            'description' => $request->description,
            'head_image' => 'storage/photos/' . $headImage,
        ]);

        $game->members()->attach([
            $request->member_one_id,
            $request->member_two_id,
        ]);

        $game->save();

        return redirect()->route('support.games.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
