<?php

namespace App\Console;
use Carbon\Carbon;
use app\models\User;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $values = User::where('updated_at', '<=', Carbon::now()->subMinute(1))->get();
    
            foreach ($values as $value) {
                
                $value->package_id = 0;
                $value->save();
            }
        })->everyMinute();
    }
    

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }


    
}
