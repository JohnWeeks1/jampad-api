<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'url'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
