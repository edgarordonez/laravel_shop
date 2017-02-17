@extends('template')

@section('content')
    <div class="chat-container well">
        <h3>On wheels | Soporte en linea</h3>
        <div id="chat">
            <chat-log :messages="messages"></chat-log>
            <chat-composer v-on:messagesent="addMessage"></chat-composer>
        </div>
    </div>

@endsection