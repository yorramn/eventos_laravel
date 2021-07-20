@extends('layouts.main')
@section('title','Eventos')
@section('content')

<div class="container">
    <div class="row mb-4">
        <div id="search-container" class="col-md-12">
            <h1>Busque por um evento</h1>
            <form action="/" method="get">
                <div class="row">
                    <div class="col-md-9">
                        <input type="text" name="search" class="form-control" placeholder="Busque aqui por um evento" id="search">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Procurar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div id="events-container" class="col-md-12">
            @if($search)
            <h2>Está buscando por: {{$search}}</h2>
            @else
            <h2>Próximos eventos</h2>
            <p>Veja os eventos nos próximos dias:</p>
            @endif
            <div id="card-container" class="row">
                @foreach($events as $event)
                <div class="card col-md-3">
                    <img src="/img/events/{{$event->image}}" alt="{{$event->title}}">
                    <div class="card-body">
                        <p class="card-date">{{date('d/m/Y', strtotime($event->date))}}</p>
                        <h1 class="card-title">{{$event->title}}</h1>
                        <p class="card-text">{{$event->description}}</p>
                        <p class="card-participants">{{count($event->users)}} Participantes</p>
                        <a href="/events/{{$event->id}}" class="card-link">Saiba mais</a>
                    </div>
                </div>
                @endforeach
                @if(count($events) == 0 && $search)
                    <p> Não há eventos disponíveis com {{$search}}. <a href="/"> Ver todos</a></p>
                @elseif(count($events) == 0)
                    <p>Não há eventos disponíveis.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection