<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body" id="media-table">
                <div class="table-responsive">
                   
                        <table class="display table table-striped table-hover" >
                            <thead>
                                 <tr>
                                    @include('admin::include.table.select-all',["name"=>clean(trans('media::medias.medias'))])
                                    <th>{{ clean(trans('media::medias.table.media')) }}</th>
                                    <th>{{ clean(trans('media::medias.table.name')) }}</th>
                                    @if(auth()->user()->isAdmin())
                                    <th>{{ clean(trans('files::files.table.user')) }}</th>
                                    @endif
                                    <th>{{ clean(trans('media::medias.table.size')) }}</th>
                                    <th>{{ clean(trans('media::medias.table.extension')) }}</th>
                                    <th data-sort>{{ clean(trans('admin::admin.table.created')) }}</th>
                                    <th>{{ clean(trans('media::medias.table.action')) }}</th>
                                </tr>
                            </thead>

                            <tbody></tbody>
                        </table>
                </div>
            </div>
        </div>
    
    </div>
</div>