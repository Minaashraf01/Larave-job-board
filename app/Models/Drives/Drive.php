<?php

namespace App\Models\Drives;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    use  HasFactory;
    // database drives --> name description
    protected $table ='dirves';
    
    protected $fillable= [
        'name',
        'description',
        'file'
    ];
}
