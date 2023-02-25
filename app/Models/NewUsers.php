<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewUsers extends Model
{
    use HasFactory;

    /**
     * Author: Mudassir Ameen
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'fname',
        'lname',
        'password',
        'role'
    ];

}

