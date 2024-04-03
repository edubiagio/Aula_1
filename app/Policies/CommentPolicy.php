<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Comment $comment):bool
    {
        return $comment->user()->is($user);
    }
    public function delete(User $user, Comment $comment):bool
    {
        return $this->update($user,$comment);
    }
}
