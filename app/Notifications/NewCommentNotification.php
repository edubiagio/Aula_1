<?php

namespace App\Notifications;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class NewCommentNotification extends Notification
{
    use Queueable;
    public  $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        Comment $comment
    )
    {
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject("Novo comentário de {$this->comment->user->name}.")
                    ->greeting("Novo comentário de {$this->comment->user->name}.")
                    ->line(Str::limit($this->comment->message, 50))
                    ->action("Ver comentário", route('comments.index'))
                    ->line('Obrigado!!');
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
            //
        ];
    }
}
