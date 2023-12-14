@extends('layouts.main')

@section('title', 'Eventos')

@section('content')

<h1>Eventos agendados</h1>

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="">
        <input type="text" id="serach" class="form-control" placeholder="Procurar...">
    </form>
</div>

<div id="events-container" class="col-md-12">
    <h2>Pŕoximos eventos</h2>
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3">
            <img src="../image/fundo.jpg" alt="{{$event->title}}">
            <h5 class="card-title">{{$event->title}}</h5>
            <p class="card-date">{{$event->date}}</p>
            <a href="" class="btn btn-primary">Saber mais</a>
        </div>
        @endforeach
    </div>
</div>

@endsection