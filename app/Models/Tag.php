<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     protected $table ='tag';
     protected $fillable= ['title','body', 'author', 'published'];

    protected $guarded= ['id']; //cannot be updated/assigned (read only)

    public function tags()
    {
        return $this->belongsToMany(Post::class);
    }
    public function posts()
{
    return $this->belongsToMany(Post::class);
}
}
