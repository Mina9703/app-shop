@extends('layouts.app')

@section('title', 'Trainer')

@section('content')
    <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;"
         class="card-img-top rounded-circle mx-auto d-block" 
         src="../images/{{$trainer->avatar}}" alt="Trainer Avatar">

    <h5 class="text-center">{{$trainer->name}}</h5>

    <div class="text-center">
        <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="/delete/{{$trainer->id}}" class="btn btn-primary">Delete</a>
        <a href="/trainers/{{$trainer->id}}/edit" class="btn btn-secondary">Editar...</a>
    </div>

    <div class="text-center" style="margin-top: 20px;">
        <a href="{{ route('generate.pdf', $trainer->id) }}" class="btn btn-sm btn-primary">Generar PDF</a>
    </div>
@endsection
