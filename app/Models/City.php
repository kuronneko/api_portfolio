<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name','country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function personas()
    {
        return $this->hasMany(Persona::class, 'persona_id');
    }

}
