<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function groups()
    {
        return $this->belongsToMany(groups::class, 'groups_tags',  'tagId','groupId');
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'poststags', 'tagId', 'postId');
    }
    public function videos()
    {
        return $this->belongsToMany(Tag::class, 'Videosgroups',  'tagId','videoId');
    }
    // public function maintagingroup (){
    //     return $this->hasone(groups::class,'Maintag','id');

    // }
    public function children (){
        return $this->hasMany(Tag::class,'parentId','id');

    }
    public function mainposts (){
        return $this->hasMany(Post::class,'tagId','id');

    }
    public function video (){
        return $this->hasMany(Videos::class,'tagId','id');

    }

    
}
