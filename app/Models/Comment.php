<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasUlids;
    use HasFactory;
    #Primary Key
    protected $primaryKey= 'id';
    protected $keyType = 'string'; // UUID Universal Unique Identifier
    public $incrementing = 'false';

     protected $table ='comments';
     protected $fillable= ['author','content','post_id'];
     protected $guarded= ['id']; //cannot be updated/assigned

     public function post(){
        return $this->belongsTo(Comment::class);}
}
