<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AdminNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    // public function toArray($notifiable)
    // {
    //     // $student = AddStudent::all();
    //     // dd($student);
    //     return [
    //         'name' => 'bilal',
    //         'email' => 'bilalkhaira8989@gmail.com',
    //     ];
    // }

    public function toDatabase($notifiable)
    {
        return [
            'car_name' => $this->details['car_name'] ?? '',
            'rental_type' => $this->details['rental_type'] ?? '',
            'budget' => $this->details['budget'] ?? '',
            'name' => $this->details['name'] ?? '',
            'email' => $this->details['email']  ?? '',
            'phone' => $this->details['phone'] ?? '',
            'message' => $this->details['message'] ?? '',
        ];
    }
}
