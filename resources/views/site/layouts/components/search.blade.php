<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form" action="/{{ $search }}/search" method="POST">
            @csrf

            <div class="input-group" class="adv-search">
                <input type="text" name="name" class="form-control" placeholder=" {{ __('Search a '. str_singular($search)) }} " required/>

                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-danger">
                        <span class="fas fa-search" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>