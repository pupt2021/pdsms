<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicineTransaction extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'medicine_transactions';

    protected $fillable = [
        'stock',
        'user_id',
        'medicines_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicines_id')->withTrashed();

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
}
