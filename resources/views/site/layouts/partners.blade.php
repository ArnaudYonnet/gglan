<div class="container-fluid">
    <div class="row mx-auto">
        <div class="col-lg-12 mx-auto">
            {{-- <h3 class="mx-auto">Un énorme merci à nos partenaires !</h3> --}}
        </div>
        @foreach (App\Partner::all() as $partner)
        <div class="col-lg-2 col-md-2 col-12 pb-2">
            <a href="{{ $partner->site }}" title="{{ $partner->name }}" target="_blank">
                <img class="img-fluid" src="{{ asset(Storage::url($partner->logo)) }}" alt=" {{ $partner->name }} " style="max-width: 85px;">
            </a>
        </div>
        @endforeach
    </div>
</div>