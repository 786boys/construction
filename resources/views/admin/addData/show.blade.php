@extends('admin.partials.layout')


@section('content')


@if (session('status'))
<h6 class="alert alert-danger">{{session('status')}}</h6>
@endif

<div class="container">
  <div class="row">
    <div class="col"><a href="{{route('data.create')}}" class="btn btn-primary" > Add Transaction</a></div>
    <div class="col ">
      <form action="" method="GET">
        {{-- @csrf --}}
        
        <div class="input-group mb-3">
          <input type="text" class="form-control" value="{{$search}}" name="query"   placeholder="Search by site name" aria-label="Example text with button addon" aria-describedby="button-addon1">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Search</button>
        </div>
    </form>
    </div>
  </div>
  
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Site Name</th> 
            <th scope="col">User</th>
            <th scope="col">Payment</th>
            <th scope="col">Expences</th>
            <th scope="col">Amount</th>
            <th scope="col">date</th>
            <th scope="col">Show</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    @foreach ($data as $item)
        <tbody>
          <tr>
           
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->location}}</td>
            <td>{{$item->user}}</td>
            <td>{{$item->paymentType}}</td>
            <td>{{$item->expence}}</td>
            <td>{{$item->amount}}</td>
            <td>{{$item->custom_date}}</td>
            <td><div class="btn btn-success"><a href="{{route('data.show', $item->id)}}" class="nav-link"><i class="fas fa-eye"></i></a></div></td>
            <td><div class="btn btn-primary"><a href="{{route('data.edit', $item->id)}}" class="nav-link"><i class="fas fa-edit"></i></a></div></td>
            <td> <form action="{{ route('data.destroy', $item->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></button>
          </form>
        </td>
          </tr>
         
        </tbody>
        @endforeach
      </table>

 
@endsection