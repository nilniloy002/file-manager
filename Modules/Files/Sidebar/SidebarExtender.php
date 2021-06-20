<?php

namespace Modules\Files\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;
use Modules\Base\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(clean(trans('files::files.files')), function (Group $group) {
            $group->weight(10);
            $group->authorize(
                   $this->auth->hasAccess('admin.files.index') || $this->auth->hasAccess('admin.files.create') || $this->auth->hasAccess('admin.files-folder.index') || $this->auth->hasAccess('admin.files-extension.index')
            );
            $group->item(clean(trans('files::files.files')), function (Item $item) {
                $item->weight(10);
                $item->icon('fas fa-file');
                $item->route('admin.files.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.files.index')
                );
            });
            
            $group->item(clean(trans('files::files.upload')), function (Item $item) {
                $item->weight(20);
                $item->icon('fas fa-file-upload');
                $item->route('admin.files.create');
                $item->authorize(
                    $this->auth->hasAccess('admin.files.create')
                );
            });
            
            /* $group->item(clean(trans('files::files.files_folder')), function (Item $item) {
                $item->weight(25);
                $item->icon('fas fa-folder-open');
                $item->route('admin.files-folder.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.files-folder.index')
                );
            }); */
            
            $group->item(clean(trans('files::files.files_extension')), function (Item $item) {
                $item->weight(30);
                $item->icon('fas fa-tags');
                $item->route('admin.files-extension.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.files-extension.index')
                );
            });
            
        });
    }
}
