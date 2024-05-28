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
                                    <div class="chat-container">
                                      <div class="row">
                                          <div class="col-md-6">
{{--                                              @foreach($messages as $msg)--}}
{{--                                                  <div class="chat-message {{ $msg->sender_id == Auth::user()->id ? 'user' : 'assistant' }}">--}}
{{--                                                      <strong>{{ $msg->sender_id == Auth::user()->id ? 'Me:' : 'Other:' }}</strong> {{ $msg->message }}--}}
{{--                                                      @if (!$msg->dictionaries->isEmpty())--}}
{{--                                                          <div class="dictionary-letters">--}}
{{--                                                              @foreach($msg->dictionaries as $dictionary)--}}
{{--                                                                  <span>{{ $dictionary->letter }}</span>--}}
{{--                                                              @endforeach--}}
{{--                                                          </div>--}}
{{--                                                      @endif--}}
{{--                                                  </div>--}}
{{--                                              @endforeach--}}
                                          </div>
                                          <div class="col-md-6">
                                              <div class="grid gap-4">
                                                  <div class="grid grid-cols-5 gap-4">
{{--                                                      @foreach($messages as $msg)--}}
{{--                                                          <div class="chat-message {{ $msg->sender_id == Auth::user()->id ? 'user' : 'assistant' }}">--}}
{{--                                                              @if (!$msg->dictionaries->isEmpty())--}}
{{--                                                                  <div class="dictionary-letters">--}}
{{--                                                                      @foreach($msg->dictionaries as $dictionary)--}}
{{--                                                                          <div class="row">--}}
{{--                                                                              <img class="h-auto max-w-full rounded-sm" width="20" src="{{ Storage::url($dictionary->image) }}" alt="">--}}
{{--                                                                          </div>--}}
{{--                                                                      @endforeach--}}
{{--                                                                  </div>--}}
{{--                                                              @endif--}}
{{--                                                          </div>--}}
{{--                                                      @endforeach--}}

                                                          @foreach($messages as $msg)
                                                              <div>
{{--                                                                  <p>{{ $msg->message }}</p>--}}
                                                                  @if(isset($allResults[$msg->message]))
                                                                      @foreach($allResults[$msg->message] as $result)
                                                                          {{$result->letter}}
                                                                      @endforeach
                                                                  @endif
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
            </div>


    </div>
</x-app-layout>