<?php

namespace App\Http\Controllers;

use App\Models\Passport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PassportStoreRequest;
use App\Http\Requests\PassportCreateRequest;
use App\Http\Requests\PassportUpdateRequest;

class PassportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
            
        
        
        $passport = Auth::user()->passport; 

        
        
        
        return view("passport_crud.index",compact("passport"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('passport_crud.create');   
    }

    /**
     * 
     * 
     * Store a newly created resource in storage.
     */
    public function store(PassportStoreRequest $request)
    {
        if(Auth::check()){
            $passport = Passport::where('user_id', Auth::id())->first();
            if ($passport) {
                return redirect()->route('passport.index')->with('error', 'Passport already exists.');
            }
        } else {
            return redirect()->route('passport.create')->with('error', 'Please login to create a passport.');
        }
        $validated = $request->validated();
        Passport::create([
        
            'passport_number' => $request->passport_number,
        
            'issue_date' => $request->issue_date,
        
            'expiry_date' => $request->expiry_date,
        
            'user_id' => Auth::id(), 
        ]);
    
        return redirect()->route('passport.index');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        
        
        $passport = Auth::user()->passport; 

    return view
        ('passport_crud.passport', compact('passport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $passport = Passport::findOrFail($id);

    
        if (Auth::id() !== $passport->user_id) {
        return redirect()->route('passport.index');
    }

    return view('passport_crud.edit', compact('passport'));
    }

    /**
     * Update the specified resource in storage.
     */ 
    public function update(PassportUpdateRequest $request, string $id)
    {

        $passport = Passport::findOrFail($id);  
        if(!Auth::id() === $passport->user_id) {
            return redirect()->route('passport.index');
        }

    $passport->update([
     
        'passport_number' => $request->passport_number,
        'issue_date' => $request->issue_date,
        'expiry_date' => $request->expiry_date,
    ]);


        return redirect()->route('passport.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Passport $passport)
{

if (Auth::id() !== $passport->user_id) {
        return redirect()->route('passport.index');
    }
    $passport->delete();

    return redirect()->route('passport.index');
}



    
}