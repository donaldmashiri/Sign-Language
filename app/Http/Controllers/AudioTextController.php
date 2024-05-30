<?php

namespace App\Http\Controllers;

use App\Models\AudioText;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

use Google\Cloud\Speech\V1\SpeechClient;
use Google\Cloud\Speech\V1\RecognitionConfig;
use Google\Cloud\Speech\V1\RecognitionAudio;
use Google\Cloud\Speech\V1\RecognitionConfig\AudioEncoding;
use Google\Cloud\Core\ServiceBuilder;


class AudioTextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('audios.index', compact('users'));
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

        // Decode the base64 encoded audio
        $audioContent = base64_decode($request->audio);
        $fileName = 'audio_' . time() . '.wav';
        Storage::disk('local')->put($fileName, $audioContent);
        $audioFilePath = storage_path('app/' . $fileName);

        // Initialize the Google Cloud Speech client
        $speech = new SpeechClient([
            'keyFilePath' => storage_path('app/google-cloud-key.json'),
        ]);

        // Read the audio content
        $audio = (new RecognitionAudio())
            ->setContent(file_get_contents($audioFilePath));

        // Configure the audio settings
        $config = (new RecognitionConfig())
            ->setEncoding(AudioEncoding::LINEAR16)
            ->setSampleRateHertz(16000)
            ->setLanguageCode('en-US');

        // Perform the speech recognition
        $response = $speech->recognize($config, $audio);
        $transcription = '';

        foreach ($response->getResults() as $result) {
            $transcription .= $result->getAlternatives()[0]->getTranscript();
        }

        // Save the audio and transcription to the database
        $audioText = AudioText::create([
            'receiver_id' => $request->receiver_id,
            'sender_id' => Auth::user()->id,
            'audio' => $fileName,
        ]);

        // Return success response
        return back()->with('success', 'Message Created from Audio');

//        $request->validate([
//            'audio' => 'required',
//        ]);
//
//        $audioName = $request->file('audio')->getClientOriginalName();
//        $documentPath = $request->file('audio')->store('public/audios');
//
//        $data = AudioText::create([
//            'receiver_id' => $request->receiver_id,
//            'sender_id' => Auth::user()->id,
//            'audio' => $documentPath,
//        ]);
//
//        return redirect()->back()->with('success', 'Speech Sent.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findorfail($id);
        $audios = AudioText::where('receiver_id', $user->id)
            ->where('sender_id', Auth::user()->id)
            ->orWhere('sender_id', $user->id)
            ->where('receiver_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();
        return view('audios.show', compact('user', 'audios'));
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
