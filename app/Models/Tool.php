<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'codeTool',
        'image',
        'mark_id',
        'model_id',
        'statustool_id',
        'status'
    ];
}
