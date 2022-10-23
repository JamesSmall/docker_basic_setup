<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\test as eventTest;
use Illuminate\Bus\Queueable;
use Illuminate\Events\Dispatcher;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class test implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param eventTest $event
     * @return void  
     */
    public function handle(eventTest $event)
    {
        Log::info("INFO yay");
        //
    }
    public function test(eventTest $event) {
        Log::info("INFO ON TEST yaya");
    }
}
