<?php

namespace App\Http\Controllers\Producer;

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
        $careerEvents = CareerEvent::all();

        return response()->view('producer.career_events.index', [
            'careerEvents' => $careerEvents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fighter = User::query()
            ->where('id', '=',$request->query('fighter'))
            ->first();

        return response()->view('producer.career_events.create', [
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

        return redirect()->intended(route('producer.fighters.show', $careereEvent->user_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CareerEvent  $careerEvent
     * @return \Illuminate\Http\Response
     */
    public function show(CareerEvent $careerEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CareerEvent  $careerEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(CareerEvent $careerEvent)
    {
        $fighter = User::query()
            ->where('id', '=', $careerEvent->user_id)
            ->first();

        return response()->view('producer.career_events.edit', [
            'fighter' => $fighter,
            'careerEvent' => $careerEvent,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CareerEvent  $careerEvent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCareerEventRequest $request, CareerEvent $careerEvent)
    {
       return 'UPDATE';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CareerEvent  $careerEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(CareerEvent $careerEvent)
    {
        $fighter = User::query()
        ->where('id', '=', $careerEvent->user_id)
        ->first();

        $careerEvent->delete();

        return redirect()->intended(route('producer.fighters.show', $fighter))->with('success', ['Этап успешно удален!']);


    }
}
