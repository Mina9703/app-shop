<form action="/search" method="GET">
    <input type="text" name="query" placeholder="Buscar entrenador..." />
    <button type="submit">Buscar</button>
</form>

<ul>
    @if(isset($trainers))
        @foreach ($trainers as $trainer)
            <li>{{ $trainer['name'] }} {{ $trainer['apellido'] }}</li>
        @endforeach
    @else
        <li>No se encontraron resultados</li>
    @endif
</ul>
