<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Account;
use App\User;
use Auth;

class TransactionController extends Controller
{
	//
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		//
		$user=Auth::user()->id;
		$akun=Account::where('customer_id', $user)->first();
		$transactions = Transaction::where('account', '=', $akun->account_number)->get();

		return view ('mutation',compact('transactions', 'akun'));
	}

	public function createdeposit()
	{
		$user=Auth::user()->id;
		$akun=Account::where('customer_id', $user)->first();
		
		return view('createdeposit', compact('akun'));
	}

	public function storedeposit(Request $request)
	{
		//
		$user=Auth::user()->id;
		$akun=Account::where('customer_id', $user)->first();
		$lastamount=Transaction::orderBy('created_at', 'desc')->where('account', '=', $request->input('accountnumber'))->first();
		// dd($lastamounts->amount);
		$transactions=new Transaction;
		$transactions->type="Deposit";
		$transactions->name=Auth::user()->name;
		$transactions->customer_id=$akun->account_number;
		// dd($transactions->customer_id);
		$transactions->debit=0;
		$transactions->credit=$request->input('amount');
		$transactions->amount=$lastamount->amount+$request->input('amount');
		$transactions->account=$request->input('accountnumber');
		$transactions->save();
		return redirect('/')->with('info','Transaction Success!');			
	}

	public function createwithdraw()
	{
		$user=Auth::user()->id;
		$akun=Account::where('customer_id', $user)->first();
		return view('createwithdraw', compact('akun'));
	}

	public function storewithdraw(Request $request)
	{
		//
		$user=Auth::user()->id;
		$akun=Account::where('customer_id', $user)->first();
		$lastamount=Transaction::orderBy('created_at', 'desc')->where('account', '=', $akun->account_number)->first();
		$transactions=new Transaction;
		$transactions->type="Withdraw";
		$transactions->name=Auth::user()->name;
		$transactions->customer_id=$akun->account_number;
		$transactions->debit=$request->input('amount');
		$transactions->credit=0;
		$transactions->amount=($lastamount->amount) - ($request->input('amount'));
		$transactions->account=$akun->account_number;
		$transactions->save();
		return redirect('/')->with('info','Transaction Success!');			
	}	

	public function createtransfer()
	{
		$user=Auth::user()->id;
		$akun=Account::where('customer_id', $user)->first();
		return view('createtransfer', compact('akun'));
	}	

	public function storetransfer(Request $request)
	{
		$userpengirim=Auth::user();
		$akunpengirim=Account::where('customer_id', $userpengirim->id)->first();
		$akunpenerima=Account::where('account_number', $request->input('accountnumber'))->first();
		$userpenerima=User::where('id', $akunpenerima->customer_id)->first();
		$lastamountpengirim=Transaction::orderBy('created_at', 'desc')->where('account', '=', $akunpengirim->account_number)->first();
		$lastamountpenerima=Transaction::orderBy('created_at', 'desc')->where('account', '=', $akunpenerima->account_number)->first();

		// penerima
		$transactions=new Transaction;
		$transactions->type="Transfer";
		$transactions->name=$userpengirim->name;
		$transactions->customer_id=$akunpengirim->account_number;
		$transactions->debit=0;
		$transactions->credit=$request->input('amount');
		$transactions->amount=($lastamountpenerima->amount) + ($request->input('amount'));
		$transactions->account=$akunpenerima->account_number;
		$transactions->save();
		
		// pengirim
		$transactions=new Transaction;
		$transactions->type="Transfer";
		$transactions->name=$userpenerima->name;
		$transactions->customer_id=$akunpenerima->account_number;
		$transactions->debit=$request->input('amount');
		$transactions->credit=0;
		$transactions->amount=($lastamountpengirim->amount) - ($request->input('amount'));
		$transactions->account=$akunpengirim->account_number;
		$transactions->save();

		return redirect('/')->with('info','Transaction Success!');			
	}		
}