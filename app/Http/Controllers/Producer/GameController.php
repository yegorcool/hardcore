<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use App\Models\GameUser;
use App\Models\User;

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
            ->get();
        return response()->view('producer.games.index', [
            'games' => $games,
        ]);
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

        return response()->view('producer.games.create', [
            'fighters' => $fighters,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreGameRequest $request
     * @return \Illuminate\Http\RedirectResponse
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

        GameUser::create([
            'member_id' => $request->member_one_id,
            'game_id' => $game->id,
        ]);
        GameUser::create([
            'member_id' => $request->member_two_id,
            'game_id' => $game->id,
        ]);

        $game->save();

        return redirect()->route('producer.games.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Game $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return response()->view('producer.games.show', [
            'game' => $game,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Game $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $fighters = User::query()
            ->where('deleted_at', '=', null)
            ->where('role', '=', 'fighter')
            ->get()
            ->pluck('name', 'id');

        return response()->view('producer.games.edit', [
            'game' => $game,
            'fighters' => $fighters,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateGameRequest $request
     * @param \App\Models\Game $game
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        $data = $request->validated();
        $game->update($data);

        return redirect()->intended(route('producer.games.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Game $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('producer.games.index')->with('success', ['Бой успешно удален!']);
    }
}
