<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=[];
    public function getEntry(){
        return $this->hasMany('Entry','category_id','id');
    }
    use HasFactory;
}
