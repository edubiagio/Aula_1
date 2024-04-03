<?php

namespace App\Models;

use App\Events\CommentCreatedEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = ['user_id', 'message'];

    // chama qndo cria novo comment 
    protected $dispatchesEvents =[
    'created' => CommentCreatedEvent::class
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
