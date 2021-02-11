<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\GoalBatch::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // 目標期限切れ日次バッチ
        $schedule->command('command:goal')
                 ->everyMinute()
                //  ->daily()
                 ->appendOutputTo(dirname(dirname(dirname(__FILE__))) . '/storage/logs/GoalBatch.log')
                 ->onSuccess(function () {
                    Log::info('command:goal success!');
                 })
                 ->onFailure(function () {
                    Log::error('command:goal error');
                 });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
