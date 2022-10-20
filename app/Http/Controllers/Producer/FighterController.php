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
        $fighters = User::where('role', '=', 'fighter')->orderBy('id', 'DESC')->simplePaginate(50);

        return response()->view('producer.fighters.index', [
            'fighters' => $fighters,
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
     * @param \App\Http\Requests\StoreFighterRequest $request
     * @return \Illuminate\Http\RedirectResponse
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

        if ($request->hasfile('avatar')) {
            $avatar = $request->file('avatar')->store('/', 'public');
            if (!$avatar) {
                return response(['message' => 'Error file upload'], 500);
            }
            $user->update(['avatar' => 'storage/photos/' . $avatar]);
        }
        if ($request->hasfile('hero_image')) {
            $hero_image = $request->file('hero_image')->store('/', 'public');
            if (!$hero_image) {
                return response(['message' => 'Error file upload'], 500);
            }
            $user->update(['hero_image' => 'storage/photos/' . $hero_image]);
        }

        if($request->hasfile('gallery_images'))
        {
            foreach ($request->file('gallery_images') as $file) {
                $img = $file->store('/', 'public');
                $gallery_images[] = 'storage/photos/' . $img;
            }
            $user->update(['gallery_images' => $gallery_images]);
        }

        event(new Registered($user));

        return redirect()->intended(route('producer.fighters.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $fighter
     * @return \Illuminate\Http\Response
     */
    public function show(User $fighter)
    {
        return response()->view('producer.fighters.show', [
            'fighter' => $fighter,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $fighter
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
     * @param \App\Http\Requests\UpdateFighterRequest $request
     * @param \App\Models\User $fighter
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
     * @param \App\Models\User $fighter
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $fighter)
    {
        $fighter->delete();

        return redirect()->route('producer.report')->with('success', ['Боец успешно удален!']);
    }
}
