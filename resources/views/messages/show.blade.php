<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="p-3 text-black bg-gray-400">Messaging Pre-inputted Text</h1>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('layouts.partials')
                <form action="{{route('messages.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-6 text-gray-900">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="hidden" name="receiver_id" value="{{$user->id}}">
                                <div class="p-2">
                                    <x-input-label for="message" :value="__('Enter Pre-inputted Text')" />
                                    <x-text-input id="message"  class="block mt-1 w-full" type="text" name="message" :value="old('message')" />
                                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center mt-2">
                            <x-primary-button class="ml-4">
                                {{'Send'}}
                            </x-primary-button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-3 lg:px-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="chat-box">
{{--                                    @foreach($messages as $message)--}}
{{--                                        @if($message->user_id == Auth::user()->id)--}}
{{--                                            <div class="message right-message bg-secondary p-3">--}}
{{--                                                <p>{{ $message->message }}</p>--}}
{{--                                                <span class="message-info">{{ $message->created_at }}</span>--}}
{{--                                            </div>--}}
{{--                                        @else--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}

                                    <div class="chat-container">
                                        @foreach($messages as $msg)
                                            <div class="chat-message {{ $msg->sender_id == Auth::user()->id ? 'user' : 'assistant' }}">
                                                <strong>{{ $msg->sender_id == Auth::user()->id ? 'Me:' : 'Other:' }}</strong> {{ $msg->message }}
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


    </div>
</x-app-layout>
