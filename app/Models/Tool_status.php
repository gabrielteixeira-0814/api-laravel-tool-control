<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool_status extends Model
{
    use HasFactory;

    protected $fillable = [
        'toolStatus',
        'status'
    ];
}
