<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="p-3 text-black bg-gray-400">Send Speech</h1>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('layouts.partials')
{{--                <form action="{{route('audio-texts.store')}}" method="POST" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                    <div class="p-6 text-gray-900">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-10">--}}
{{--                                <input type="hidden" name="receiver_id" value="{{$user->id}}">--}}
{{--                                <div class="p-2">--}}
{{--                                    <x-input-label for="audio" :value="__('Speech or Audio')" />--}}
{{--                                    <x-text-input id="audio"  class="block mt-1 w-full" type="file" name="audio" />--}}
{{--                                    <x-input-error :messages="$errors->get('audio')" class="mt-2" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="flex items-center mt-2">--}}
{{--                            <x-primary-button class="ml-4">--}}
{{--                                {{'Send'}}--}}
{{--                            </x-primary-button>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </form>--}}

                    <div class="container">
                        <h1>Record and Send Message</h1>

                        <form id="audioForm" action="{{ route('audio-texts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="p-6 text-gray-900">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                                        <div class="p-2">
                                            <button type="button" id="recordButton">Start Recording</button>
                                            <button type="button" id="stopButton" disabled>Stop Recording</button>
                                            <input type="hidden" name="audio" id="audioInput">
                                            <div id="recordingIndicator" style="display: none; margin-top: 10px;">
                                                <div class="spinner"></div>
                                                <span>Recording...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center mt-2">
                                    <x-primary-button class="ml-4" id="sendButton" disabled>
                                        {{ 'Send' }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </form>

                        <style>
                            .spinner {
                                width: 20px;
                                height: 20px;
                                border: 4px solid rgba(0, 0, 0, 0.1);
                                border-left-color: #000;
                                border-radius: 50%;
                                animation: spin 1s linear infinite;
                                display: inline-block;
                                margin-right: 10px;
                            }

                            @keyframes spin {
                                0% { transform: rotate(0deg); }
                                100% { transform: rotate(360deg); }
                            }
                        </style>

                        <script>
                            let mediaRecorder;
                            let audioChunks = [];

                            document.getElementById('recordButton').addEventListener('click', () => {
                                navigator.mediaDevices.getUserMedia({ audio: true })
                                    .then(stream => {
                                        mediaRecorder = new MediaRecorder(stream);
                                        mediaRecorder.start();
                                        document.getElementById('recordButton').disabled = true;
                                        document.getElementById('stopButton').disabled = false;
                                        document.getElementById('recordingIndicator').style.display = 'flex';
                                        document.getElementById('sendButton').disabled = true;

                                        mediaRecorder.addEventListener('dataavailable', event => {
                                            audioChunks.push(event.data);
                                        });

                                        mediaRecorder.addEventListener('stop', () => {
                                            const audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
                                            const reader = new FileReader();
                                            reader.readAsDataURL(audioBlob);
                                            reader.onloadend = () => {
                                                document.getElementById('audioInput').value = reader.result;
                                                document.getElementById('recordingIndicator').style.display = 'none';
                                                document.getElementById('sendButton').disabled = false;
                                            };
                                        });
                                    }).catch(error => {
                                    console.error('Error accessing audio stream', error);
                                });
                            });

                            document.getElementById('stopButton').addEventListener('click', () => {
                                mediaRecorder.stop();
                                document.getElementById('recordButton').disabled = false;
                                document.getElementById('stopButton').disabled = true;
                            });

                            document.getElementById('audioForm').addEventListener('submit', (event) => {
                                if (!document.getElementById('audioInput').value) {
                                    event.preventDefault();
                                    alert('Please record audio before submitting.');
                                }
                            });
                        </script>



                    </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-3 lg:px-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="chat-box">
                                    <div class="chat-container">
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                            <tr>
                                                <th>Sender</th>
                                                <th>Audio</th>
                                                <th>Transcription</th>
                                                <th>Date Sent</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($audios as $audio)
                                                <tr>
                                                    <td class="fw-bold">
                                                        @if ($audio->sender_id == Auth::user()->id)
                                                            Me
                                                        @else
                                                            {{ $user->name }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <audio controls>
                                                            <source src="{{ asset('storage/' . $audio->audio) }}" type="audio/wav">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                    </td>
                                                    <td>{{ $audio->transcription }}</td>
                                                    <td>{{ $audio->created_at->format('d M Y, h:i A') }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


    </div>
</x-app-layout>
