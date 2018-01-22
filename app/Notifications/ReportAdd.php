<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
//use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReportAdd extends Notification implements ShouldQueue
{
    use Queueable;

    protected $item;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($item)
    {
        return $this->item=$item;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'aid'=>$this->item->id,
            'title'=>$this->item->title,
            'author'=>$this->item->user->name,
            'fbtime'=>date("Y-m-d H:i:s",strtotime($this->item->created_at))
        ];
    }


}
