<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter un partenaire</h4>
            </div>
            <form class="form-horizontal" method="POST" action="/admin/partenaires">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('nom_partenaire') ? ' has-error' : '' }}">
                        <label for="nom_partenaire" class="col-md-4 control-label">Nom Partenaire</label>
                        <div class="col-md-6">
                            <input id="nom_partenaire" type="text" class="form-control" name="nom_partenaire"  required autofocus> 
                            @if ($errors->has('nom_partenaire'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nom_partenaire') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('site_partenaire') ? ' has-error' : '' }}">
                        <label for="site_partenaire" class="col-md-4 control-label">Site Partenaire</label>
                        <div class="col-md-6">
                            <input id="site_partenaire" type="text" class="form-control" name="site_partenaire" placeholder="Ex: https://site.partenaire.com"> 
                            @if ($errors->has('site_partenaire'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('site_partenaire') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('img_partenaire') ? ' has-error' : '' }}">
                        <label for="img_partenaire" class="col-md-4 control-label">Logo Partenaire</label>
                        <div class="col-md-6">
                            <input id="img_partenaire" type="text" class="form-control" name="img_partenaire" placeholder="Ex: https://imgur.com/"> 
                            @if ($errors->has('img_partenaire'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('img_partenaire') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>