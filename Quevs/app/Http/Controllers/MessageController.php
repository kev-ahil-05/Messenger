<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {

       $userMessages = Message::with('user')->get();


        $users = User::all();

        $search = request()->query('search');
        return view('message.index', compact('users', 'search', 'userMessages'));
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
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $message = new Message();
        $message->message = $request->input('message');
        $message->users_id = auth()->id();
        $message->save();



         return redirect(route('message.index', absolute: false))->with('success', 'Message sent successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
{

}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
