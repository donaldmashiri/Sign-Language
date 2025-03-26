<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="bi bi-briefcase"></i> {{ __('Messages') }}
            <a href="{{route('messages.create')}}"
               class="py-2 px-4 text-white text-sm float-right font-semibold rounded-lg border border-grey-200 bg-blue-700">
                <i class="bi bi-plus"></i>Message
            </a>
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @include('layouts.partials')


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                        @if (auth()->user()->user_type == 'teacher')
                            <form action="{{route('messages.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="p-6 text-gray-900">
                                    <div class="row">
                                        <div class="col-md-10">
{{--                                            <input type="hidden" name="receiver_id" value="{{$user->id}}">--}}
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
                                <div class="image-selection container">
                                    @foreach ($dictionary as $entry)
                                        <label>
                                            <input type="checkbox" name="images[]" value="{{ $entry->letter }}">
{{--                                            <img src="{{ asset('storage/' . $entry->image) }}" alt="{{ $entry->letter }}" style="width: 50px; height: 50px;">--}}
{{--                                            <img src="{{ Storage::url($entry->image) }}" alt="{{ $entry->letter }}" style="width: 50px; height: 50px;">--}}
                                            <img src="{{ asset($entry->image) }}" alt="{{ $entry->letter }}" style="width: 50px; height: 50px;">
                                        </label>
                                    @endforeach
                                </div>
                                <button type="submit" class="btn btn-primary m-4 float-right">Send</button>
                            </form>
                        @endif

                    </div>

                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                @foreach ($messages as $message)
                                    <div class="d-flex align-items-start mb-3 border border-r-amber-100 p-3">
                                        <div class="me-2">
                                            @if ($message->user->user_type == 'teacher')
                                                <img src="{{ asset('logo/teacher.png') }}" alt="User Avatar" class="rounded-circle" style="width: 30px; height: 30px;">
                                            @else
                                                <img src="{{ asset('logo/student.jpg') }}" alt="User Avatar" class="rounded-circle" style="width: 30px; height: 30px;">
                                            @endif

                                        </div>
                                        <div>
                                            <div class="fw-bold">
                                                @if ($message->sender_id == auth()->user()->id)
                                                    Me
                                                @else
                                                    {{ $message->user->name }}
                                                @endif
                                            </div>
                                            <div>
                                                @if (auth()->user()->user_type == 'teacher')
                                                    {{ $message->message }}
                                                @else
                                                    <div class="message-images d-flex flex-wrap" style="gap: 10px;">
                                                        @if (isset($allResults[$message->id]))
                                                            @foreach ($allResults[$message->id] as $image)
{{--                                                                <img src="{{ Storage::url($image) }}" alt="Sign Image" style="width: 50px; height: 50px;">--}}
                                                                <img src="{{ asset($image) }}" alt="Sign Image" style="width: 50px; height: 50px;">
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="text-muted" style="font-size: 0.8rem;">{{ $message->created_at->format('d M Y, h:i A') }}</div>
                                        </div>
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
    </div>
    </div>

</x-app-layout>
