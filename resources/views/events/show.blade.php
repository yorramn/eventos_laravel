@extends('layouts.main')
@section('title', $event->title)
@section('content')
<hr>
<div class="col-md 10 offset-md-1">
    <div class="row offset-md-1">
        <div class="col-md-6">
            <div id="info-container">
                <img src="/img/events/{{$event->image}}" alt="{{$event->title}}" class="img-fluid">
            </div>
        </div>
        <div class="col-md-6">
            <div id="info-container" class="col-md-6 ">
                <h1 class="display-2 text-center">{{$event->title}}</h1>
                <p class="event-city">
                    <ion-icon size="large" name="pin"></ion-icon>{{$event->city}}
                </p>
                <p class="event-participants">
                    <ion-icon size="large" name="people"></ion-icon> {{count($event->users)}} Participantes
                </p>
                <p class="event-owner">
                    <ion-icon size="large" name="star"></ion-icon>Dono do evento: {{$eventOwner['name']}}
                </p>
                @if(!$hasUserJoin)
                <form action="/events/join/{{$event->id}}" method="post">
                    @csrf
                    <a href="/events/join/{{$event->id}}" class="btn btn-primary" id="event-submit" onclick="event.preventDefault(); this.closest('form').submit();">Confirmar presença</a>
                </form>
                @else
                <p>Você já está cadastrado neste evento. Visualize a <a href="/">lista de eventos</a></p>
                @endif

                <h3>Conta com:</h3>
                <ul class="list-group">
                    @foreach($event->itens as $item)
                    <li class="list-group-item">
                        <ion-icon name="play"></ion-icon>{{$item}}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Descrição sobre o evento:</h3>
            <p class="h4">{{$event->description}}</p>
        </div>
    </div>
</div>
@endsection