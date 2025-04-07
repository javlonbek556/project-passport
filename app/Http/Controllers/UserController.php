<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use App\Http\Requests\LoginUserRequest;
use App\Http\Controllers\UserRegisterRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('passport.login');
    }
    public function login(LoginUserRequest $request)
    {
       

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success', 'You are logged in!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->compact('credentials');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('passport.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        auth()->login($user);

        return redirect()->route('pa')->with('success', 'Registration successful and you are logged in!');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'You have been logged out!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
