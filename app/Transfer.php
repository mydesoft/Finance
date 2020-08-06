<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    
            protected $fillable = ['recipient_account_name', 'recipient_account_number', 'recipient_bank', 'amount'];


            public function user(){
                return $this->belongsTo('App\User');
            }
}
