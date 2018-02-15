<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class divisions extends Model
{
    //
  protected $fillable = ['name','description','is_active'];


  public function employees(){
    return $this->belongsTo('App\employee','id');
}


public static function validasi(){
    return [
        'name'=>'required|max:25|min:5',  
        'description'=>'required',
        'is_active'=>'required'
    ];
  }
}
