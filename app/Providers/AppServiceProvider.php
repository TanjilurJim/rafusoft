<?php

namespace App\Providers;

use App\Models\Career;
use App\Models\GeneralMessage;
use App\Models\Message;
use App\Models\Quote;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{


    public function boot()
    {
        View::composer('*', function ($view) {
            $unreadMessages = Message::where('status', 'unread')->get();
            $unreadCareers = Career::where('status', 'unread')->get();
            $unreadQuotes = Quote::where('status', 'unread')->get();
            $unreadGeneral = GeneralMessage::where('status', 'unread')->get();
            $unreadGeneral = count($unreadGeneral);
            $unread = count($unreadMessages) + count($unreadCareers) + count($unreadQuotes) + $unreadGeneral;
            
            $unreadcontact = count($unreadMessages);
            $unreadCareer = count($unreadCareers);
            $unreadQuote = count($unreadQuotes);

            $view->with([
                'unreadMessages' => $unread,
                'unreadcontact'=> $unreadcontact,
                'unreadCareer'=> $unreadCareer,
                'unreadQuote'=> $unreadQuote,
                'unreadGeneral' => $unreadGeneral
            ]);
        });
    }



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
    // public function boot(): void
    // {
    //     //
    // }
}
