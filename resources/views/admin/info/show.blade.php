@extends('admin.layouts.template') 
@section('title') Infos Pratiques
@endsection
 
@section('subtitle') Gestion des infos pratiques
@endsection
 
@section('content')
    @include('sweetalert::view')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">CK Editor
                    <small>Advanced and full of features</small>
                </h3>
            </div>
            <div class="box-body pad">
                <form class="form-horizontal" method="POST" action="/admin/infos">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('contenu') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <textarea id="contenu" name="contenu" rows="10" cols="80" required>
                                {{ $info->info }}
                            </textarea>
                            <span class="help-block">
                                <strong>{{ $errors->first('contenu') }}</strong>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Modifier
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection