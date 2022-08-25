<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','description'];

    public function project(){
        return $this->belongsTo(Project::class, 'project_id');
    }

}
