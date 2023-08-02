<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\EmailCronController;

class SendDueDateReminders extends Command
{
    protected $signature = 'send:reminders';
    protected $description = 'Send email reminders for due dates';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $controller = new EmailCronController();
        $controller->sendDueDateReminders();
    }
}
