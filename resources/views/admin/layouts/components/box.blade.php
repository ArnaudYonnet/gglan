<div class="{{ $col }} ">
    <div class="box box-{{ $color }}"> {{-- Primary, success, danger, etc... --}}
        <div class="box-header">
            <h3 class="box-title"> {{ $title }} </h3>
        </div>

        <div class="box-body {{ $class }}">
            {{ $slot }}
        </div>
    </div>
</div>