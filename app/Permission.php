<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Permission extends Model
{
    //
    use Sluggable;

    protected $fillable = ['title', 'description'];
    protected $guarded = ['id', 'slug'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
    */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }
    public function users()
    {
        return $this->hasManyThrough('App\User', 'App\Role')->withTimestamps();
    }
}
