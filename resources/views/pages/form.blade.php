<form method="POST" class="" action="{{ url('pages') }}">

    @method($page->id ? "PUT" : "POST")
    @csrf

    <input type="hidden" name="id" value="{{ $page->id ?? '' }}">

    <input type="text" name="title" value="{{ $page->name }}" class="form-control"/>

    <button type="submit">Salvar</button>

</form>