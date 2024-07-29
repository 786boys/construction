@extends('admin.partials.layout')


@section('content')
@if (session('status'))
    <h6 class="alert alert-danger">{{session('status')}}</h6>
@endif

<div class="container">
    <div class="btn btn-danger"><a href="{{route('site.index')}}" class="nav-link"> Back</a></div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">address</th>
            <th scope="col">Site Owner</th>
            <th scope="col">Site Incharge</th>
            <th scope="col">Super Visor</th>
            
        </tr>
    </thead>
   
        <tbody>
          <tr>
          
            <th >{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->address}}</td>
            <td>{{$item->siteOwner}}</td>
            <td>{{$item->siteIncharge}}</td>
            <td>{{$item->superVisor}}</td>
            
          </tr>
         
        </tbody>
  
      </table>
   

@endsection