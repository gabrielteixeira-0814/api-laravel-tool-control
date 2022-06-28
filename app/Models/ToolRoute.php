<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolRoute extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'operationType',
        'finalResult',
        'image',
        'user_id',
        'tool_id',
        'status'
    ];
}
