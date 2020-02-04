<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    	//
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::directive('invalid', function($key) {
            $key = str_replace(['\'', '"'], '', $key);
            $errors = session()->get('errors') ?: new \Illuminate\Support\ViewErrorBag;

            if ($message = $errors->first($key)) {
                return "<?php echo '<div class=\"invalid-feedback\">{$message}</div>'; ?>";
            }
        });
    }
}
