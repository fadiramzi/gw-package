<?php
namespace ninty9\superGW;

use Illuminate\Support\ServiceProvider;
class SuperGWServiceProvider extends ServiceProvider {
    public function register()
    {
        // $this->mergeConfig();
        $this->mergeConfigFrom(
            __DIR__ . '/Config/supergw.php', 'supergw'
        );
    }

    public function boot()
    {
        // $this->publishConfig();
        $this->publishes([
            __DIR__.'/config/supergw.php' =>  config_path('supergw.php'),
         ], 'config');
    }

    // private function mergeConfig()
    // {
    //     $path = $this->getConfigPath();
    //     $this->mergeConfigFrom($path, 'supergw');
    // }

    // private function publishConfig()
    // {
    //     $path = $this->getConfigPath();
    //     $this->publishes([$path => config_path('supergw.php')], 'config');
    // }

    

    // private function getConfigPath()
    // {
    //     return __DIR__ . '/../config/supergw.php';
    // }
}

?>