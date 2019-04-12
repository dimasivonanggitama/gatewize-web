<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'content'];

    public function category()
    {
        return $this->belongsTo('App\AnnouncementCategory');
    }
}
