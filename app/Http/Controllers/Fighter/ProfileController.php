<?php

namespace App\Http\Controllers\Fighter;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFighterRequest;
use App\Models\CareerEvent;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  User $fighter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fighter = User::query()
            ->where('id', '=', $id)
            ->with('producersOfFighter')
            ->first();

        $careerEvents = CareerEvent::query()
            ->where('user_id', '=', $fighter->id)
            ->orderByDesc('id')
            ->get();
        $socialNetworks = Social::query()->get();

        return response()->view('fighter.profile.show', [
            'fighter' => $fighter,
            'careerEvents' => $careerEvents,
            'socialNetworks' => $socialNetworks,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $fighter = User::query()
            ->where('id', '=', $id)
            ->first();

        $socialNetworks = Social::query()
            ->whereNull('deleted_at')
            ->get();

        $socials = $fighter->socials;
        $socialLinks = [];
        if (count($socials) > 0) {
            foreach ($socials as $item) {
                $socialLinks[$item->lang_key] = $item->pivot->link;
            }
        }

        return response()->view('fighter.profile.edit', [
            'fighter' => $fighter,
            'socialNetworks' => $socialNetworks,
            'socialLinks' => $socialLinks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFighterRequest $request
     * @param User $fighter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFighterRequest $request, $id)
    {
        $fighter = auth()->user();
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
        if ($request->hasfile('portrait')) {
            $oldPortrait = $fighter->portrait;
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
        if (!empty($portrait)) {
            $fighter->update(['portrait' => 'storage/photos/' . $portrait]);
        }
        if (!empty($heroImage)) {
            $fighter->update(['hero_image' => 'storage/photos/' . $heroImage]);
        }
        if (!empty($galleryImages)) {
            $fighter->update(['gallery_images' => $galleryImages]);
        }

        $fighter->save();

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
            $fighter->socials()->sync($new_links);
        }

        $fighter->save();

        return redirect()->intended(route('fighter.profile', $fighter));

    }
}
