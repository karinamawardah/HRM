<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    //
    protected $fillable = ['first_name','last_name','profile','photo','division_id'];

    public function onleaves(){
        return $this->belongsTo('App\onleaves','id');
    }

    public function reimbursments(){
        return $this->belongsTo('App\reimbursments','id');
    }

    public function divisions(){
        return $this->hasMany('App\divisions');
    }

    public static function validasi(){
        return [
            'first_name'=>'required',
            'last_name'=>'required',
            'profile'=>'required',
            'division_id'=>'required',
            'photo'=>'required|image'
        ];
    }
}
