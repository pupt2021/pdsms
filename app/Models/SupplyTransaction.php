<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplyTransaction extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'supply_transactions';

    protected $fillable = [
        'stock',
        'user_id',
        'supplys_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function supply()
    {
        return $this->belongsTo(Supply::class, 'supplys_id')->withTrashed();

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
}
