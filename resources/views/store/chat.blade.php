@extends('template')

@section('content')
    <div class="chat-container well">
        <div id="chat">
            <h3>
                On wheels | Soporte en linea
                <span style="margin-top: 20px;" class="badge pull-right">
                    Usuarios en la sala: @{{ usersInRoom.length }}
                </span>
            </h3>
            <chat-log :messages="messages" :user="{{ Auth::user() }}"></chat-log>
            <chat-composer v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-composer>
        </div>
    </div>

@endsection