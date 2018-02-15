<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class onleaves extends Model
{
    //
    protected $fillable = ['employee_id','date','notes','status'];

    public function employees(){
        return $this->hasMany('App\employees');
      }
    
    public static function validasi(){
        return [
            'employee_id'=>'required',  
            'date'=>'required',
            'notes'=>'required',
            'status'=>'required'
        ];
      }
}
