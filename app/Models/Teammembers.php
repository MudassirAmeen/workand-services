<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teammembers extends Model
{
    use HasFactory;
    
    /**
     * Author: Mudassir Ameen
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
        'alttext',
        'name',
        'role',
        'experience',
        'description'
    ];

}
