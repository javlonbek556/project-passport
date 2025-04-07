<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $passport = auth()->user()->passport;
        return view('passport.index', compact('passport'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('passport.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Post::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);
        return redirect ('password.index')->with('success','qoshildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        if(Auth::user()->id != $post->user_id){
            return redirect()->back()->with('error','Sizda ruxsat yo\'q');
        }
        return view('passport.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if(Auth::user()->id != $post->user_id){
            return redirect()->back()->with('error','Sizda ruxsat yo\'q');
        }
        
       
        return view('', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Post::findOrFail($id)->update([
'passport_number'=> $request->passport_number,
            'issue_date'=> $request->issue_date,
            'expiry_date'=> $request->expiry_date,  
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::findOrFail($id)->delete();

        return redirect()->back()->with('success','o\'chirildi');
    }
}
