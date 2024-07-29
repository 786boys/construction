@extends('admin.partials.layout')


@section('content')
@if (session('status'))
    <h6 class="alert alert-danger">{{session('status')}}</h6>
@endif

<div class="container">
    <div class="btn btn-danger"><a href="{{route('user.index')}}" class="nav-link"> Back</a></div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Desigination</th>
            <th scope="col">Comment</th>
            
        </tr>
    </thead>
   
        <tbody>
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->desigination}}</td>
            <td>{{$item->comment}}</td>
            
          </tr>
         
        </tbody>
  
      </table>
   

@endsection