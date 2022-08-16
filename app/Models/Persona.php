<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = ['name','lastname','title','description','about','status','experience','city_id'];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class, 'persona_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'persona_id');
    }

    public function social()
    {
        return $this->hasOne(Social::class, 'persona_id');
    }



}
