@extends('layouts.main')

@section('title','Editar: ' . $event->title)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Edição de evento {{$event->title}}</h1>

    <form action='/events/update/{{$event->id}}' method='POST' enctype='multipart/form-data'>
        @method('PUT') {{-- para editar o form deve estar post e ter este @method --}}
        @csrf {{-- Obrigatorio para enviar forms --}}
        <div class='form-group'>
            <label for='title'>Evento:</label>
            <input type='text' class='form-control' id='title' name='title' placeholder="Nome do evento" value="{{$event->title}}">
        </div>
        <div class='form-group'>
            <label for='description'>Descrição:</label>
            <input type='text' class='form-control' id='description' name='description' placeholder="Descrição do evento" value="{{$event->description}}">
        </div>
        <div class='form-group'>
            <label for='local'>Local:</label>
            <input type='text' class='form-control' id='local' name='local' placeholder="Local do evento" value="{{$event->local}}">
        </div>
        <div class='form-group'>
            <label for='country'>País:</label>
            <input type='text' class='form-control' id='country' name='country' placeholder="Nome do evento" value="{{$event->country}}">
        </div>
        <div class='form-group'>
            <label for='state'>Estado:</label>
            <input type='text' class='form-control' id='state' name='state' placeholder="Estado do evento" value="{{$event->state}}">
        </div>
        <div class='form-group'>
            <label for='city'>Cidade:</label>
            <input type='text' class='form-control' id='city' name='city' placeholder="Cidade do evento" value="{{$event->city}}">
        </div>
        <div class='form-group'>
            <label for='date'>Data:</label>
            <input type='date' class='form-control' id='date' name='date' value="{{$event->date }}">
        </div>
        <div class='form-group'>
            <label for='productor'>Organizador:</label>
            <input type='text' class='form-control' id='productor' name='productor' placeholder="Organizador" value="{{$event->productor}}">
        </div>
        <div class='form-group'>
            <label for='private'>O evento é privado?</label>
            <select name='private' id='private' class='form-control'>
                <option value='0'>Não</option>
                <option value='1' {{ $event->private == 1 ? "selected='selected'" : ""}}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <lable for='title'>Adicione itens de infraestrutura:</lable>
            <div class="form-group">
                <input type='checkbox' name='itens[]' value='cadeiras'> Cadeiras <!--name entre colchetes para mandar mais de um item npara mesma coluna na table (json)-->
                <input type='checkbox' name='itens[]' value='palco'> Palco
                <input type='checkbox' name='itens[]' value='openbar'> Open bar
                <input type='checkbox' name='itens[]' value='openfood'> open food
            </div>
        </div>
        <div class='form-group'>
            <label for='image'>Imagem do envento:</label>
            <input type="file" id="image" name="image" class="from-control-file">
            <img src="/image/events/{{$event->image}}" alt="{{$event->image}}" class="img-preview">
        </div>


        <input type='submit' class='btn btn-primary' value='Editar Evento'>
    </form>
</div>

@endsection