@extends('admin.base')

@section('title')
    {{ $event->title }}
@endsection

@section('content')
    <div class="row">
        <div class="panel-body page-header">
            <h1>{{ $event->title }}</h1>
        </div>
    </div>

    <div class="row panel panel-default">
        <div class="panel-heading">
            <strong>Detaljer</strong>
        </div>
        <div class="panel-body">
            {!! Form::open(['route' => ['admin.event.destroy', $event->slug], 'method' => 'delete']) !!}
            <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('admin.event.edit', $event->slug) }}" class="btn btn-default">
                    <span class="fa fa-edit"></span> Rediger
                </a>
                <button type="submit" id="destroy" class="btn btn-danger">
                    <span class="fa fa-remove"></span> Slet
                </button>
            </div>
            {!! Form::close() !!}
        </div>
        <table class="table table-striped table-bordered table-nonfluid-first">
            <tbody>
            <tr>
                <td><i class="fa fa-bw fa-clock-o"></i> Starttidspunkt</td>
                <td>{{ ucfirst($event->starts_at->format('l, \d. j. F, Y, \k\l. H:m')) }}</td>
            </tr>
            <tr>
                <td><i class="fa fa-bw fa-moon-o"></i> Sluttidspunkt</td>
                <td>
                    @if ($event->ends_at)
                        {{ ucfirst($event->starts_at->format('l, \d. j. F, Y, \k\l. H:m')) }}
                    @else
                        Ikke angivet
                    @endif
                </td>
            </tr>
            <tr>
                <td><i class="fa fa-bw fa-arrow-circle-o-right"></i> Tilmelding starter</td>
                <td>{{ ucfirst($event->active_on->format('l, \d. j. F, Y')) }}</td>
            </tr>
            <tr>
                <td><i class="fa fa-bw fa-arrow-circle-o-left"></i> Tilmeldingsfrist</td>
                <td>
                    @if ($event->inactive_on)
                        {{ ucfirst($event->inactive_on->format('l, \d. j. F, Y')) }}
                    @else
                        Ikke angivet
                    @endif
                </td>
            </tr>
            <tr>
                <td><i class="fa fa-bw fa-location-arrow"></i> Sted</td>
                <td><code>$event->location</code></td>
            </tr>
            <tr>
                <td><i class="fa fa-bw fa-credit-card"></i> Betaling?</td>
                <td>{{ $event->payment_needed ? 'Ja' : 'Nej' }}</td>
            </tr>
            <tr>
                <td><i class="fa fa-bw fa-users"></i> Tilmeldte</td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row panel panel-default">
        <div class="panel-heading">
            <strong>Beskrivelse</strong>
        </div>
        <div class="panel-body">
            {!! $event->description !!}
        </div>
    </div>

    <div class="row panel panel-default">
        <div class="panel-heading">
            <strong>Valgmuligheder</strong>
        </div>
    </div>

    <div class="row panel panel-default">
        <div class="panel-heading">
            <strong>Tilmeldte</strong>
        </div>
    </div>
@endsection