<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\user;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $posts = Post::with('user')->latest()->take(50)->get();
        return view('post.index', compact('posts',));
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
            $path = $request->file('file')->store('documents','public');

           $validated['file']= $path;
           $validated['user_id'] = auth()->id();
        }
       
      

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
    public function edit(Post $post)
    {
        

         return view('post.edit')->with('success', 'Post as been delete');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated = $request->validate([
         'post' => 'required|string|max:255',
         'file' => 'required|file|mimes:jpg,png,pdf|max:2048',
           ]);


        if ($request->hasFile('file')){
            $path = $request->file('file')->store('documents','public');

           $validated['file']= $path;
           $validated['user_id'] = auth()->id();
        }
       
      

         Post::update($validated);

            return redirect()->back()->with('success', 'Post has been update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
       
        $post->delete();
        return view('post.index')->with('success', 'Post as been delete');
    }
}
