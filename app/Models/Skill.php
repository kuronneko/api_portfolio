<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ['persona_id','name','level', 'type_id'];

    public function persona(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
