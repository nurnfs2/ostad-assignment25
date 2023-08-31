<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeaveRequestApproved extends Notification
{
    use Queueable;

    public $leaveRequest;

    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        //
        $this->leaveRequest = $data['leaveData'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Leave Request Approved')
        ->line('Your leave request has been approved.')
        ->line('Details:')
        ->line('Start Date: ' . $this->leaveRequest->start_date)
        ->line('End Date: ' . $this->leaveRequest->end_date)
        ->line('Reason: ' . $this->leaveRequest->reason)
        ->action('View Leave Request', url(route('leave-requests.index')))
        ->line('Thank you for using our application!');
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
