@foreach ($pages as $page)
    <p>{{ $page->title }}</p>
    <a href="{{ url('pages/' . $page->id . '/edit') }}">Editar</a>
    <br>
    <br>
@endforeach


<a href="{{ url('pages/create') }}">Nova página</a>