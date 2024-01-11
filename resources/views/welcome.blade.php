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
            <img src="../image/events/{{$event->image}}" alt="{{$event->title}}">
            <h5 class="card-title">{{$event->title}}</h5>
            <p class="card-date">{{date('d/m/Y', strtotime($event->date))}}</p>
            <a href="/events/{{$event->id}}" class="btn btn-primary">Saber mais</a>
        </div>
        @endforeach
        @if(count($events) == 0)
        <p>Não há eventos disponíveis</p>
        @endif
    </div>
</div>
@endsection