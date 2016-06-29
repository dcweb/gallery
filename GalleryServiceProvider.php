<?php

namespace	Dcms\Gallery;
/**
*
* @author web <web@groupdc.be>
*/
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class GalleryServiceprovider extends ServiceProvider{
 /**
  * Indicates if loading of the provider is deferred.
  *
  * @var bool
  */
 protected $defer = false;

 public function boot()
 {

   $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'dcms');
   $this->setupRoutes($this->app->router);
   // this  for conig
   $this->publishes([
      //// __DIR__.'/config/contact.php' => config_path('contact.php'),
      //__DIR__.'/resources/views' => resource_path('views/vendor/dcms/core'),
      __DIR__.'/public/assets' => public_path('packages/dcms/gallery'),
    //  __DIR__.'/config/auth.php' => config_path('dcms/gallery/auth.php'),
      __DIR__.'/config/dcms_sidebar.php' => config_path('dcms/gallery/dcms_sidebar.php'),
   ]);

    $this->app['config']['dcms_sidebar'] =  array_replace_recursive($this->app["config"]["dcms_sidebar"], config('dcms.gallery.dcms_sidebar'));
    //$this->app['config']['auth'] = array_replace_recursive($this->app["config"]["auth"], config('dcms.gallery.auth'));
 }
 /**
  * Define the routes for the application.
  *
  * @param  \Illuminate\Routing\Router  $router
  * @return void
  */
 public function setupRoutes(Router $router)
 {
   $router->group(['namespace' => 'Dcms\Gallery\Http\Controllers'], function($router)
   {
     require __DIR__.'/Http/routes.php';
   });

 }

 public function register()
 {

   $this->registerGallery();
   //b// config([
   //b//    'config/contact.php',
   //b// ]);

 }

 private function registerGallery()
 {

    $this->app->bind('gallery',function($app){
     return new Gallery($app);
   });

 }

}

 ?>
