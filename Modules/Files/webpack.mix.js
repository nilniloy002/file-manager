let mix = require('laravel-mix');
let execSync = require('child_process').execSync;

mix.js('Modules/Files/Resources/assets/admin/js/app.js', 'Modules/Files/Assets/admin/js/files.js')
    .scripts('Modules/Files/node_modules/jstree/dist/jstree.js', 'Modules/Files/Assets/admin/js/jstree.js')
    .sass('Modules/Files/Resources/assets/admin/sass/app.scss', 'Modules/Files/Assets/admin/css/files.css')
    .copy('Modules/Files/node_modules/jstree/dist/themes/default/32px.png', 'Modules/Files/Assets/admin/css')
    .copy('Modules/Files/node_modules/jstree/dist/themes/default/40px.png', 'Modules/Files/Assets/admin/css')
    .copy('Modules/Files/node_modules/jstree/dist/themes/default/throbber.gif', 'Modules/Files/Assets/admin/css');
    
