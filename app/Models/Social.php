<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $fillable = ['persona_id','github','twitter','instagram','facebook','linkedin','email','whatsapp'];

    public function persona(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }

}
