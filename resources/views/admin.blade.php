@extends('layouts.appadmin')
 
@section('title', 'Home')
 
@section('content')
    <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Last balance of each client</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Account Number</th>
                      <th>Balance</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Account Number</th>
                      <th>Balance</th>
                      <th>Date</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($amounts as $transaction)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$transaction->account}}</td>
                      <td>Rp {{$transaction->amount}}</td>
                      <td>{{$transaction->created_at}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <span><strong>Total Money in the bank: </strong>Rp {{$total}}</span>
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