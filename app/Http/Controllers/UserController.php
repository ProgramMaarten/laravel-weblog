<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = auth()->user();//->toArray();
        //dd($user, gettype($user));
        return view('users.premium', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // Validate the incoming data.
        $user = auth()->user();
        $validatedData = $request->validated();
        //dd($request, $validatedData, $user);

        $user->update($validatedData);

        if ($validatedData['premium']){
            return redirect()->route('articles.index')->withErrors([
                'premium' => 'Jij bent nu premium.',
            ]);
        }

        return redirect()->route('articles.index')->withErrors([
            'premium' => 'Jij bent nu niet premium.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
