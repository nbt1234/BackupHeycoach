<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllBookingModel extends Model
{
    use HasFactory;
    protected $table = 'all_booking_models';

    public function bookings_belongs_slots()
    {
        return $this->belongsTo(AllSlotsModel::class,  'slot_id');
    }
    
}
