@extends('layout')
@section('container')
<ul>
    @foreach ($users as $user)
    <li key="{{ $user->id }}"><a href="/chat/{{ $user->id }}">{{ $user->name }}</a></li>
    @endforeach
</ul>
@endsection