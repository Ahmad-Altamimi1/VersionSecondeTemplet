<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videosgroup extends Model
{
    public $timestamps = false;

    
    function user()
    {
        return $this->belongsTo(User::class, 'WRITER', "id");
    }
    function tag()
    {
        return $this->belongsTo(Tag::class, 'tagId', "id");
    }
    public function group(){
        return $this->belongsTo(groups::class,"groupId");
            }
            public function tags()
            {
                return $this->belongsToMany(Videosgroup::class, 'videosgroups',  'videoId','tagId');
            }
}
