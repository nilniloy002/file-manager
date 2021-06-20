<?php

namespace Modules\Base\Traits;

trait LoadsConfigFile
{
    public function loadConfigs($paths)
    {
        if (app()->configurationIsCached())
            return;
        

        foreach (array_wrap($paths) as $path) {
            if ($this->isModule()) {
                
                $this->mergeConfig($path);

                continue;
            }
        }
    }

    private function isModule()
    {
        return strtok(get_called_class(), '\\') === 'Modules';
    }

    private function mergeConfig($path)
    {
        $className=$this->getClassName();
        $module = strtolower($className);
        $modulePath = base_path("Modules/{$className}");
        $moduleFilePath = "{$modulePath}/Config/{$path}";
        
        $filename = pathinfo($path, PATHINFO_FILENAME);

        $this->mergeConfigFrom($moduleFilePath,"ci.module.{$module}.{$filename}");
    }

    private function getClassName()
    {
        return explode('\\', get_called_class())[1];
    }

}
