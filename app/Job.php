<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'company_id', 'title', 'slug', 'description', 'roles', 'category_id', 'position', 'address', 'type', 'status', 'last_date'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function favorites()
    {
        return $this->belongsToMany('App\User', 'favorites', 'job_id', 'user_id')->withTimestamps();
    }

    public function checkApplication()
    {
        return DB::table('job_user')
            ->where('job_id', $this->id)
            ->where('user_id', auth()->user()->id)
            ->exists();
    }

    public function checkSaved()
    {
        return DB::table('favorites')
            ->where('job_id', $this->id)
            ->where('user_id', auth()->user()->id)
            ->exists();
    }

    public function countApplicants()
    {
        return DB::table('job_user')
            ->where('job_id', $this->id)
            ->count();
    }
}
