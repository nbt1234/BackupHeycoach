<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MygoalsModel extends Model
{
    use HasFactory;
    protected $table = 'mygoals_models';
    protected $fillable = [
        'id',
        'user_id',
        'my_goal_cats',
        'status',
    ];
}
