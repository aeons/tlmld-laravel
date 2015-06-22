@extends('admin.base')

@section('title', 'Administration')

@section('content')
    <div class="row">
        <div class="page-header">
            <h1>Kommende begivenheder</h1>
        </div>
    </div>
    <div class="row">
        <ul>
            @forelse ($events as $e)
                <li>{!! link_to_route('admin.event.show', $e->title, $e->slug) !!}</li>
            @empty
                <p>Ingen kommende begivenheder.</p>
            @endforelse
        </ul>
    </div>
@endsection