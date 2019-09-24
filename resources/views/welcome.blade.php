@extends('layout')

@section('content')

    <h1>Aiken Outdoor Activities</h1>

    <ul>
        @foreach ($proximas as $proxima)
            <li>{{ $proxima }}</li>
        @endforeach
    </ul>

@endsection