<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentTransaction extends Model
{
    use HasFactory;

    public $table = 'appointment_transactions';

    protected $fillable = [
        'user_id',
        'appointments_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

     public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointments_id')->withTrashed();

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
}
