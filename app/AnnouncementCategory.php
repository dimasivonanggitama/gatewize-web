<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnouncementCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    public function announcements()
    {
        return $this->hasMany('App\Announcement');
    }
}
