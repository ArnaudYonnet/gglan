@extends('layouts.template') 
 
@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            {!! $info->info !!}
        </div>
    </div>
@endsection