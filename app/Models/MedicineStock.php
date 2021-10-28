<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicineStock extends Model
{
    use HasFactory,SoftDeletes;

    public $table = 'medicine_stocks';

    protected $fillable = [
        'medicines_id',
        'created_at',
        'consumed',
        'total',
        'updated_at',
        'deleted_at',
        'current_stock',
    ];
    public function medicine()
    {
        return $this->belongsTo(Medicine::class,'medicines_id');

    }
}
