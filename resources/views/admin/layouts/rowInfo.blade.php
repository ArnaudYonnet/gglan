<div class="box {{ $box_color }}">
    <div class="box-header with-border">
        <h3 class="box-title"> {{ $title }} </h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 table-responsive">
                {{ $table }}
            </div>
            <div class="col-md-4">
                <p class="text-center">
                    <strong><i class="fa fa-bar-chart"></i> Statistiques</strong>
                </p>
                {{ $stats }}
            </div>
        </div>
    </div>
</div>