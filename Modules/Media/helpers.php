<?php
use Modules\Media\Entities\Media;

if (! function_exists('display_media_filesize')) {
    
    function display_media_filesize($size)
    {
        $size = max(0, (int)$size);
        $units = array( 'b', 'Kb', 'Mb', 'Gb', 'Tb', 'Pb', 'Eb', 'Zb', 'Yb');
        $power = $size > 0 ? floor(log($size, 1024)) : 0;
        return number_format($size / pow(1024, $power), 2, '.', ',') .' '.$units[$power];
    }
    
    
}
if (! function_exists('get_site_logo')) {
    
    function get_site_logo()
    {
        return Media::findOrNew(setting('site_logo'))->path;
    }
    
    
}
