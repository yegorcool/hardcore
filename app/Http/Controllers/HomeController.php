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
        $allFighters = User::where('role', '=', 'fighter');

        $bestFighters = $allFighters->where('is_shown_on_welcome', '=', true)
            ->whereJsonLength('gallery_images', '>', 0)
            ->get();

        $fighters = $allFighters->orderBy('id', 'DESC')->simplePaginate(50);

        $games = Game::query()
            ->with('members')
            ->orderByDesc('id')
            ->get();

        return view('welcome', [
            'fighters' => $fighters,
            'bestFighters' => $bestFighters,
            'games' => $games,
        ]);
    }
}
