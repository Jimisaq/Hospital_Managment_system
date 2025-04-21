<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;

class UpdateUserStatusOnLogout
{
    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        $event->user->update(['status' => false]);
    }
}
