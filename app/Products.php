<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'extract', 'image', 'rating', 'visible', 'price', 'category_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order_item()
    {
        return $this->hasOne('App\OrderItem');
    }

    /**
     * @return mixed
     */
    public function comments()
    {
        return $this->morphMany('App\Comments', 'commentable')->orderBy('id', 'desc')->paginate(5);
    }
}
