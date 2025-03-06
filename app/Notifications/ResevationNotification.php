<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResevationNotification extends Notification
{
    use Queueable;

    private $reservation;

    /**
     * Create a new notification instance.
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
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
            ->subject('Nouvelle réservation pour votre propriété')
            ->greeting('Bonjour ' . $notifiable->name . ',')
            ->line('Une nouvelle réservation a été effectuée pour votre propriété !')
            ->line('🛏️ **Propriété** : ' . $this->reservation->properties->titre)
            ->line('👤 **Client** : ' . $this->reservation->user->name)
            ->line('📅 **Date d\'arrivée** : ' . \Carbon\Carbon::parse($this->reservation->dataArrivée)->format('d/m/Y'))
            ->line('📅 **Date de départ** : ' . \Carbon\Carbon::parse($this->reservation->dateDépart)->format('d/m/Y'))
            ->line('💰 **Prix total** : ' . number_format($this->reservation->prix_Total, 2) . ' MAD')
            ->line('📞 **Contact du client** : ' . $this->reservation->user->telephone)
            ->line('Merci d\'utiliser notre plateforme !');
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
