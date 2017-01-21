@extends('layouts.demo')

@section('side-menu')
    @include('eloquent.partials.menu')
@endsection

@section('content')
    <h1>DataTables using Eloquent</h1>
    <h2>Features:</h2>
    <ul>
        <li>Array & Object Response</li>
        <li>Eager Loading</li>
        <li>Nested Eager Loading</li>
    </ul>
@endsection

@push('scripts')
@endpush
