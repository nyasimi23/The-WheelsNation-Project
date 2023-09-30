<?php

namespace App\Http\Controllers;

use App\Models\CarEvents;
use Illuminate\Http\Request;

class CarEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('CarEvents.index',[
            'carEvents' => CarEvents::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('CarEvents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         //
         $formFields = $request->validate([
            'event_name' => 'required',
            'event_date' => 'required',
            'venue' => 'required',
            'ticket_price' => 'required'
        ]);
            
        // Get the currently authenticated user's ID
            $userId = auth()->id();

        // Add the user_id to the form data
            $formFields['user_id'] = $userId;

        // Create a new car record with the user_id set
            $carEvent = CarEvents::create($formFields);

        // Redirect to the carEvents index page or wherever you need to go
            return redirect('/carEvents');
    }

    /**
     * Display the specified resource.
     */
    public function show(CarEvents $carEvents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarEvents $carEvents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarEvents $carEvents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarEvents $carEvents)
    {
        //
    }
}
