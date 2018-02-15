<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reimbursments extends Model
{
    //
    protected $fillable = ['employee_id','date','amount','status'];

    public function employees(){
        return $this->hasMany('App\employees');
      }
    
    public static function validasi(){
        return [
            'employee_id'=>'required',  
            'date'=>'required',
            'amount'=>'required',
            'status'=>'required'
        ];
      }
}
