<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\NotificationController;

class CheckNotifications extends Command
{
    protected $signature = 'notifications:check';
    protected $description = 'Check and send notifications for expired records';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $notifController = new NotificationController();
        $notifController->checkNotifications();
        $this->info('Notifications checked successfully.');
    }
}
