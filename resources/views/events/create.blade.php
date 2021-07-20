@extends('layouts.main')
@section('title','Criar evento')
@section('content')

<div class="container">
    <div class="row text-center">
        <h1 class="display-2">Crie seu evento</h1>
    </div>
    <div class="row">
        <form action="/events" class="form-control" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <input type="file" name="image" id="image" class="form-control-file" required>
            </div>
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" name="title" class="form-control" id="title" required placeholder="Digite aqui o nome do evento">
            </div>
            <div class="form-group">
            <label for="date"> Data do evento:</label>
            <input type="date" name="date" id="date" required>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" name="city" required class="form-control" id="cidade" placeholder="Digite aqui o local do evento">
            </div>
            <div class="form-group">
                <label for="privado">Evento privado?</label>
                <select name="private" id="privado" class="form-control" required>
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="descrição">Descrição:</label>
                <textarea name="description"required placeholder="Descreva o evento" class="form-control" id="descrição" cols="30" rows="10"></textarea>
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
            <input type="submit" value="Criar evento" class="btn mt-4 btn-primary">
        </form>
    </div>
</div>

@endsection