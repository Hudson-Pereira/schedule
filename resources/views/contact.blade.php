@extends('layouts.main')

@section('title', "Contato")

@section('content')

<h1>Contato</h1>

@if($busca != '')
<p> {{$busca}} </p>
@endif

@endsection