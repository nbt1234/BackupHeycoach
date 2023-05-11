<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoLibrary extends Model
{
    use HasFactory;
    protected $table = 'video_library';

    protected $fillable = [
        'name',
    ];
}
