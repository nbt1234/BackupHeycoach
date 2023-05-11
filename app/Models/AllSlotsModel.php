<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllSlotsModel extends Model
{
    use HasFactory;
    protected $table = 'all_slots_models';

    public function slots_with_bookings()
    {
         return $this->hasMany(AllBookingModel::class);
    }
    
}
