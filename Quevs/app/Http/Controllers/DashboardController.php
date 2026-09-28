<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\user;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('home', compact('posts'));
}

    /**h
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

        $validated = $request->validate([
         'post' => 'required|string|max:255',
         'file' => 'required|file|mimes:jpg,png,pdf|max:2048',
           ]);


        if ($request->hasFile('file')){
            $path =$request->file('file')->store('documents','public');

           $validated['file']= $path;
        }

        $validated['user_id']= Auth::id();

         Post::create($validated);

            return redirect()->back()->with('success', 'Post has been created');

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
        $post = Post::findOrFail($id);

         return view('Dashboard')->with('success', 'Post as been delete');

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
        $post = Post::findOrFail($id);
        $post->delete();

        return view('Dashboard')->with('success', 'Post as been delete');
    }
}
