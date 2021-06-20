let mix = require('laravel-mix');
let execSync = require('child_process').execSync;

mix.js('Modules/Media/Resources/assets/admin/js/app.js', 'Modules/Media/Assets/admin/js/media.js')
    .sass('Modules/Media/Resources/assets/admin/sass/app.scss', 'Modules/Media/Assets/admin/css/media.css');
    
