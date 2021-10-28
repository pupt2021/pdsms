<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "patients";

    protected $fillable = ['firstname', 'middlename', 'lastname', 'extensionname', 'gender', 'birthday', 'email', 'contactnumber', 'streetnumber', 'streetname', 'brgy', 'district', 'city'];

    public function setCategoryAttribute($value)
    {
        $this->attributes['med_history'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['med_history'] = json_decode($value);
       
    }
}
