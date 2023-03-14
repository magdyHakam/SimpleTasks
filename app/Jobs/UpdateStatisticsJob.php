<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Cache;
use App\Models\User;

class UpdateStatisticsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // get top 10 users task holders
        $top10UsersHolders = User::withCount('tasks')
            ->having('tasks_count', '>', 0)
            ->take(10)
            ->orderBy('tasks_count', 'DESC')
            ->get();

        // update statistics cache
        Cache::put('Top10UsersStatistics', $top10UsersHolders);
    }
}
