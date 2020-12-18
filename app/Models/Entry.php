<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{ 
    protected $guarded = [];
    use HasFactory;
    public function getUser(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function getCategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function getSubEntries(){
        return $this->hasMany(SubEntry::class,'main_entry_id','id');
    }
    public function countSubEntries(){
        return $this->hasMany(SubEntry::class,'main_entry_id','id')->count();
    }
}
