<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comments
 *
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $commentable
 * @property-read \App\User $user
 * @mixin \Eloquent
 */
class Comments extends Model
{
    protected $fillable = ['user_id', 'commentable_id', 'commentable_type', 'message', 'rating'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}