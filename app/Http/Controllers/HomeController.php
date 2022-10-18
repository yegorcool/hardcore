<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display welcome page for Role.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $fighters = User::where('role', '=', 'fighter')->orderBy('id', 'DESC')->simplePaginate(50);
        $games = Game::query()
            ->with('members')
            ->orderByDesc('id')
            ->get();

        return view('welcome', [
            'fighters' => $fighters,
            'games' => $games,
        ]);
    }
}
