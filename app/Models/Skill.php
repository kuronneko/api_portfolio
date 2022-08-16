<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ['persona_id','name','quality'];

    public function persona(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
