<?php

namespace App\Console\Commands;

use App\Mail\SendMailSupportOrder;
use App\Mail\VeryMailCoach;
use App\Models\Attendance;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AutoSendMailSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:sendMailSchedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lịch trình hôm nay';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $attendances = Attendance::all();
        foreach ($attendances as $attendance) {
            if($attendance->date == date('Y-m-d')){
                $emailMember = $attendance->user->email;
                $data = [
                    'title' => "quanokee",
                    'content' => "oke oke"
                ];
                Mail::to("legend.cay@gmail.com")->send(new SendMailSupportOrder($data));
            }
        }
    }
}
