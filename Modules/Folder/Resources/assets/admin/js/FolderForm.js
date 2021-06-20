import FolderTree from './FolderTree';

export default class {
    constructor() {
        let tree = $('.folder-tree');

        new FolderTree(this, tree);

        this.collapseAll(tree);
        this.expandAll(tree);
        this.addRootFolder();
        this.addSubFolder();
        this.deleteFolder();

        $('#folder-form').on('submit', this.submit);
    }

    collapseAll(tree) {
        $('.collapse-all').on('click', (e) => {
            e.preventDefault();

            tree.jstree('close_all');
        });
    }

    expandAll(tree) {
        $('.expand-all').on('click', (e) => {
            e.preventDefault();

            tree.jstree('open_all');
        });
    }

    addRootFolder() {
        $('.add-root-folder').on('click', () => {
            $('.add-sub-folder').addClass('disabled');

            $('.folder-tree').jstree('deselect_all');

            this.clear();

            
        });
    }

    addSubFolder() {
        $('.add-sub-folder').on('click', () => {
            let selectedId = $('.folder-tree').jstree('get_selected')[0];

            if (selectedId === undefined) {
                return;
            }

            this.clear();
            
            window.form.appendHiddenInput('#folder-form', 'parent_id', selectedId);

            
        });
    }

    deleteFolder() {
        $('.btn-delete-folder').on('click', (e) => {
           
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
                    $('#folders-delete-form').submit();
                }
                $('.btn-delete-folder').removeClass('btn-loading');
                
            });

        });
    }
    fetchFolder(id) {
        $('.add-sub-folder').removeClass('disabled');

        $.ajax({
            type: 'GET',
            url: route('admin.folders.show', id),
            success: (folder) => {
                this.update(folder);
            },
            error: (xhr) => {
                error(`${xhr.statusText}: ${xhr.responseJSON.message}`);
            },
        });
    }

    update(folder) {
        window.form.removeErrors();

        $('.btn-delete-folder').removeClass('d-none');
        
        $('.form-group .help-block').remove();

        $('#folders-delete-form').attr('action', route('admin.folders.destroy', folder.id));
        
        $('#name').val(folder.name);

        $('#slug').val(folder.slug);
        $('#slug-field').removeClass('d-none');
        
        $('#name').prop('readonly', true);
        $('#slug').prop('readonly', true); 
        
        $('#assign_toall').prop('checked', folder.assign_toall);
        $('#is_active').prop('checked', folder.is_active);
        $('#public_download').prop('checked', folder.public_download);

        $('#folder-form input[name="parent_id"]').remove();
    }

    clear() {
        $('#name').val('');

        $('#slug').val('');
        $('#slug-field').addClass('d-none');
        $('#name').prop('readonly', false);
        $('#slug').prop('readonly', false); 
        $('#assign_toall').prop('checked', false);
        $('#is_active').prop('checked', false);
        $('#public_download').prop('checked', false);
        
        $('.btn-delete-folder').addClass('d-none');
        $('.form-group .help-block').remove();

        $('#folder-form input[name="parent_id"]').remove();

    }

    submit(e) {
        let selectedId = $('.folder-tree').jstree('get_selected')[0];

        if (! $('#slug-field').hasClass('d-none')) {
            window.form.appendHiddenInput('#folder-form', '_method', 'put');

            $('#folder-form').attr('action', route('admin.folders.update', selectedId));
        }

        e.currentTarget.submit();
    }
}
