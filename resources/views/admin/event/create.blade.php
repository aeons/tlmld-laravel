@extends('admin.base')

@section('title', 'Ny begivenhed')

@section('content')
    <div class="row">
        <h1>Ny begivenhed</h1>
        @include('admin.event.form')
    </div>
@endsection