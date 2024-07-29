@extends('admin.partials.layout')


@section('content')


@if (session('status'))
<h6 class="alert alert-danger">{{session('status')}}</h6>
@endif

<div class="container bg-white">
  <div class="row">
    <div class="">
         <h1 class="h1 text-center p-4">All Transaction</h1>
        <form action="" method="GET">
            {{-- @csrf --}}

            <div class="row">
              <div class="col">
                <input type="text" class="form-control" value="{{$location}}" name="location" placeholder="Select by site" aria-label="First name">
              </div>
              <div class="col">
                <input type="text" class="form-control" value="{{$user}}" name="user" placeholder="Select by user" aria-label="First name">
              </div>
              <div class="col">
                <input type="text" class="form-control" value="{{$expence}}" name="expence" placeholder="Select by expence" aria-label="First name">
              </div>
              <div class="col">
                <input type="date" class="form-control" value="{{$startdate}}" name="startdate"  placeholder="Last name" aria-label="Last name">
              </div>
              <div class="col">
                <input type="date" class="form-control" value="{{$lastdate}}" name="lastdate"  placeholder="Last name" aria-label="Last name">
              </div>
            </div>
            <br>
            <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Search</button>

           
            
            <a class="btn btn-outline-primary " href="{{ route('export.transactions', ['user' => $user, 'expence' => $expence, 'location' => $location, 'startdate' => $startdate, 'lastdate' => $lastdate]) }}">Export Excel</a>
          </form> 
    </div>

    </div>
   
  

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">date</th>
            <th scope="col">Site </th> 
            <th scope="col">User</th>
            <th scope="col">Expences</th>
            <th scope="col">Payment</th>
           
            <th scope="col">Amount</th>
           
        </tr>
    </thead>
    @php
    $totalCredit = 0;
    $totalDebit = 0;
@endphp


    @foreach ($data as $item)
        <tbody>
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->custom_date}}</td>
            <td>{{$item->location}}</td>
            <td>{{$item->user}}</td>
            <td>{{$item->expence}}</td>
            <td>{{$item->paymentType}}</td>
           
            <td>{{$item->amount}}</td>
            @if($item->paymentType == 'credit')
              @php $totalCredit += $item->amount; @endphp
            @elseif($item->paymentType == 'debit')
                @php $totalDebit += $item->amount; @endphp
            @endif


        </tr>
      </tbody>
      @endforeach
      
    <tfoot>
      <tr>
          <td colspan="6">Total Credit</td>
          <td>{{ $totalCredit }}</td>
      </tr>
      <tr>
          <td colspan="6">Total Debit</td>
          <td>{{ $totalDebit }}</td>
      </tr>
      <tr>
          <td colspan="6">Total Amount</td>
          <td>{{ $totalCredit - $totalDebit }}</td>
      </tr>
      <tr>
          <td colspan="6">Total Result</td>
          <td>{{ $count }}</td>
      </tr>
  </tfoot>
    </table>
      
     
      
      
     
  </div>

    
   

@endsection