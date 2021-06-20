<?php

namespace Modules\Setting\Admin\Tabs;

use Modules\Admin\Ui\CiTab;
use Modules\Admin\Ui\CiTabs;
use Modules\Base\Helpers\Locale;
use Modules\Base\Helpers\TimeZone;
use Modules\User\Entities\Role;
use Modules\Media\Entities\Media;

class SettingTabs extends CiTabs
{
    /**
     * Make new ci tabs with groups.
     *
     * @return void
     */
    public function make()
    {
        $this->group('general_settings', clean(trans('setting::settings.tabs.group.general_settings')))
            ->active()
            ->add($this->general())
            ->add($this->files());
    }

    private function general()
    {
        return tap(new CiTab('general', clean(trans('setting::settings.tabs.general'))), function (CiTab $tab) {
            $tab->active();
            $tab->weight(5);

            $tab->fields([
                'translatable.site_name',
                'site_email',
                'supported_locales.*',
                'default_locale',
                'default_timezone',
            ]);

            $siteLogo = Media::findOrNew(setting('site_logo'));

            $tab->view('setting::admin.settings.tabs.general', [
                'locales' => Locale::all(),
                'timeZones' => TimeZone::all(),
                'siteLogo'=>$siteLogo,
            ]);
        });
    }


    private function files()
    {
        return tap(new CiTab('files', clean(trans('setting::settings.tabs.files'))), function (CiTab $tab) {
            $tab->weight(10);

            $tab->fields([
                'default_file_size',
            ]);

            $tab->view('setting::admin.settings.tabs.files');
        });
    }



}
