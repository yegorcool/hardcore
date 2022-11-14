<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerEvent;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()
            ->with([
                'fightersOfProducer',
                'producersOfFighter',
            ])
            ->orderBy('id', 'DESC')
            ->paginate(50);

        $fighters = $users->where('role', '=', 'fighter');
        $producers = $users->where('role', '=', 'producer');

        return response()->view('admin.users.index', [
            'users' => $users,
            'producers' => $producers,
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
        return 'Здесь Админ будет добавлять пользователей';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $socialNetworks = Social::query()->get();

        return response()->view('admin.users.show', [
            'user' => $user,
            'socialNetworks' => $socialNetworks,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $socialNetworks = Social::query()
            ->whereNull('deleted_at')
            ->get();

        $socials = $user->socials;
        $socialLinks = [];
        if (count($socials) > 0) {
            foreach ($socials as $item) {
                $socialLinks[$item->lang_key] = $item->pivot->link;
            }
        }
        $user = User::query()
            ->where('id', '=', $user->id)
            ->with([
                'fightersOfProducer',
                'producersOfFighter',
            ])
            ->orderBy('id', 'DESC')
        ->first();

        return response()->view('admin.users.edit', [
            'user' => $user,
            'socialNetworks' => $socialNetworks,
            'socialLinks' => $socialLinks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        return 'Будем редактировать';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', ['Пользователь успешно удален!']);

    }
}
