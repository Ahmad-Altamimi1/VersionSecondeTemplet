<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'videos';
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
                return $this->belongsToMany(Videos::class, 'Videosgroups',  'videoId','tagId');
            }
}