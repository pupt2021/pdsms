<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class SupplyStock extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes;

    public $table = 'supply_stocks';
    //protected $cascadeDeletes = ['supplys'];
    //protected $dates = ['deleted_at'];

protected $fillable = [
        'supplys_id',
        'created_at',
        'consumed',
        'total',
        'updated_at',
        'deleted_at',
        'current_stock',
    ];
    public function supply()
    {
        return $this->belongsTo(Supply::class,'supplys_id');

    }

}
