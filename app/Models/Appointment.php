<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory,SoftDeletes;

   /* protected $casts = [
        'date' => 'datetime',
        'time' => 'datetime',
    ];*/

    public $table = "appointments";

    public function patient()
    {
        return $this->belongsTo(Patient::class)->withTrashed();

    }

    public function service()
    {
        return $this->belongsTo(Service::class)->withTrashed();
    }

     public function transactions()
    {
        return $this->hasMany(AppointmentTransaction::class, 'appointments_id')->orderBy('created_at', 'desc');
    }
}
