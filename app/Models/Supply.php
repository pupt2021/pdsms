<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Supply extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    //protected $cascadeDeletes = ['supply_stocks'];
    //protected $dates = ['deleted_at'];

    public $table = "supplys";

   // protected $fillable = ["name", "picture","quantity", "unit", "date_received"];
   public function transactions()
    {
        return $this->hasMany(SupplyTransaction::class, 'supplys_id')->orderBy('created_at', 'desc');
    }
}
