@extends('layouts.main')

@section('title','Eventos')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie um evento</h1>

    <form action='/events' method='POST' enctype='multipart/form-data'>
        @csrf {{-- Obrigatorio para enviar forms --}}
        <div class='form-group'>
            <label for='title'>Evento:</label>
            <input type='text' class='form-control' id='title' name='title' placeholder="Nome do evento">
        </div>
        <div class='form-group'>
            <label for='description'>Descrição:</label>
            <input type='text' class='form-control' id='description' name='description' placeholder="Descrição do evento">
        </div>
        <div class='form-group'>
            <label for='local'>Local:</label>
            <input type='text' class='form-control' id='local' name='local' placeholder="Nome do evento">
        </div>
        <div class='form-group'>
            <label for='country'>País:</label>
            <input type='text' class='form-control' id='country' name='country' placeholder="Nome do evento">
        </div>
        <div class='form-group'>
            <label for='state'>Estado:</label>
            <input type='text' class='form-control' id='state' name='state' placeholder="Estado do evento">
        </div>
        <div class='form-group'>
            <label for='city'>Cidade:</label>
            <input type='text' class='form-control' id='city' name='city' placeholder="Cidade do evento">
        </div>
        <div class='form-group'>
            <label for='date'>Data:</label>
            <input type='text' class='form-control' id='date' name='date'>
        </div>
        <div class='form-group'>
            <label for='productor'>Organizador:</label>
            <input type='text' class='form-control' id='productor' name='productor' placeholder="Organizador">
        </div>
        <div class='form-group'>
            <label for='private'>O evento é privado?</label>
            <select name='private' id='private' class='form-control'>
                <option value='0'>Não</option>
                <option value='0'>Sim</option>
            </select>
        </div>
        <div class='form-group'>
            <label for='image'>Imagem do envento:</label>
            <input type="file" id="image" name="image" cçass="from-control-file">
        </div>


        <input type='submit' class='btn btn-primary' value='Criar Evento'>
    </form>
</div>

@endsection