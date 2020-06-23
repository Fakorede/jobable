<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cname', 'user_id', 'slug', 'address', 'phone', 'website', 'logo', 'cover_photo', 'slogan', 'description',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function jobs()
    {
        return $this->hasMany('App\Job');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
