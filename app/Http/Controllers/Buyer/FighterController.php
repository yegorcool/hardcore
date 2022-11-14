<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\CareerEvent;
use App\Models\Social;
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
        $fighters = User::where('role', '=', 'fighter')
            ->orderBy('id', 'DESC')
            ->paginate(50);

        return response()->view('buyer.fighters.index', [
            'fighters' => $fighters,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $fighter)
    {
        $careerEvents = CareerEvent::query()
            ->where('user_id', '=', $fighter->id)
            ->orderByDesc('id')
            ->get();
        $socialNetworks = Social::query()->get();

        return response()->view('buyer.fighters.show', [
            'fighter' => $fighter,
            'careerEvents' => $careerEvents,
            'socialNetworks' => $socialNetworks,
        ]);
    }
}
