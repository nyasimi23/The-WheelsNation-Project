<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $searchTerm = request('search');

        // Use the query builder to perform the search and paginate the results
        $cars = Cars::search($searchTerm)->paginate(5); // Adjust the number of items per page as needed

        return view('cars.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
          //
          $formFields = $request->validate([
            'make' => 'required',
            'model' => 'required',
            'price' => 'required',
            'year' => 'required'
        ]);
   // Get the currently authenticated user's ID
   $userId = auth()->id();

   // Add the user_id to the form data
   $formFields['user_id'] = $userId;

   // Create a new car record with the user_id set
   $car = Cars::create($formFields);

   // Redirect to the cars index page or wherever you need to go
   return redirect('/cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cars $cars)
    {
        //
          //
          return view ('cars.show',[
            'car' => $cars
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cars $cars)
    {
        //
        return view ('cars.edit' , ['car' => $cars]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cars $cars)
    {
    
         // Make sure logged in user is owner
         if($cars->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'make' => 'required',
            'model' => 'required',
            'price' => 'required',
            'year' => 'required'
        ]);


        $cars->update($formFields);

        return back()->with('message', 'Listing updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cars $cars)
    {
        //
    }
}
