<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFighterRequest;
use App\Http\Requests\UpdateFighterRequest;
use App\Models\CareerEvent;
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
        $fighters = User::where('role', '=', 'fighter')
            ->orderBy('id', 'DESC')
            ->paginate(50);

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
                return response(['message' => 'Ошибка при загрузке аватара'], 500);
            }
            $user->update(['avatar' => 'storage/photos/' . $avatar]);
        }
        if ($request->hasfile('portrait')) {
            $portrait = $request->file('portrait')->store('/', 'public');
            if (!$portrait) {
                return response(['message' => 'Ошибка при загрузке портрета'], 500);
            }
            $user->update(['portrait' => 'storage/photos/' . $portrait]);
        }
        if ($request->hasfile('hero_image')) {
            $hero_image = $request->file('hero_image')->store('/', 'public');
            if (!$hero_image) {
                return response(['message' => 'Ошибка при загрузке фона'], 500);
            }
            $user->update(['hero_image' => 'storage/photos/' . $hero_image]);
        }

        if ($request->hasfile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $img = $file->store('/', 'public');
                $gallery_images[] = 'storage/photos/' . $img;
            }
            if (!$gallery_images) {
                return response(['message' => 'Ошибка при загрузке фона'], 500);
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
        $careerEvents = CareerEvent::query()
            ->where('user_id', '=', $fighter->id)
            ->orderByDesc('id')
            ->get();

        return response()->view('producer.fighters.show', [
            'fighter' => $fighter,
            'careerEvents' => $careerEvents,
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateFighterRequest $request, User $fighter)
    {
        $data = $request->validated();
        if ($request->hasfile('avatar')) {
            $oldAvatar = $fighter->avatar;
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

        if ($request->hasfile('hero_image')) {
            $oldHeroImage = $fighter->hero_image;
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
            $oldHeroImage = $fighter->gallery_images;

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

        $fighter->update($data);

        if (!empty($avatar)) {
            $fighter->update(['avatar' => 'storage/photos/' . $avatar]);
        }
        if (!empty($heroImage)) {
            $fighter->update(['hero_image' => 'storage/photos/' . $heroImage]);
        }
        if (!empty($galleryImages)) {
            $fighter->update(['gallery_images' => $galleryImages]);
        }
        $fighter->save();

        return redirect()->intended(route('producer.fighters.show', $fighter));
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
