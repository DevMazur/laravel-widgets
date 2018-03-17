<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 17.02.2018
 * Time: 20:36
 */

namespace DevMazur\Widgets;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class WidgetServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([realpath(__DIR__.'/../app/') => app_path().'/'], 'app');
        $this->publishes([realpath(__DIR__.'/../config/') => config_path().'/'], 'config');
        $this->publishes([realpath(__DIR__.'/../resources/') => resource_path().'/'], 'resources');

        Blade::directive('widget', function ($name) {
            return "<?php echo app('widget')->show($name); ?>";
        });

        $this->loadViewsFrom((resource_path().'/views/widgets/'), 'Widgets');
    }

    public function register()
    {
        App::singleton('widget', function(){
            return new Widget();
        });
    }
}