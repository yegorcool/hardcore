<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateFighterRequest;
use App\Models\CareerEvent;
use App\Models\Social;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        return response()->view('support.users.index', [
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
        $producers = User::query()
            ->where('role', '=', 'producer')
            ->orderBy('id', 'DESC')
            ->pluck('name', 'id')
        ->toArray();

        return response()->view('support.users.create', [
            'producers' => $producers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'description' => $request->description,
            'password' => Hash::make($request->password),
        ]);

        if ($request->hasfile('avatar')) {
            $avatar = $request->file('avatar')->store('/', 'public');
            if (!$avatar) {
                return response(['message' => 'Ошибка при загрузке аватара'], 500);
            }
            $user->update(['avatar' => 'storage/photos/' . $avatar]);
        }
       if ($user->role === 'fighter') {
           $user->producersOfFighter()->attach([
               $request->producer_id,
           ]);
           $user->save();
       }

        event(new Registered($user));

        return redirect()->intended(route('support.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $careerEvents = CareerEvent::query()
            ->where('user_id', '=', $user->id)
            ->orderByDesc('id')
            ->get();
        $socialNetworks = Social::query()->get();
        $producersOfFighter = $user->producersOfFighter->pluck('name', 'id')->toArray();

        return response()->view('support.users.show', [
            'user' => $user,
            'careerEvents' => $careerEvents,
            'socialNetworks' => $socialNetworks,
            'producersOfFighter' => $producersOfFighter,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $producers = User::query()
            ->whereNull('deleted_at')
            ->where('role', '=', 'producer')
            ->orderBy('id', 'DESC')
            ->pluck('name', 'id')
            ->toArray();

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
        $producersOfFighter = $user->producersOfFighter->pluck('name', 'id')->toArray();

        return response()->view('support.users.edit', [
            'user' => $user,
            'producers' => $producers,
            'socialNetworks' => $socialNetworks,
            'socialLinks' => $socialLinks,
            'producersOfFighter' => $producersOfFighter,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFighterRequest $request, User $user)
    {
        $data = $request->validated();
        if ($request->hasfile('avatar')) {
            $oldAvatar = $user->avatar;
            $avatar = $request->file('avatar')->store('/', 'public');
            if (!$avatar) {
                return response(['message' => 'Не удалось загрузить файл Аватар'], 500);
            } else {
                // если новый аватар загрузился успешно, найти и удалить старый файл с диска
                if ($oldAvatar && file_exists(public_path($oldAvatar))) {
                    unlink(public_path($oldAvatar));
                }
            }
        }
        if ($request->hasfile('portrait')) {
            $oldPortrait = $user->portrait;
            $portrait = $request->file('portrait')->store('/', 'public');
            if (!$portrait) {
                return response(['message' => 'Ошибка при загрузке портрета'], 500);
            } else {
                // если новый портрет загрузился успешно, найти и удалить старый файл с диска
                if ($oldPortrait && file_exists(public_path($oldPortrait))) {
                    unlink(public_path($oldPortrait));
                }
            }
        }
        if ($request->hasfile('hero_image')) {
            $oldHeroImage = $user->hero_image;
            $heroImage = $request->file('hero_image')->store('/', 'public');
            if (!$heroImage) {
                return response(['message' => 'Не удалось загрузить файл фона'], 500);
            } else {
                // если новый фон загрузился успешно, найти и удалить старый файл с диска
                if ($oldHeroImage && file_exists(public_path($oldHeroImage))) {
                    unlink(public_path($oldHeroImage));
                }
            }
        }

        if ($request->hasfile('gallery_images')) {
            $oldHeroImage = $user->gallery_images;

            foreach ($request->file('gallery_images') as $file) {
                $img = $file->store('/', 'public');
                $galleryImages[] = 'storage/photos/' . $img;
            }
            if (!$galleryImages) {
                return response(['message' => 'Не удалось загрузить файлы галлереи'], 500);
            } else {
                // если файлы новой галереи загрузились успешно, найти и удалить старые файлы с диска
                if ($oldHeroImage && is_array($oldAvatar)) {
                    foreach ($galleryImages as $image) {
                        if (file_exists(public_path($image))) {
                            unlink(public_path($oldHeroImage));
                        }
                    }
                }
            }
        }

        $user->update($data);

        if (!empty($avatar)) {
            $user->update(['avatar' => 'storage/photos/' . $avatar]);
        }
        if (!empty($portrait)) {
            $user->update(['portrait' => 'storage/photos/' . $portrait]);
        }
        if (!empty($heroImage)) {
            $user->update(['hero_image' => 'storage/photos/' . $heroImage]);
        }
        if (!empty($galleryImages)) {
            $user->update(['gallery_images' => $galleryImages]);
        }

        $user->save();

        $networks = Social::query()
            ->whereNull('deleted_at')
            ->get()->pluck('lang_key', 'id')
            ->toArray();
        $new_links = [];

        if (count($request->social_user) > 0) {
            foreach ($request->social_user as $key => $value) {
                if (in_array($key, $networks)) {
                    if (!empty($value)) {
                        $social_id = array_search($key, $networks);
                        $new_links[$social_id] = [
                            'link' => $value,
                        ];
                    }
                }
            }
            $user->socials()->sync($new_links);
        }

        if ($request->producer_id) {
            $user->producersOfFighter()->sync([
                $request->producer_id,
            ]);
        }

        $user->save();

        return redirect()->intended(route('support.users.show', $user));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('support.users.index')->with('success', ['Боец успешно удален!']);
    }
}
