<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

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
            $admin = Auth::guard('admin')->user(); 

        $notifications = $admin
            ? $admin->notifications()->latest()->take(5)->get()
            : collect(); 

        $unreadCount = $admin
            ? $admin->unreadNotifications()->count()
            : 0;

        $view->with(compact('notifications', 'unreadCount'));
    });
  View::composer('admin.*', function ($view) {
        $view->with('settings', Setting::first());
    });

          
        
    }
}
