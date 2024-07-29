@extends('admin.partials.layout')


@section('content')

<div class="mb-3">
    <h3 class=" h1 text-center">Add expenses</h3>
    <form action="{{route('expenses.store')}}" method="POST">
        @csrf
        <div>
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text"name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div><br>
        <div>
            <label for="exampleFormControlInput1" class="form-label">comment</label>
            <input type="text" name="comment" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div><br>
       
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Add expenses</button>
          </div>
    </form>
</div>

@endsection