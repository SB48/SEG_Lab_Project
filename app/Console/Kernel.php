<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Member;
use App\Violation;
use \Carbon\Carbon;
use App\SocietyRule;

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
        // Want to scan for unbanning and no longer valid violations 
        $schedule->call(function(){
       
            // Get all members that are banned normally
            $membersBanned = Member::where('normalBan', true)->get();

            foreach($membersBanned as $member){
                // First if they have passed the normal ban stage
                $banBeginDate = Carbon::parse($member->banBeginDate);
                $lengthOfBan = SocietyRule::select('ruleVal')->where('society_rule','lengthOfBan')->first()->ruleVal;
                 
                if($banBeginDate->addWeeks($lengthOfBan) <= Carbon::now()){
                    $member->normalBan = false;
                    $member->banBeginDate = NULL;
                    $member->save();
                }
            }

            // Check all members violations to see if it passed
            // the grace period
            $members = Member::all();

            foreach($members as $member){
                $violations = $member->violations->where('nullified',false);
                $gracePeriod = SocietyRule::select('ruleVal')->where('society_rule','gracePeriod')->first()->ruleVal;

                foreach($violations as $violation){
                    $createdDate = $violation->created_at;
                    if($createdDate->addWeeks($gracePeriod) < Carbon::now()){
                        $violation->nullified = true;
                        $violation->save();
                    }
                }
            }
        })->hourly();
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
