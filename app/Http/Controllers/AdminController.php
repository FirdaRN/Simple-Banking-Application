<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Account;
use App\User;
use Auth;
use DB;

class AdminController extends Controller
{
    //
    public function __construct()
	{
		$this->middleware('cekadmin');
	}

	public function index()
	{
		$amounts=DB::select("
			SELECT t.*
			FROM transactions t
			INNER JOIN
    			(SELECT account, MAX(created_at) AS MaxDateTime
    			FROM transactions
    			GROUP BY account) groupedt 
			ON t.account = groupedt.account 
			AND t.created_at = groupedt.MaxDateTime
		");
		$total=0;
		foreach ($amounts as $amount) {
			$total=$total + $amount->amount;
		}
		$transactions = Transaction::all();
		return view ('admin',compact('amounts', 'total'));
	}	
}
