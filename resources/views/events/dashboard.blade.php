@extends('layouts.main')
@section('title','Criar evento')
@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Data</th>
                <th scope="col">Ações</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td scope="row">{{$loop->index + 1}}</td>
                <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
                <td>{{count($event->users)}} Participantes</td>
                <td>{{date('d/m/Y', strtotime($event->date))}}</td>
                <td>
                    <a href="/events/edit/{{$event->id}}" class="btn btn-info edit-btn">
                        <ion-icon name="create"></ion-icon>Editar
                    </a>
                </td>
                <td>
                    <form action="/events/{{$event->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-button">
                            <ion-icon name="trash"></ion-icon>Deletar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não tem eventos.</p><a href="/events/create" class="card-link">Criar evento</a>
    @endif
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que estou participando</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    @if(count($eventasparticipant)>0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Data</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventasparticipant as $event)
            <tr>
                <td scope="row">{{$loop->index + 1}}</td>
                <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
                <td>{{count($event->users)}} Participantes</td>
                <td>{{date('d/m/Y', strtotime($event->date))}}</td>
                <td>
                <form action="/events/leave/{{$event->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn">
                        <ion-icon name="trash"></ion-icon>Sair do evento
                    </button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não está participando de nenhum evento.</p><a href="/"> Veja a lista de eventos</a>
    @endif
</div>
@endsection