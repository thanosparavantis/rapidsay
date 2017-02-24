<?php

namespace Forum\Providers;

use Blade;
use Lang;
use Validator;
use View;
use Carbon\Carbon;
use Forum\TextHelper;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('lastAppUpdate', $this->getLastAppUpdate());

        Blade::directive('parse', function ($expression) {
            return "<?php echo Forum\TextHelper::parse(e($expression)); ?>";
        });

        Blade::directive('parsesafe', function ($expression) {
            return "<?php echo Forum\TextHelper::parse(e($expression), false); ?>";
        });

        Blade::directive('raw', function ($expression) {
            return "<?php echo Forum\TextHelper::raw(e($expression)); ?>";
        });

        Blade::directive('inline', function ($expression) {
            return "<?php echo Forum\TextHelper::displayTextInline($expression); ?>";
        });

        Validator::extend('trans_key', function($attribute, $value, $parameters, $validator) {
            return Lang::has('announcements.' . $value);
        });;
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function getLastAppUpdate()
    {
        return Carbon::parse(
            date("F d Y H:i:s.", filemtime(base_path() . '/last_update'))
        );
    }
}
