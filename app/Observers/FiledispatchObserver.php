<?php

namespace App\Observers;

use App\Models\Filedispatch;
use App\Notifications\fileNotification;
use Filament\Notifications\Notification;

class FiledispatchObserver
{
    /**
     * Handle the Filedispatch "created" event.
     */
    public function created(Filedispatch $filedispatch): void
    {
        //
    }

    /**
     * Handle the Filedispatch "updated" event.
     */
    public function updated(Filedispatch $filedispatch): void
    {
    //
    }

    /**
     * Handle the Filedispatch "deleted" event.
     */
    public function deleted(Filedispatch $filedispatch): void
    {
        //
    }

    /**
     * Handle the Filedispatch "restored" event.
     */
    public function restored(Filedispatch $filedispatch): void
    {
        //
    }

    /**
     * Handle the Filedispatch "force deleted" event.
     */
    public function forceDeleted(Filedispatch $filedispatch): void
    {
        //
    }
}
