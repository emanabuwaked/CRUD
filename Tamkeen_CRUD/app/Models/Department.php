<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'management_id'
    ];
    public function management(){
        return $this->belongsTo(Management::class/*,'management_id','id'*/);
    }
}