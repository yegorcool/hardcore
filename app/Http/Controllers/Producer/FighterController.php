<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFighterRequest;
use App\Http\Requests\UpdateFighterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FighterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fighters = User::where('role', '=', 'fighter');

        return response()->view('producer.report', [
            'fighter' => $fighters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('producer.fighters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFighterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFighterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'city' => $request->city,
            'height' => $request->height,
            'weight' => $request->weight,
            'description' => $request->description,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->intended(route('producer.report'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $fighter
     * @return \Illuminate\Http\Response
     */
    public function show(User $fighter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $fighter
     * @return \Illuminate\Http\Response
     */
    public function edit(User $fighter)
    {
       return response()->view('producer.fighters.edit', [
           'fighter' => $fighter,
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFighterRequest  $request
     * @param  \App\Models\User  $fighter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFighterRequest $request, User $fighter)
    {
        $data = $request->validated();
        $fighter->update($data);

        return redirect()->intended(route('producer.report'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $fighter
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $fighter)
    {
        //
    }
}
