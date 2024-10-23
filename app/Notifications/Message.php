<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class Message extends Notification
{
    use Queueable;

    public string $title;
    public string $message;
    public string $action_url;
    public string $type;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $title, string $message, string $action_url, string $type = 'info')
    {
        $this->title = $title;
        $this->message = $message;
        $this->action_url = $action_url;
        $this->type = $type;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database']; // Changed from 'mail' to 'database'
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => $this->title,
            'message' => $this->message,
            'action_url' => $this->action_url,
            'type' => $this->type
        ];
    }
}
