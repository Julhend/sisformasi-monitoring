<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DueDateReminder;
use Carbon\Carbon;

use App\DigitalCaliper;
use App\OutsideDial;
use App\ThreadGauge;
use App\MasterList;

class EmailCronController extends Controller
{
    public function sendDueDateReminders()
    {
        // Calculate the date 1 week from now
        $reminderDate = Carbon::today()->addWeek();
    
        // Retrieve records from each model where next_cal is 1 week from now
        // $digitalCalipers = DigitalCaliper::whereDate('next_cal', $reminderDate)->get();
        // $outsideDials = OutsideDial::whereDate('next_cal', $reminderDate)->get();
        // $threadGauges = ThreadGauge::whereDate('next_cal', $reminderDate)->get();
        $masterLists = MasterList::whereDate('next_cal', $reminderDate)->get();
    
        // Send reminders for each model
        // $this->sendReminders($digitalCalipers);
        // $this->sendReminders($outsideDials);
        // $this->sendReminders($threadGauges);
        $this->sendReminders($masterLists);
    
        return response()->json(['message' => 'Due date reminders sent successfully']);
    }
    
  
private function sendReminders($items)
{
    foreach ($items as $item) {
        $user = $item->users; // Assuming the relationship is defined as 'user'
        if ($user) {
            Mail::to($user->email)->send(new DueDateReminder($item));
        }
    }
}
    
}
