<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\PNCController;

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
        $pncController = new PNCController();
        $pncController->checkNotifications();
        $this->info('Notifications checked successfully.');
    }
}
