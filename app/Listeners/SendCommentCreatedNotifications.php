<?php

namespace App\Listeners;

use App\Events\CommentCreatedEvent;
use App\Models\User;
use App\Notifications\NewCommentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCommentCreatedNotifications implements ShouldQueue
{
    
    public function handle(CommentCreatedEvent $event)
    {
        foreach (User::where('id', '!=', $event->comment->user_id)->cursor() as $user){
            $user->notify(new NewCommentNotification($event->comment));
        }
    }
}
