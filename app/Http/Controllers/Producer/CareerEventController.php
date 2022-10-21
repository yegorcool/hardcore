<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCareerEventRequest;
use App\Http\Requests\UpdateCareerEventRequest;
use App\Models\CareerEvent;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCareerEventRequest $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CareerEvent  $careerEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(CareerEvent $careerEvent)
    {
        //
    }
}
