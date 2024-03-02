<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
class groups extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'groups_tags', 'groupId', 'tagId');
    }

    public function posts(){
return $this->hasMany(Post::class,"groupId");
    }
    public function videos(){
return $this->hasMany(Videos::class,"groupId");
    }
}
