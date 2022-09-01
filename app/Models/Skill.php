<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ['persona_id','name','level', 'skill_type_id'];

    public function persona(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function type()
    {
        return $this->belongsTo(SkillType::class, 'skill_type_id');
    }
}
