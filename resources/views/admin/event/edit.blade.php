@extends('admin.base')

@section('title')
    Rediger {{ $event->title }}
@endsection

@section('content')
    <div class="row">
        <h1>Rediger {{ $event->title }}</h1>
        @include('admin.event.form')
    </div>
@endsection
