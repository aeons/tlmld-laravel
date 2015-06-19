@extends('admin.base')

@section('title', 'Administration')

@section('content')
    <div class="row">
        <h1>Kommende begivenheder</h1>
        {!! link_to_route('admin::events::create', 'Opret ny begivenhed', [], ['class' => 'btn btn-default']) !!}
    </div>
@endsection