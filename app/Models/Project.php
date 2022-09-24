<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['persona_id','name','title','description','status', 'demo', 'source', 'image'];

    public function persona(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function details()
    {
        return $this->hasMany(Detail::class);
    }


}
