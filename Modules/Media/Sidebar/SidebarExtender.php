<?php

namespace Modules\Media\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;
use Modules\Base\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(clean(trans('media::medias.media')), function (Group $group) {
            $group->weight(50);
            $group->authorize(
                   $this->auth->hasAccess('admin.media.index') &&
                   $this->auth->user()->isAdmin()
            );
            $group->item(clean(trans('media::medias.library')), function (Item $item) {
                $item->weight(10);
                //$item->icon('fas fa-photo-video');
                $item->icon('fas fa-camera-retro');
                $item->route('admin.media.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.media.index')
                );
            });
        });
    }
}
