var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.sass('app.scss');


    //Collecting all css files into one file, to reduce the http calls. To comprimize the file use "gulp --production" flag.
    mix.styles([
    	'libs/bootstrap.min.css',
    	'app.css',
        'libs/select2.min.css'

    	], 'public/output/final.css', 'resources/css'); //second argument is the destined file you want it to be put in,
    												//third argument is the paste directory.
    	//The same can be done for js files.
    mix.scripts([
        'libs/jquery.js',
        'libs/select2.min.js', 
        'libs/bootstrap.min.js'

        ], 'public/output/final.js', 'resources/js'); 


    mix.version('public/output/final.css');
    //version adds a build directory where

});
