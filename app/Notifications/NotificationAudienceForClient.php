<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationAudienceForClient extends Notification
{
    use Queueable;
    protected $audience;

    /**
     * Create a new notification instance.
     */
    public function __construct($audience)
    {
        $this->audience=$audience;
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
            ->subject('Modification de votre rendez-vous médical')
            ->greeting('Bonjour ' . $notifiable->first_name . ',')
            ->line('Votre rendez-vous a été replanifié.')
            ->line('Nouvelle date/heure : ' . $this->audience->scheduled_at->format('d/m/Y H:i'))
            ->action('Voir votre rendez-vous', url('/audiences/' . $this->audience->id))
            ->line('Merci de votre confiance.');
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
