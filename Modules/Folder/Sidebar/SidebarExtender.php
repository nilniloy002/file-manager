<?php

namespace Modules\Folder\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;
use Modules\Base\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(clean(trans('files::files.files')), function (Group $group) {
            $group->item(clean(trans('folder::sidebar.folders')), function (Item $item) {
                $item->weight(25);
                $item->icon('fas fa-folder-open');
                $item->route('admin.folders.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.folders.index')
                );
            });
        });
    }
}
