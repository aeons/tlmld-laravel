@extends('admin.base')

@section('title')
    {{ $event->title }}
@endsection

@section('content')
    <div class="row">
        <div class="page-header">
            <h1>{{ $event->title }}</h1>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p><span class="fa fa-calendar fa-fw fa-2x"></span> <strong>Tid</strong></p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <p>
                    @if ($event->ends_at)
                    @else

                    @endif
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p><span class="fa fa-map-marker fa-fw fa-2x"></span> <strong>Sted</strong></p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">{{ $event->starts_at }}</div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p><span class="fa fa-credit-card fa-fw fa-2x"></span> <strong>Betaling</strong></p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                {{ $event->payment_needed ? 'Ja' : 'Nej' }}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <p><span class="fa fa-list-alt fa-fw fa-2x"></span> <strong>Tilmeldte</strong></p>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                {{ $event->starts_at }}
            </div>
        </div>
    </div>

    <div class="row">
        <p>
            {!! $event->description !!}
        </p>
    </div>

    <div class="row">
        {!! Form::open(['route' => ['admin.event.destroy', $event->slug], 'method' => 'delete']) !!}
        <div class="btn-group" role="group">
            {!! link_to_route('admin.event.edit', 'Rediger', $event->slug, ['class' => 'btn btn-default']) !!}
            <button type="submit" id="destroy" class="btn btn-danger">Slet</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection