@extends('layout')
@section('container')
<div id="app" class="grid gap-2 px-8 sm:px-16">
    <chat-messages v-bind:user_id="{{ Auth::user()->id }}" v-bind:interlocutors_id="{{ $user->id }}"></chat-messages>
    <chat-form v-bind:receiver_id="{{ $user->id }}"></chat-form>
</div>
@endsection