@extends('site.layouts.template')

@section('content')
    <div class="container">
        <div class="col-lg-8 mx-auto">
            {!! $rule->content !!}

            <h5>
                <u> Last update: {{ \Carbon\Carbon::parse($rule->updated_at)->format('d/m/Y') }} </u>
            </h5>
        </div>
    </div>
@endsection
