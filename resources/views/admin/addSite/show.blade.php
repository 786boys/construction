@extends('admin.partials.layout')


@section('content')
@if (session('status'))
    <h6 class="alert alert-danger">{{session('status')}}</h6>
@endif

<div class="container">
    <div class="btn btn-primary"><a href="{{route('site.create')}}" class="nav-link"> Add Site</a></div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Site Name</th>
            <th scope="col">Address</th>
            <th scope="col">Site Owner</th>
            <th scope="col">Site Incharge</th>
            <th scope="col">Super Visor</th>
            <th scope="col">Show</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    @foreach ($data as $item)
        <tbody>
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->address}}</td>
            
            <td>{{$item->siteOwner}}</td>
            <td>{{$item->siteIncharge}}</td>
            <td>{{$item->superVisor}}</td>

            <td><div class="btn btn-success"><a href="{{route('site.show', $item->id)}}" class="nav-link"> Show User</a></div></td>
            <td><div class="btn btn-table-secondary"><a href="{{route('site.edit', $item->id)}}" class="nav-link"> update User</a></div></td>
            <td> <form action="{{ route('site.destroy', $item->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
          </form>
        </td>
          </tr>
         
        </tbody>
        @endforeach
      </table>
   

@endsection