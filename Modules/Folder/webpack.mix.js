let mix = require('laravel-mix');
let execSync = require('child_process').execSync;

mix.js('Modules/Folder/Resources/assets/admin/js/app.js', 'Modules/Folder/Assets/admin/js/folder.js')
    .scripts('Modules/Folder/node_modules/jstree/dist/jstree.js', 'Modules/Folder/Assets/admin/js/jstree.js')
    .sass('Modules/Folder/Resources/assets/admin/sass/app.scss', 'Modules/Folder/Assets/admin/css/folder.css')
    .copy('Modules/Folder/node_modules/jstree/dist/themes/default/32px.png', 'Modules/Folder/Assets/admin/css')
    .copy('Modules/Folder/node_modules/jstree/dist/themes/default/40px.png', 'Modules/Folder/Assets/admin/css')
    .copy('Modules/Folder/node_modules/jstree/dist/themes/default/throbber.gif', 'Modules/Folder/Assets/admin/css');
