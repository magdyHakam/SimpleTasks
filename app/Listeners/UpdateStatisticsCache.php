<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStatisticsCache
{
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
     * @param  \App\Events\TaskCreated  $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        //
        $job = (new App\Jobs\UpdateStatisticsJob());
        dispatch($job);
    }
}
