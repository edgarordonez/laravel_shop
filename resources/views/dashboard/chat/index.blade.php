@extends('dashboard.template')

@section('content')
    <h1>Chats</h1>
    <div class="row text-center">
        <div class="col-md-offset-3 col-md-6">
            @include('common.errors')
            <div class="well">
                @foreach($rooms as $room)
                    <a href="{{ route('chat-user', $room->room) }}" style="margin-bottom: 20px;" class="btn btn-primary input-block-level form-control">Abrir chat con: <strong>{{ $room->user->name }}</strong></a>
                @endforeach
            </div>
        </div>
    </div>
@endsection