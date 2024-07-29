@extends('admin.partials.layout')


@section('content')
@if (session('status'))
    <h6 class="alert alert-danger">{{session('status')}}</h6>
@endif

<div class="container">
    <div class="btn btn-primary"><a href="{{route('expenses.create')}}" class="nav-link"> Add expenses</a></div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            
            <th scope="col">Comment</th>
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
            
            <td>{{$item->comment}}</td>
            <td><div class="btn btn-success"><a href="{{route('expenses.show', $item->id)}}" class="nav-link"> Show User</a></div></td>
            <td><div class="btn btn-table-secondary"><a href="{{route('expenses.edit', $item->id)}}" class="nav-link"> update User</a></div></td>
            <td> <form action="{{ route('expenses.destroy', $item->id) }}" method="POST" style="display:inline;">
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