<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persons extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'fathername',
        'email',
        'address',
    ];
}
