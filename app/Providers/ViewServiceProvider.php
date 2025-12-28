<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        View::composer('admin.components.header', function ($view) {
  
        $notifications = DatabaseNotification::where('read_at', null)
            ->latest()
            ->get();

        $unreadCount = DatabaseNotification::whereNull('read_at')
            ->count();
 
    $view->with(compact('notifications', 'unreadCount'));
   });
  View::composer('admin.*', function ($view) {
        $view->with('settings', Setting::first());
    });

          
        
    }
}
