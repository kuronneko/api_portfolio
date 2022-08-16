<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name','persona_id','title','description','status'];

    public function persona(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function detail()
    {
        return $this->hasOne(Detail::class, 'detail_id');
    }


}
