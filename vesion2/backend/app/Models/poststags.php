<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class poststags extends Model
{
    public $timestamps = false;
    use HasFactory;
    function posts()
    {
        return $this->hasMany(Post::class, 'TAG', "id");
    }
    function videos()
    {
        return $this->hasMany(Videos::class, 'TAG', "id");
    }
    public function group()
    {
        return $this->belongsTo(groups::class, "TOPIC");
    }

}
