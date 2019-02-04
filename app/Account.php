<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Transaction;

class Account extends Model
{
    //
    protected $table = 'accounts';   
    protected $primaryKey = 'account_number'; 
    public $incrementing = false;
	public static function boot()
		{
		    parent::boot();

		    static::creating(function($table)
		    {
		        $table->account_number = mt_rand(1000000000, mt_getrandmax());
		    });
		}    
    protected $fillable = [
        'customer_id', 'account_number', 'type', 'description',
    ]; 

    public function User()
    {
        return $this->belongsTo('App\User', 'id', 'customer_id');
    } 
    public function Transaction()
    {
        return $this->hasMany('App\Transaction', 'customer_id', 'account_number');
    }
    public function Transaction1()
    {
        return $this->hasMany('App\Transaction', 'account', 'account_number');
    }
}
