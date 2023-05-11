<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyFocusgoalsModel extends Model
{
    use HasFactory;
    protected $table = 'my_focusgoals_models';
    protected $fillable = [
        'id',
        'mygoal_id',
        'mygoal_id', 
            'user_id',        
            'focused_cat',
            'each_month_goal',
            'archive_goal_time',
            'catwise_spend',
            'spend_think',
            'earn_after_tax_per_mnth',
            'per_mnth_amnt_to_achieve_goal',
            'catwise_actual_spend',
            'current_step',
            'goal_status', 
        
    ];
}
