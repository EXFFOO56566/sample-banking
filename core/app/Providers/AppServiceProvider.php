<?php

namespace App\Providers;

use App\Category;
use App\Contact;
use App\Language;
use App\Setting;
use App\SocialIcon;
use App\Video;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        $gnl = Setting::first();
        $socials = SocialIcon::where('status', 1)->get();
        $contacts = Contact::where('status', 1)->get();
        $lang = Language::all();
        view()->share(compact('socials', 'contacts', 'gnl', 'lang'));

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
}
