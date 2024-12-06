@extends('layouts.app')

@section('title', 'Trainers')

@section('content')
<div class="container">
    <!-- Barra de búsqueda -->
    <form action="{{ route('trainers.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input 
                type="text" 
                name="text" 
                class="form-control" 
                placeholder="Buscar usuarios..." 
                value="{{ request('text') }}"
            >
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>

    <!-- Lista de entrenadores -->
    <div class="row">
        @forelse($trainers as $trainer)
        <div class="col-sm-4 mb-4">
            <div class="card text-center" style="width: 18rem; margin-top: 70px;">
                <img 
                    style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;"
                    class="card-img-top rounded-circle mx-auto d-block" 
                    src="{{ asset('images/'.$trainer->avatar) }}" 
                    alt="{{ $trainer->name }}"
                >
                <div class="card-body">
                    <h5 class="card-title">{{ $trainer->name }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/delete/{{ $trainer->id }}" class="btn btn-danger">Delete</a>
                    <a href="/trainers/{{ $trainer->id }}" class="btn btn-secondary">Mostrar</a>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center">No se encontraron usuarios.</p>
        @endforelse
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.querySelector('input[name="text"]');
        const form = document.querySelector('form');

        searchInput.addEventListener('input', function () {
            if (!this.value.trim()) {
                form.submit();
            }
        });
    });
</script>
@endsection
