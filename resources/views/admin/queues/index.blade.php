@extends('admin.layouts.template')

@section('header')
    Queues
@endsection

@section('description')
    {{ __('Manage your jobs') }}
@endsection

@section('content')

   @component('admin.layouts.components.box', ['col' => 'col-xs-12', 'color' => 'info', 'class' => 'table-responsive'])
        @slot('title')
            Jobs
        @endslot

        @component('admin.layouts.components.table', ['id' => 'table', 'class' => 'table-striped'])
            @slot('headers')
                <th>ID</th>
                <th>{{ __('Type') }}</th>
                <th>{{ __('Created At') }}</th>
                <th> {{ __('Status') }} </th>
                <th></th>
            @endslot

            @slot('content')
                @foreach ($jobs as $job)
                    <tr>
                        <td> {{ $job->job_id }} </td>
                        <td> {{ $job->type }} </td>
                        <td> {{ $job->created_at->format('d/m/Y | H:i:s') }} </td>
                        <td>
                            @switch($job->status)
                                @case("queued")
                                    <span class="label label-primary"> {{ __('Queued') }} </span>
                                    @break
                                @case("executing")
                                    <span class="label label-warning"> {{ __('Executing') }} </span>
                                    @break
                                @case("finished")
                                    <span class="label label-success"> {{ __('Finished') }} </span>
                                    @break
                                @default
                                    <span class="label label-danger" title=" {{ $job->output['message'] }}"> {{ __('Failed') }} </span>
                                    @break
                            @endswitch
                        </td>
                        <td></td>
                    </tr>
                @endforeach
            @endslot
        @endcomponent
    @endcomponent
@endsection