let glob = require('glob');
let mix = require('laravel-mix');
let WebpackShellPlugin = require('webpack-shell-plugin');


let configs = glob.sync('./Modules/*/webpack.mix.js');

if (process.env.module !== undefined)  {
    let module = process.env.module.charAt(0).toUpperCase() + process.env.module.slice(1);

    configs = [`./Modules/${module}/webpack.mix.js`];
}

mix.setPublicPath('./')
    .options({ processCssUrls: false });

let onBuildExit = [];

configs.forEach(config => {
    require(config);

    let module = config.match(/Modules\/(\w+?)\//);
    
    if (module !== null) {
        onBuildExit.push(`php artisan module:publish ${module[1]}`);
    }  
});

mix.webpackConfig({
    plugins: [
        new WebpackShellPlugin({ onBuildExit }),
    ],
});
