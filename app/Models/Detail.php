<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','1','2','3','4','5'];

    public function project(){
        return $this->belongsTo(Project::class, 'project_id');
    }

}
