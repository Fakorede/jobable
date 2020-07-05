<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'company_id', 'title', 'slug', 'description', 'roles', 'category_id', 'position', 'address', 'type', 'salary', 'status', 'last_date'];

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

    public function getDescriptionHtmlAttribute()
    {
        return clean($this->descriptionHtml());
    }

    public function getRolesHtmlAttribute()
    {
        return clean($this->rolesHtml());
    }

    public function setSlugAttribute($value) {
        if (static::whereSlug($slug = Str::slug($value))->exists()) {
            $slug = $this->incrementSlug($slug);
        }
    
        $this->attributes['slug'] = $slug;
    }



    private function descriptionHtml()
    {
        return \Parsedown::instance()->text($this->description);
    }

    private function rolesHtml()
    {
        return \Parsedown::instance()->text($this->roles);
    }

    private function incrementSlug($slug) {

        $original = $slug;
        $count = 2;
    
        while (static::whereSlug($slug)->exists()) {
            $slug = "{$original}-" . $count++;
        }
    
        return $slug;
    
    }
}
