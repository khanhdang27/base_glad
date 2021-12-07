<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider {

    public function register() {
    }

    public function boot() {
        $path = base_path() . '/modules';
        $directories = array_map('basename', File::directories($path));
        foreach ($directories as $module) {
            $module_path = $path . '/' . $module. '/';
            $namespace = 'Modules\\' . $module;

            /** Migrations */
            if (File::exists($module_path . "Migrations")) {
                $this->loadMigrationsFrom($module_path . "Migrations");
            }

            /** Route */
            Route::group(['module' => $module, 'namespace' => $namespace . '\Controllers'], function () use ($module_path) {
                if (File::exists($module_path . "Routes/route.php")) {
                    $this->loadRoutesFrom($module_path . "Routes/route.php");
                }
                if (File::exists($module_path . "Routes/admin.php")) {
                    $this->loadRoutesFrom($module_path . "Routes/admin.php");
                }
                if (File::exists($module_path . "Routes/web.php")) {
                    $this->loadRoutesFrom($module_path . "Routes/web.php");
                }
                if (File::exists($module_path . "Routes/api.php")) {
                    $this->loadRoutesFrom($module_path . "Routes/api.php");
                }
            });

            if(File::exists($module_path . "Helper")){
                $helper_dir = File::allFiles($module_path . "Helper");
                foreach($helper_dir as $key => $value){
                    $file = $value->getPathName();
                    require $file;
                }
            }

            if(is_dir($module_path . 'Views')){
                $this->loadViewsFrom($module_path . 'Views', $module);
            }

        }
    }
}
