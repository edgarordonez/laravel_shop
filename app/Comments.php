<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = "comments";
    protected $fillable = ["user_id", "commentable_id", "commentable_type", "message", "rating"];    
    
    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }    
}
