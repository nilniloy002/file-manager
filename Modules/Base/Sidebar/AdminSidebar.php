<?php

namespace Modules\Base\Sidebar;

use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Sidebar;
use Nwidart\Modules\Facades\Module;
use Nwidart\Modules\Contracts\RepositoryInterface as Modules;

class AdminSidebar implements Sidebar
{
    protected $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function getMenu()
    {
        $this->build();

        return $this->menu;
    }

    public function build()
    {
        $this->addSidebarExtenders();
    }

    private function addSidebarExtenders()
    {
        $modules=Module::allEnabled();
        
        foreach ($modules as $module) {
            
            $extender="Modules\\{$module->getName()}\\Sidebar\\SidebarExtender";
            
            if (class_exists($extender)) {
                resolve($extender)->extend($this->menu);
            }

            $this->menu->add($this->menu);
        }
    }

    
}
