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

// Configure the audio settings
$config = (new RecognitionConfig())
->setEncoding(AudioEncoding::LINEAR16)
->setLanguageCode('en-US');

// Perform the speech recognition
$response = $speech->recognize($config, $audio);
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
return back()->with('error', 'There was an error processing the audio.');
}
