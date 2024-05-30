<?php

namespace App\Http\Controllers;

use App\Models\AudioText;
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

        try {
            // Decode the base64 encoded audio
            $audioContent = base64_decode(preg_replace('#^data:audio/\w+;base64,#i', '', $request->audio));
            $fileName = 'audio_' . time() . '.wav';
            $filePath = 'audios/' . $fileName;

            // Store the audio file in the public/audios directory
            Storage::disk('public')->put($filePath, $audioContent);
            Log::info('Audio file saved: ' . $filePath);

            // Set the Google Application Credentials environment variable
            putenv('GOOGLE_APPLICATION_CREDENTIALS=' . storage_path('app/google-cloud-key.json'));

            // Initialize the Google Cloud Speech client
            $speech = new SpeechClient();

            // Read the audio content
            $audio = (new RecognitionAudio())
                ->setContent(file_get_contents(storage_path('app/public/' . $filePath)));

            // Configure the audio settings with enhanced models
            $config = (new RecognitionConfig())
                ->setEncoding(AudioEncoding::LINEAR16)
                ->setLanguageCode('en-US')
                ->setModel('video') // Using enhanced model for better accuracy
                ->setUseEnhanced(true);

            // Perform the speech recognition
            $response = $speech->recognize($config, $audio);
            Log::info('Google Cloud Speech-to-Text Response: ' . json_encode($response->serializeToJsonString()));

            $transcription = '';

            foreach ($response->getResults() as $result) {
                $transcription .= $result->getAlternatives()[0]->getTranscript();
            }

            Log::info('Transcription: ' . $transcription);

            // Save the audio and transcription to the database
            AudioText::create([
                'receiver_id' => $request->receiver_id,
                'sender_id' => Auth::user()->id,
                'audio' => $filePath,
                'transcription' => $transcription,
            ]);

            // Return success response
            return back()->with('success', 'Message Created from Audio');
        } catch (\Exception $e) {
            Log::error('Error processing audio: ' . $e->getMessage());
            Log::error('Error Trace: ' . $e->getTraceAsString());
            return back()->with('error', 'There was an error processing the audio.');
        }







//        $request->validate([
//            'audio' => 'required',
//        ]);
//
//        $audioName = $request->file('audio')->getClientOriginalName();
//        $documentPath = $request->file('audio')->store('public/audio-texts');
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
        $user = User::findOrFail($id);
        $audios = AudioText::where(function ($query) use ($user) {
            $query->where('receiver_id', $user->id)
                ->where('sender_id', Auth::user()->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', Auth::user()->id);
        })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('audio-texts.show', compact('user', 'audios'));
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
