<?php

namespace Modules\Files\Admin\Tabs;

use Modules\Admin\Ui\CiTab;
use Modules\Admin\Ui\CiTabs;
use Modules\Files\Entities\Files;


class FilesTabs extends CiTabs
{
    public function make()
    {
        $this->group('files_information', clean(trans('files::files.tabs.group.files_information')))
            ->active()
            ->add($this->general());
    }

    private function general()
    {
        return tap(new CiTab('general', clean(trans('files::files.tabs.general'))), function (CiTab $tab){
            $tab->active();
            $tab->weight(10);

            $tab->fields([
                'filename',
                'description',
            ]);
            $tab->view('files::admin.files.tabs.general', []);
        });
    }
    
}
