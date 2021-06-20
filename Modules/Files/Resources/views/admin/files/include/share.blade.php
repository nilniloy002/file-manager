<div id="cismessage"></div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group form-floating-label" id="form-group-pp">
            <input type="text" class="form-control input-border-bottom" id="password_protected" name="password_protected" required="">
            <label for="password_protected" class="placeholder">{{  clean(trans('files::files.share.password')) }} </label>
            <small id="emailHelp2" class="form-text text-muted">{{ clean(trans('files::files.share.random_password_help')) }}</small>
        </div>
        <div class="form-group" id="cis_links"  style="display:none;">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-link"></i></span>
                </div>
                <input type="text" name="cis_link" id="cis_link" class="form-control" aria-describedby="basic-addon1" readonly>
                <div class="input-group-append">
                    <span class="input-group-text"><button class="btn btn-sm btn-success btn-copy">Copy</button></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary btn-generate-link btn-block" data-loading><i class="far fa-plus-square"></i> {{ clean(trans('files::files.share.create_share_link')) }}</button>
        </div>
    </div>
</div>

<div class="row" id="cis_sendemail" style="display:none;">
    <div class="col-md-12 text-center">
         <button class="btn btn-primary" data-toggle="collapse" href="#cis_sendmail" aria-expanded="false">
            <span class="btn-label">
                <i class="fas fa-envelope"></i>
            </span>
            {{ clean(trans('files::files.share.send_email')) }}
        </button>
    </div>
    <div class="col-md-12">
        <div class="collapse" id="cis_sendmail">
            <div class="card card-body">
                <form method="POST" action="{{ route('admin.files.sendemail') }}" class="form-horizontal" id="cis-sendemail-form">
                    {{ csrf_field() }}
                    <div class="form-group form-floating-label">
                        <input type="email" class="form-control input-border-bottom" id="cis_email_from" name="cis_email_from" value="{{ auth()->user()->email}}" required="">
                        <label for="cis_email_from" class="placeholder">{{ clean(trans('files::files.share.from')) }}</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input type="email" class="form-control input-border-bottom" id="cis_email_send_to" name="cis_email_send_to" required="">
                        <label for="cis_email_send_to" class="placeholder">{{ clean(trans('files::files.share.send_to')) }}</label>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control input-border-bottom" id="cis_email_message" name="cis_email_message" rows="5" spellcheck="false" placeholder="{{ clean(trans('files::files.share.message')) }}"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-send-email btn-block" data-loading>{{ clean(trans('files::files.share.send_email')) }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
            
            
        