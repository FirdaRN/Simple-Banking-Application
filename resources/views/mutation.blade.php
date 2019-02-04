@extends('layouts.app')
 
@section('title', 'Home')
@section('user', $akun->account_number)
 
@section('content')
    <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Mutation</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Transaction Type</th>
                      <th>Name</th>
                      <th>Account Number</th>
                      <th>Debit</th>
                      <th>Credit</th>
                      <th>Balance</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Transaction Type</th>
                      <th>Name</th>
                      <th>Account Number</th>
                      <th>Debit</th>
                      <th>Credit</th>
                      <th>Balance</th>
                      <th>Date</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($transactions as $transaction)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$transaction->type}}</td>
                      <td>{{$transaction->name}}</td>
                      <td>{{$transaction->customer_id}}</td>
                      <td>{{$transaction->debit}}</td>
                      <td>{{$transaction->credit}}</td>
                      <td>{{$transaction->amount}}</td>
                      <td>{{$transaction->created_at}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection

@section('js')
<script src="{{asset('js/sb-admin.min.js')}}"></script>
     <script type="text/javascript">
      $(document).ready(function() {
        $('#tabel').DataTable();
    } );
    </script>
@endsection