@extends('template')

@section('content')
    <div class="chat-container well">
        <div id="vue-chat">
            <chat :room="{{ $room }}" :user="{{ Auth::user() }}"></chat>
        </div>
    </div>
@endsection