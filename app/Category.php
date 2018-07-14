<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; 
    protected $fillable = ['caticon_id', 'name', 'detail', 'status'];
    
    Public function scopeActive($query){
        Return $query->where('status',1);	
    } 
    Public function scopePopular($query){
        Return $query->where('vote', '>',100);	
    } 
    
    public function caticon(){
        return $this->hasOne('App\Caticon','id','caticon_id');
    }

    public function products(){
        return $this->hasMany('App\Product', 'cat_id', 'id');
    }

}
