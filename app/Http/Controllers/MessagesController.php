<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('messages.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $messaging = Messages::create([
            'receiver_id' => $request->receiver_id,
            'sender_id' => Auth::user()->id,
            'message' => $request->input('message'),
        ]);


        return back()->with('success', 'Message Sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findorfail($id);
//        $messages = Messages::where('receiver_id', $user->id)
//            ->where('sender_id', Auth::user()->id)
//            ->orWhere('sender_id', $user->id)
//            ->where('receiver_id', Auth::user()->id)
//            ->orderBy('created_at', 'asc')
//            ->get();

        $messages = Messages::where(function ($query) use ($user) {
            $query->where('receiver_id', $user->id)
                ->where('sender_id', auth()->user()->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', auth()->user()->id);
        })
            ->orderBy('created_at', 'asc')
            ->get();

        foreach ($messages as $message) {
//            $message->content = "ais"; // Set the message content to "hi"
            $message->dictionaries = Dictionary::whereRaw("UPPER(SUBSTRING(letter, 1, 1)) = ? OR UPPER(SUBSTRING(letter, 2, 1)) = ?", [strtoupper(substr($message->message, 0, 1)), strtoupper(substr($message->message, 1, 1))])
                ->get();
        }



        return view('messages.show', compact('user', 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Messages $messages)
    {
        //
    }
}
