<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MonthlyNotification extends Notification
{
    use Queueable;

    protected $notificationDetails;

    public function __construct($details)
    {
        $this->notificationDetails = $details;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->notificationDetails['message'],
            'id_ibu' => $this->notificationDetails['id_ibu'],
            'tanggal' => $this->notificationDetails['tanggal'],
            'url' => $this->notificationDetails['url'],
        ];
    }
}
