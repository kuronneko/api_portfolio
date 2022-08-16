<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $fillable = ['persona_id','name','url'];

    public function persona(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }

}
