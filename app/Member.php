<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // Table Name
    protected $table = 'members';

    public function rentals(){
        return $this->hasMany('App\Rental', 'memberID');
    }
    
    public function violations(){
        return $this->hasMany('App\Violation', 'memberID');
    }
}
