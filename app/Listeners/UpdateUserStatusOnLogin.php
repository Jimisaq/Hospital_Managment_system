<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class UpdateUserStatusOnLogin
{
    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $event->user->update(['status' => true]);
    }
}
