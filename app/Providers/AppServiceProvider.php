<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use App;
use App\Banner;
use App\Menu;
use App\Setting;
use App\Social;
use App\NewIt;

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
        //
        Schema::defaultStringLength(191);

        View::composer(['layouts.header' , 'cabinet.header'], function ($view){
//            $test = Menu::where(['published' => true, 'parent_id' => null, 'lang' => App::getLocale()])->with('children')->orderBy('order', 'asc')->get();
//            dd($test);
            $view->with('menu',
                Menu::where(['published' => true, 'parent_id' => null, 'lang' => App::getLocale()])
                    ->orderBy('order', 'asc')
                    ->with('children')->get());
        });
        View::composer('home', function ($view){
            $view->with('banners', NewIt::where(['public' => true, 'lang' => App::getLocale()])->latest()->take(3)->get());
        });

        View::composer(['layouts.app', 'cabinet.app'], function($view){
            $view->with([
                'settings' => Setting::find(1),
                'socials' => Social::find(1),
                'url'  => URL::current(),

            ]);
        });
        View::composer(['home'], function($view){
            $view->with([
                'settings' => Setting::find(1),
            ]);
        });

    }
}
