<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class toolstatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'toolStatus',
        'status'
    ];
}
