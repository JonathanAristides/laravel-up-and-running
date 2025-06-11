<?php

namespace App\Providers;

use App\View\Composers\FooterComposer;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        #18 & #20
        View::composer('index', function ($view) {
            $view->with('userCount', User::count());
        });

//        #19
        View::share('appName', 'Laravel Up and Running');

//        #21
        View::composer(['about', 'index'], function ($view) {
            $view->with('userCount', User::count());
        });

//         #22
        View::composer('partials.footer', FooterComposer::class);

//         #24
        Blade::directive('datetime', function ($expression) {
            return "<?php echo 'From custom directive: ' . ($expression)->format('m/d/Y'); ?>";
        });

//         #25
        Blade::directive('badge', function ($expression) {
            [$text, $color] = explode(',', str_replace(['(', ')', ' '], '', $expression));
            return "<?php echo '<span style=\"color: ' . $color . ';\">' . $text . '</span>'; ?>";
        });

//        #26
        Blade::if('userIdIsEven', function () {
            return User::find(4)->id % 2 === 0;
        });
    }
}
