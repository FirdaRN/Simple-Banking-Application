@extends('layouts.app')
 
@section('title', 'Deposit')
@section('user', $akun->account_number)
@section('content')
      <div class="card mx-auto mt-5">
        <div class="card-header">Deposit</div>
        <div class="card-body">
          <form method="POST" action="{{url('/deposit/store')}}">
            {{csrf_field()}}
            <div class="form-group">
              <div class="form-label-group">
                <input type="amount" id="inputAmount" class="form-control" placeholder="Amount of Money" required="required" autofocus="autofocus" name="amount">
                <label for="inputAmount">Amount of Money</label>
              </div>
            </div> 
            <div class="form-group">
              <div class="form-label-group">
                <input type="accountnumber" id="inputAccountNumber" class="form-control" placeholder="Account Number" required="required" name="accountnumber">
                <label for="inputAccountNumber">Account Number</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Deposit</button>
          </form>
        </div>
      </div>
@endsection