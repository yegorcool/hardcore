<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FighterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fighters = User::where('role', '=', 'fighter')->orderBy('id', 'DESC')->simplePaginate(50);

        return response()->view('guest.fighters.index', [
            'fighters' => $fighters,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $fighter
     * @return \Illuminate\Http\Response
     */
    public function show(User $fighter)
    {
        $num = rand(1, 3); // для выбора рандомных фото @todo заменить на реальные фото из БД позже
        return response()->view('pages.fighter-single.index', [
            'fighter' => $fighter,
            'num' => $num,
        ]);
    }
}
