<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio_book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'audio',
        'created_by'
    ];
}
