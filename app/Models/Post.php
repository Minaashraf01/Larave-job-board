<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasUlids;
    
    #Primary Key
    protected $primaryKey= 'id';
    protected $keyType = 'string'; // UUID Universal Unique Identifier
    public $incrementing = 'false';

    protected $table ='post';
     protected $fillable= [
        'title',
        'body',
        'author',
        'published'
    ];

    protected $guarded= ['id']; //cannot be updated/assigned

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}

