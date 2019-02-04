<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Account;

class Transaction extends Model
{
    //
    protected $table = 'transactions';   
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'type', 'name', 'customer_id', 'debit', 'credit', 'amount', 'account',
    ];


    public function Account()
    {
        return $this->belongsTo('App\Account', 'account_number', 'customer_id');
    } 
    public function Account1()
    {
        return $this->belongsTo('App\Account', 'account_number', 'account');
    }     
}
