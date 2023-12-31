<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Selectedpeople; // Make sure to import the Selectedpeople model

class SelectedpeopleController extends Controller
{
    // ... existing methods ...

    /**
     * Add a selected person for a specific user.
     *
     * @param  Request  $request
     * @param  int  $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addSelectedPerson(Request $request, $user_id)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            // Add any additional validation rules as needed
        ]);

        // Create a new Selectedpeople instance
        $selectedPerson = Selectedpeople::create([
            'user_id' => $user_id,
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            // Add any additional fields you may have in the selectedpeople table
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Selected person added successfully',
            'selectedPerson' => $selectedPerson,
        ]);
    }

     /**
     * Get the list of selected people for a specific user.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\JsonResponse
     */
  // SelectedpeopleController.php

public function getSelectedPeople($user_id)
{
    // Fetch selected people based on user_id
    $selectedPeople = Selectedpeople::where('user_id', $user_id)->get(['id', 'firstname', 'lastname']);

    return response()->json([
        'status' => 'success',
        'selectedPeople' => $selectedPeople,
    ]);
}



    // ... existing methods ...
}

