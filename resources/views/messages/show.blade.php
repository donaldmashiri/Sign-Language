<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="p-3 text-black bg-gray-400">Send Message to <b>{{ $user->name }}</b></h1>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('layouts.partials')
                @if (auth()->user()->user_type == 'teacher')
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
                @else
                <form action="{{ route('messages.createFromImages') }}" method="POST">
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{$user->id}}">
                    <div class="image-selection container">
                        @foreach ($dictionary as $entry)
                            <label>
                                <input type="checkbox" name="images[]" value="{{ $entry->letter }}">
                                <img src="{{ asset('storage/' . $entry->image) }}" alt="{{ $entry->letter }}" style="width: 50px; height: 50px;">
                            </label>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary m-4 float-right">Send</button>
                </form>
                @endif
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-3 lg:px-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="container">
                                    <div class="container">

                                        <table class="table table-sm">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Message</th>
                                                <th>Date Sent</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($messages as $message)
                                                <tr>
                                                    <td class="fw-bold">
                                                        @if ($message->sender_id == auth()->user()->id)
                                                            Me:
                                                        @else
                                                            {{ $user->name }}:
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (auth()->user()->user_type == 'teacher')
                                                            {{ $message->message }}
                                                        @else
                                                            <div class="message-images" style="display: flex; gap: 10px;">
                                                                @if (isset($allResults[$message->id]))
                                                                    @foreach ($allResults[$message->id] as $image)
                                                                        <img src="{{ asset('storage/' . $image) }}" alt="Sign Image" style="width: 50px; height: 50px;">
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>{{ $message->created_at->format('d M Y, h:i A') }}</td>
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
