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

    public function createFromImages(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'string'
        ]);

        // Combine the selected letters to form the message
        $message = implode('', $request->images);

        // Save the message to the database
        $messaging = Messages::create([
            'receiver_id' => $request->receiver_id,
            'sender_id' => Auth::user()->id,
            'message' => $message,
        ]);

        return back()->with('success', 'Message Created from Images');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        $messages = Messages::where(function ($query) use ($user) {
            $query->where('receiver_id', $user->id)
                ->where('sender_id', auth()->user()->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', auth()->user()->id);
        })
            ->orderBy('created_at', 'asc')
            ->get();

        $allResults = [];

        foreach ($messages as $mes) {
            $msg = $mes->message;

            // Split the message into an array of letters
            $lettersArray = str_split($msg);

            // Retrieve data from Dictionary where 'letter' is in $lettersArray
            $results = Dictionary::whereIn('letter', $lettersArray)->get()->keyBy('letter');

            // Prepare an array to store images for each message
            $images = [];
            foreach ($lettersArray as $letter) {
                $letterUpper = strtoupper($letter); // Ensure matching by upper case
                if (isset($results[$letterUpper])) {
                    $images[] = $results[$letterUpper]->image;
                }
            }

            // Store the images array by message ID
            $allResults[$mes->id] = $images;
        }

        $dictionary = Dictionary::all();

        return view('messages.show', compact('user', 'messages', 'allResults', 'dictionary'));
    }




//    public function show(string $id)
//    {
//        $user = User::findorfail($id);
////        $messages = Messages::where('receiver_id', $user->id)
////            ->where('sender_id', Auth::user()->id)
////            ->orWhere('sender_id', $user->id)
////            ->where('receiver_id', Auth::user()->id)
////            ->orderBy('created_at', 'asc')
////            ->get();
//
//        $messages = Messages::where(function ($query) use ($user) {
//            $query->where('receiver_id', $user->id)
//                ->where('sender_id', auth()->user()->id);
//        })->orWhere(function ($query) use ($user) {
//            $query->where('sender_id', $user->id)
//                ->where('receiver_id', auth()->user()->id);
//        })
//            ->orderBy('created_at', 'asc')
//            ->get();
//
////        foreach ($messages as $message) {
//////            $message->content = "ais"; // Set the message content to "hi"
////            $message->dictionaries = Dictionary::whereRaw("UPPER(SUBSTRING(letter, 1, 1)) = ? OR UPPER(SUBSTRING(letter, 2, 1)) = ?", [strtoupper(substr($message->message, 0, 1)), strtoupper(substr($message->message, 1, 1))])
////                ->get();
////        }
//
//        $allResults = [];
//
//// Loop through each message
//        foreach ($messages as $mes) {
//            $msg = $mes->message;
//
//            // Split the message into an array of letters
//            $lettersArray = str_split($msg);
//
//            // Retrieve data from Dictionary where 'letter' is in $lettersArray
//            $results = Dictionary::whereIn('letter', $lettersArray)->get();
//
//            // Merge the results into the allResults array
//            foreach ($results as $result) {
//                $allResults[$msg][] = $result; // Group results by message
//            }
//        }
//
//
//
//
//
//        return view('messages.show', compact('user', 'messages', 'allResults'));
//    }

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
