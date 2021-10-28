<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Medicine extends Model
{
    use HasFactory, SoftDeletes;

    public $table = "medicines"; //dating protected

     public function transactions()
    {
        return $this->hasMany(MedicineTransaction::class, 'medicines_id')->orderBy('created_at', 'desc');;
    }
}
