<?php

namespace App\Http\Controllers\Fighter;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCareerEventRequest;
use App\Http\Requests\UpdateCareerEventRequest;
use App\Models\CareerEvent;
use App\Models\User;
use Illuminate\Http\Request;

class CareerEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careerEvents = CareerEvent::query()
        ->whereNull('deleted_at')
        ->where('user_id', '=', auth()->id())
        ->get();

        return response()->view('fighter.career_events.index', [
            'careerEvents' => $careerEvents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fighter = User::query()
            ->where('id', '=', auth()->id())
            ->first();

        return response()->view('fighter.career_events.create', [
            'fighter' => $fighter,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCareerEventRequest $request)
    {
        $careereEvent = CareerEvent::create([
            'title' => $request->title,
            'user_id' => $request->user_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'comment' => $request->comment,
            'description' => $request->description,
        ]);

        $careereEvent->save();

        return redirect()->intended(route('fighter.profile', $careereEvent->user_id));

    }

    /**
     * Display the specified resource.
     *
     * @param CareerEvent $careerEvent
     * @return \Illuminate\Http\Response
     */
    public function show(CareerEvent $careerEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CareerEvent $careerEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(CareerEvent $careerEvent)
    {
        $fighter = auth()->user();

        if ($careerEvent->user_id !== auth()->id()) {
            return redirect()->back()->withErrors('У вас нет прав на редактирование');
        }

        return response()->view('fighter.career_events.edit', [
            'fighter' => $fighter,
            'careerEvent' => $careerEvent,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCareerEventRequest $request
     * @param CareerEvent $careerEvent
     * @param User $fighter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCareerEventRequest $request, CareerEvent $careerEvent)
    {
        $fighter = auth()->user();
        $data = $request->validated();
        $careerEvent->update($data);

        return redirect()->intended(route('fighter.profile', $fighter));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CareerEvent $careerEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(CareerEvent $careerEvent)
    {
        $fighter = User::query()
            ->where('id', '=', $careerEvent->user_id)
            ->first();

        if ($careerEvent->user_id !== auth()->id()) {
            return redirect()->back()->withErrors('У вас нет прав для данного действия');
        }
        $careerEvent->delete();

        return redirect()->intended(route('fighter.profile', $fighter))->with('success', ['Этап успешно удален!']);


    }
}
