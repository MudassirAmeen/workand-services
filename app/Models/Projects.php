<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    
    /**
     * Author: Mudassir Ameen
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'alttext',
        'longdescription',
        'category'
    ];

}
