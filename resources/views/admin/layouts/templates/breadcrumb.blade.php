<ol class="breadcrumb">
    @foreach (config('breadcrumb') as $item)

        {{-- Home / Dashboard --}}
        @if (Route::currentRouteName() == "admin.dashboard")
            <li class="active">
                <i class="fas fa-home"></i> Dashboard
            </li>
            @break
        @endif
        
        {{-- Index Route --}}
        @if (Route::currentRouteName() == $item['index'])
            <li>
                <a href=" {{ route('admin.dashboard') }} ">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>

            <li class="active"><i class="{{ $item['icon'] }}"></i> {{ __($item['name']) }}</li>
        @endif

        {{-- Edit Route --}}
        @if (Route::currentRouteName() == $item['edit'])
            <li>
                <a href=" {{ route('admin.dashboard') }} ">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route($item['index']) }}">
                    <i class="{{ $item['icon'] }}"></i> {{ __($item['name']) }}
                </a>
            </li>

            <li class="active">
                <i class="fas fa-edit"></i> Edit
            </li>
        @endif

    @endforeach
</ol>