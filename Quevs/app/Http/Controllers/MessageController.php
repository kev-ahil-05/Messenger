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
    // 1. I-validate ang message pati ang hidden message_id field
    $validated = $request->validate([
        'message_id' => 'required|exists:messages,id', // Sinisiguradong nage-exist ang ID sa table ng messages
        'message'    => 'required|string|max:255',
    ]);

    // 2. Hanapin ang mismong mensahe gamit ang id mula sa form request
    $message = Message::findOrFail($request->message_id);

    // [Optional Security Check] Siguraduhin na ang nag-eedit ay ang mismong may-ari ng chat
    if ($message->users_id !== auth()->id()) {
        return redirect()->route('message.index')->with('error', 'Unauthorized action!');
    }

    // 3. I-update ang mensahe gamit ang validated text
    $message->update([
        'message' => $validated['message']
    ]);

    // 4. Bumalik sa chat list na may success flash message
    return redirect()->route('message.index')->with('success', 'Message updated successfully!');
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
