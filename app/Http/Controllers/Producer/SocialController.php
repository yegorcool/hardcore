<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialRequest;
use App\Http\Requests\UpdateSocialRequest;
use App\Models\Social;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Social::all();

        return response()->view('producer.socials.index', [
            'socials' => $socials,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('producer.socials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSocialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocialRequest $request)
    {

        $socialNetwork = Social::create([
            'title' => $request->title,
            'lang_key' => $request->lang_key,
            'comment' => $request->comment,
        ]);

        $socialNetwork->save();

        return redirect()->intended(route('producer.socials.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSocialRequest  $request
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSocialRequest $request, Social $social)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        $social->delete();

        return redirect()->route('producer.socials.index')->with('success', ['Сеть успешно удалена!']);

    }
}
