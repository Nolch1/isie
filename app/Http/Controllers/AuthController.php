<?php
// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Vote;
use App\Models\Votesnumber;


// Add the following use statement
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $token = $user->createToken('AppName')->accessToken;

        return response()->json([
            'status' => 'success',
            'token' => $token,
            'user' => $user,
        ]);
    }
   
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('AppName')->accessToken;

        return response()->json([
            'status' => 'success',
            'token' => $token,
            'user_id' => $user->id,
        ]);
    }

    return response()->json(['status' => 'error', 'message' => 'Invalid credentials'], 401);
}
public function addVotes(Request $request)
{
    // Validation rules for the request
    $validator = Validator::make($request->all(), [
        'user_id' => 'required|exists:users,id',
        'hour' => 'required|string',
        'males' => 'required|integer',
        'females' => 'required|integer',
        'old_people' => 'required|integer',
    ]);

    if ($validator->fails()) {
        return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
    }

    // Store the votes for different groups
    $votesData = [
        'user_id' => $request->input('user_id'),
        'hour' => $request->input('hour'),
        'males' => $request->input('males'),
        'females' => $request->input('females'),
        'old_people' => $request->input('old_people'),
    ];

    // Store the votes in the database
    Vote::create($votesData);

    return response()->json(['status' => 'success', 'message' => 'Votes added successfully']);
}


}