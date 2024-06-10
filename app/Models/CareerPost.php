<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerPost extends Model
{
    use HasFactory;
    protected $guarded=[]; 

    public function jobs(){
        return $this->belongsTo(JobPost::class,'job_post_id','id');
    }
}
