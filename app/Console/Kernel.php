<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\ViewCount;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $views = ViewCount::get();
            foreach($views as $v){
                $v = ViewCount::where('id', $v->id)->first();
                $v->update([
                    'daily' => 0
                ]);
            }            
        })->daily();

        $schedule->call(function () {
            $views = ViewCount::get();
            foreach($views as $v){
                $v = ViewCount::where('id', $v->id)->first();
                $v->update([
                    'weekly' => 0
                ]);
            }            
        })->weekly();

        $schedule->call(function () {
            $views = ViewCount::get();
            foreach($views as $v){
                $v = ViewCount::where('id', $v->id)->first();
                $v->update([
                    'monthly' => 0
                ]);
            }            
        })->monthly();
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
