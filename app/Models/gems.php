<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gems extends Model
{
    use HasFactory;

    protected $fillable = [
        'gemName',
        'carat',
        'gemSize',
        'minesId',
        'gemImage',
    ];
}
