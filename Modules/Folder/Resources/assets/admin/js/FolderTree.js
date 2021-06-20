export default class {
    constructor(folderForm, selector) {
        this.selector = selector;

        $.jstree.defaults.dnd.touch = true;
        $.jstree.defaults.dnd.copy = false;
        $.jstree.defaults.dnd.is_draggable  = false;
        this.fetchFolderTree();

        // On selecting a folder.
        selector.on('select_node.jstree', (e, node) => folderForm.fetchFolder(node.selected[0]));

        // Expand folders when jstree is loaded.
        selector.on('loaded.jstree', () => selector.jstree('open_all'));

        // On updating folder tree.
        $(document).on('dnd_stop.vakata', (e, node) => {
            setTimeout(() => {
                this.updateFolderTree(node);
            }, 100);
        });
    }

    fetchFolderTree() {
        this.selector.jstree({
            core: {
                data: { url: route('admin.folders.tree') },
                check_callback: true,
            },
            plugins: ['dnd'],
        });
    }

    updateFolderTree(node) {
        this.loading(node, true);

        $.ajax({
            type: 'PUT',
            url: route('admin.folders.tree.update'),
            data: { folder_tree: this.getFolderTree() },
            success: (message) => {
                success(message);

                this.loading(node, false);
            },
            error: (xhr) => {
                error(`${xhr.statusText}: ${xhr.responseJSON.message}`);

                this.loading(node, false);
            },
        });
    }

    getFolderTree() {
        let folders = this.selector.jstree(true).get_json('#', { flat: true });

        return folders.reduce((formatted, folder) => {
            return formatted.concat({
                id: folder.id,
                parent_id: (folder.parent === '#') ? null : folder.parent,
                position: folder.data.position,
            });
        }, []);
    }

    loading(node, state) {
        for (let nodeElement of node.data.obj) {
            if (state) {
                $(nodeElement).addClass('jstree-loading');
            } else {
                $(nodeElement).removeClass('jstree-loading');
            }
        }
    }
}
