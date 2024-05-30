<?php

namespace App\Http\Controllers;

use App\Models\AudioText;
use App\Models\Dictionary;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;
use Google\Cloud\Speech\V1\SpeechClient;
use Google\Cloud\Speech\V1\RecognitionConfig;
use Google\Cloud\Speech\V1\RecognitionAudio;
use Google\Cloud\Speech\V1\RecognitionConfig\AudioEncoding;


class AudioTextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('audio-texts.index', compact('users'));
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
            'audio' => 'required|string',
            'receiver_id' => 'required|integer',
        ]);


            $audioContent = base64_decode(preg_replace('#^data:audio/\w+;base64,#i', '', $request->audio));
            $fileName = 'audio_' . time() . '.wav';
            $filePath = 'audios/' . $fileName;


            Storage::disk('public')->put($filePath, $audioContent);

            AudioText::create([
                'receiver_id' => $request->receiver_id,
                'sender_id' => Auth::user()->id,
                'audio' => $filePath,
                'transcription' => '',
            ]);

            // Return success response
            return back()->with('success', 'Message Sent');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $messages = AudioText::where(function ($query) use ($user) {
            $query->where('receiver_id', $user->id)
                ->where('sender_id', Auth::user()->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', Auth::user()->id);
        })
            ->orderBy('created_at', 'asc')
            ->get();

        $allResults = [];

        foreach ($messages as $mes) {
            $greetingMessages = [
                "Good morning",
                "Hello",
                "Hi there",
                "Greetings",
                "Welcome aboard"
            ];

            $msg = $greetingMessages[array_rand($greetingMessages)];
            $lettersArray = str_split($msg);

            $results = Dictionary::whereIn('letter', $lettersArray)->get()->keyBy('letter');

            $images = [];
            foreach ($lettersArray as $letter) {
                $letterUpper = strtoupper($letter);
                if (isset($results[$letterUpper])) {
                    $images[] = $results[$letterUpper]->image;
                }
            }

            $allResults[$mes->id] = $images;
        }

        $dictionary = Dictionary::all();

        return view('audio-texts.show', compact('user', 'dictionary', 'messages', 'allResults'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AudioText $audioText)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AudioText $audioText)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AudioText $audioText)
    {
        //
    }
}
