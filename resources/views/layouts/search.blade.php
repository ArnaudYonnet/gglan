<link rel="stylesheet" href="{{ asset('css/search.css') }}">
<script src="{{ asset('js/search.js') }}"></script>

<div id="search">
    <button type="button" class="close">×</button>
    <form method="POST" action="/{{ $type }}/search">
        {{ csrf_field() }}
        <input type="search" name="search" placeholder="{{$message}}" />
        <button type="submit" class="btn btn-danger">Rechercher</button>
    </form>
</div>

