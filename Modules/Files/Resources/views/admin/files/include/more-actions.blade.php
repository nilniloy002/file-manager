<div id="more-actions-overlay"></div>
<div class="custom-template more-actions">
    <div class="title"></div>
    <div class="custom-content">
        @if(setting('enable_file_move'))
        <div id="action-movefile" class="d-none">
            <h4 for="select_folder">{{ clean(trans('files::files.move.select_folder_to_move_file')) }}</h4>
            <div id="available-folder"></div>
            <form method="post" action="{{ route('admin.files.movefiles') }}" class="form-horizontal" id="form-move-file">
                {{ csrf_field() }}
                <input type="hidden" name="folder" id="folder" value="0">
                <input type="hidden" name="mfp" id="mfp" value="">
                <input type="hidden" name="filesid" id="filesid" value="0">
            </form>
        </div>
        @endif
        @if(setting('enable_file_share'))
        <div id="action-share" class="d-none">
            @include('files::admin.files.include.share')
        </div>
        @endif
        @hasAccess('admin.folders.create')
        <div id="action-newfolder" class="d-none">
            <form method="POST" action="{{ route('admin.folders.storeWithAssign') }}" class="form-horizontal" id="folder-form" novalidate>
                {{ csrf_field() }}
                {{ Form::text('name', clean(trans('folder::attributes.name')), $errors, null, ['required' => true]) }}
                <input type="hidden" name="is_active" value="1">
                <input type="hidden" name="parent_id" id="parent_id" value="0">
                <button type="submit" class="btn btn-primary" data-loading>
                    {{ clean(trans('admin::admin.buttons.save')) }}
                </button>
            </form>
        </div>
        @endHasAccess
    </div>
    <div class="custom-toggle">
        <i class="flaticon-error"></i>
    </div>
</div>

@push('scripts')
<script>
    (function () {
        "use strict";
        $(document).on("click",".btn-copy",function(){
        
            var copyText = document.getElementById("cis_link");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
        });
        $(document).ready(function() {
            
            $('.custom-template .custom-toggle').on('click',function(){
                $('.custom-template').removeClass('open');
                $(".more-actions #action-newfolder").addClass('d-none');
                $(".more-actions #action-movefile").addClass('d-none');
                $(".more-actions #action-share").addClass('d-none');
                $('#more-actions-overlay').hide();
                
                var form=$("#cis-sendemail-form");
                form[0].reset();
                $("#cis_link").val('');
                $("#password_protected").val('');
                $("#form-group-pp").show();
                $("#cis_links").hide();
                $(".btn-generate-link").show();
                $("#cis_sendemail").hide();
                $('#cismessage').html('');
                
            });
            var cishare=[];
            $(document).on("change","#files-table .select-row",function(e){
                
                if (e.currentTarget.checked) {
                    cishare.push(e.currentTarget.value);
                } else {
                    var id = (e.currentTarget.value);
                    _.pull(cishare, id);
                }
                if (cishare.length > 0) {
                    $('#btn-moreAction').prop( "disabled", false  );
                }else{
                    $('#btn-moreAction').prop( "disabled", true );
                }
                
            });
            
            //New Folder
            $(document).on("click","#btnNewFolder",function(e){
                e.preventDefault();
                    $(".more-actions #action-newfolder").removeClass('d-none');
                    $('#more-actions-overlay').show();
                    $(".more-actions").addClass('open');
                    $(".more-actions .title").html($(this).text());
                   let node=$('.file-folder-tree').jstree("get_selected", true);
                    $("#folder-form #parent_id").val(node[0].id);
                
            });
            if ($('.file-folder-tree').length !== 0) {
            $('.file-folder-tree').on('loaded.jstree', function(){
                @if($errors->has('name'))
                   $("#btnNewFolder").trigger("click");
                @endif
            });
            }
            
            
            //Move File
            $(document).on("click","#files-table #btnMove",function(e){
                e.preventDefault();
                if (cishare.length != 0) {
                    
                    $(".more-actions #action-movefile").removeClass('d-none');
                    $('#more-actions-overlay').show();
                    $(".more-actions").addClass('open');
                    $(".more-actions .title").html($(this).text());
                    
                    $("#form-move-file #filesid").val(cishare);
                }
            });
            
            //Download Zip
            $(document).on("click","#files-table #btnDownloadZip",function(e){
                e.preventDefault();
                if (cishare.length != 0) {
                    
                    var newForm = jQuery('<form>', {
                        'Method': 'POST',
                        'action': route('admin.files.downloadZip'),
                    }).append(jQuery('<input>', {
                        'name': '_token',
                        'value': $('meta[name="csrf-token"]').attr('content'),
                        'type': 'hidden'
                    })).append(jQuery('<input>', {
                        'name': 'filesid',
                        'value': cishare,
                        'type': 'hidden'
                    }));
                    newForm.appendTo('body').submit();
                }
            });
            
            //share
            $(document).on("click","#files-table #btnShare",function(e){
                e.preventDefault();
                if (cishare.length != 0) {
                    $(".more-actions #action-share").removeClass('d-none');
                    $('#more-actions-overlay').show();
                    $(".more-actions").addClass('open');
                    $(".more-actions .title").html($(this).text());
                }
            });
            $(document).on('click', '.btn-generate-link', function (e) { 
                e.preventDefault();
                if (cishare.length != 0) {
                    var fileid=cishare;
                    var pass=$("#password_protected").val()
                    var url = "{{ route('admin.files.generatelink') }}";
                    var token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: url,
                        type: 'post',
                        dataType: 'json',
                        data: {_token: token,fileid:fileid,pass:pass,submit: true},
                        success: function (data)
                        {
                            if(data.success)
                            {
                                $("#cis_link").val(data.link);
                                $("#form-group-pp").hide();
                                $("#cis_links").show();
                                $(".btn-generate-link").hide();
                                $(".btn-generate-link").removeClass("btn-loading");
                                $("#cis_sendemail").show();
                                
                            }else{
                                $('#cismessage').html('<div class="alert alert-danger" role="alert"> Something went to wrong. Please Try again later...</div>');
                            }
                        }
									
                    });
                }
            });
            $(document).on('submit', '#cis-sendemail-form', function (e) { 
                e.preventDefault();
                var fromEmail=$('#cis_email_from').val();
                var toEmail=$('#cis_email_send_to').val();
                var message=$('#cis_email_message').val();
                var url = $('#cis_link').val();
                var action_url = $('#cis-sendemail-form').attr('action');
                var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: action_url,
                    type: 'post',
                    dataType: 'json',
                    data: {_token: token,fromEmail:fromEmail,toEmail:toEmail,message:message,url:url,submit: true},
                    success: function (data)
                    {
                        $("#cis_sendmail").removeClass('show');
                        if(data.success)
                        {
                            $('#cismessage').html('<div class="alert alert-success" role="alert">'+data.msg+'</div>');
                            var form=$("#cis-sendemail-form");
                            form[0].reset();
                            $('.btn-send-email').removeClass('btn-loading');
                            
                        }else{
                            $('#cismessage').html('<div class="alert alert-danger" role="alert">'+data.msg+'</div>');
                            $('.btn-send-email').removeClass('btn-loading');
                        }
                    }
                                
                });
                
            });
            
            
            
        });
    })();  
</script>

@endpush
