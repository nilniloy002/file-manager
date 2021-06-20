require('@fancyapps/fancybox');
import Uploader from './Uploader';

if ($('.dropzone').length !== 0) {
    
    new Uploader();
}

import FileFolderTree from './FileFolderTree';

if ($('.file-folder-tree').length !== 0) {
    let tree = $('.file-folder-tree');
    new FileFolderTree(tree);
}
if ($('#available-folder').length !== 0) {
    $('#available-folder').jstree({
        core: {
            data: { url: route('admin.user-folder.tree') },
            check_callback: true,
        },
        plugins: ['dnd'],
        
    });
    $('#available-folder').on('loaded.jstree', () => {
        $('#available-folder').jstree('open_all')
    });
    $('#available-folder').on('select_node.jstree', (e, node) => {
        let id=node.selected[0];
        $('.custom-template').removeClass('open');
        $('#more-actions-overlay').hide();
        $("#form-move-file #folder").val(id);
        let nodepath=$('#available-folder').jstree("get_selected", true);
        let path=$('#available-folder').jstree().get_path(nodepath[0], '/');
        $("#form-move-file #mfp").val(window.btoa(path));
        $("#form-move-file").submit();
    });
}
$(document).on("click",".btn-fileDelete",function(e){
    e.preventDefault();
    let id=$(this).attr('data-id');
    console.log(id);
    let table = $("#files-table table").DataTable();
    let token = $("meta[name='csrf-token']").attr("content");
    
    swal({
            title: CI.langs['admin::admin.delete.confirmation'],
            text: CI.langs['admin::admin.delete.confirmation_message'],
            type: 'warning',
            buttons:{
                cancel: {
                    visible: true,
                    text : CI.langs['admin::admin.delete.btn_cancel'],
                    className: 'btn btn-danger'
                },        			
                confirm: {
                    text : CI.langs['admin::admin.delete.btn_delete'],
                    className : 'btn btn-success'
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                
                table.processing(true);
        
                let ids = id;
                
                $.ajax({
                    type: 'DELETE',
                    url: route('admin.files.destroy', { ids: ids }),
                    data: {
                        "_token": token,
                    },
                    success: () => {
                       //table.reload();
                       table.ajax.reload();
                        swal(CI.langs['admin::admin.delete.success_message'], {
                            icon: "success",
                            buttons : {
                                confirm : {
                                    className: 'btn btn-success'
                                }
                            }
                        });
                        
                    },
                    error: (xhr) => {
                        error(`${xhr.statusText}: ${xhr.responseJSON.message}`);

                    },
                });
                
            }
        });
    
});