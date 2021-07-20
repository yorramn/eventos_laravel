@extends('layouts.main')
@section('title','Editar evento'. $event->title)
@section('content')

<div class="container">
    <div class="row text-center">
        <h1 class="display-2">Editar evento {{$event->title}}</h1>
    </div>
    <div class="row">
        <form action="/events/update/{{$event->id}}" class="form-control" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <input type="file" name="image" id="image" class="form-control-file">
                <img src="/img/events/{{$event->image}}" class="w-25 img-preview" alt="" class="">
            </div>
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" name="title" class="form-control" id="title" value="{{$event->title}}">
            </div>
            <div class="form-group">
            <label for="date"> Data do evento:</label>
            <input type="date" name="date" id="date" value="{{$event->date->format('Y-m-d')}}">
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" id="cidade" value="{{$event->city}}">
            </div>
            <div class="form-group">
                <label for="privado">Evento privado?</label>
                <select name="private" id="privado" class="form-control" required>
                    <option value="0">Não</option>
                    <option value="1" {{$event->private == 1 ? "selected = 'selected'":""}}>Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="descrição">Descrição:</label>
                <textarea name="description" class="form-control" id="descrição" cols="30" rows="10">{{$event->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Adicione os itens de infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value="Cadeiras" id="">Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value="Palco" id="">Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value="Cerveja grátis" id="">Cerveja grátis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value="Open food" id="">Open food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value="Brindes" id="">Brindes
                </div>
            </div>
            <input type="submit" value="Editar evento" class="btn mt-4 btn-primary">
        </form>
    </div>
</div>

@endsection