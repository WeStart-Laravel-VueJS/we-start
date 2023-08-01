<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

// class InvoiceNotification extends Notification implements ShouldQueue
class InvoiceNotification extends Notification
{
    use Queueable;

    public $data;

    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        $channel = explode(',', $notifiable->channel);
        // // dd($channel);
        return $channel;
        // return ['broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toDatabase(object $notifiable) {
        return [
            'msg' => 'The product ' . $this->data['product'] . ' purchased by the ' . $this->data['user'] . ' with total price = $' . $this->data['price']
        ];
    }

    public function toBroadcast(object $notifiable) {
        // $notifiable->id = 1;
        return [
            'msg' => 'The product ' . $this->data['product'] . ' purchased by the ' . $this->data['user'] . ' with total price = $' . $this->data['price']
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
