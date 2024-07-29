@extends('admin.partials.layout')


@section('content')

<div class="mb-3">
    <h3 class=" h1 text-center">Add User</h3>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div>
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="">
        </div><br>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Phone</label>
            <input type="text" class="form-control"name="phone" id="exampleFormControlInput1" placeholder="">
        </div><br>
        <div>
            <label for="exampleFormControlInput1" class="form-label"> Desigination</label>
           
            <select class="form-select" name="select" aria-label="Default select example">
                {{-- <option selected>Desigination</option> --}}
                <option value="Site Owner">Site Owner</option>
                <option value="Site Incharge">Site Incharge</option>
                <option value="Super Visor">Super Visor</option>
              </select>
        </div>
        <br>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Comment</label>
            <input type="text" class="form-control"name="comment" id="exampleFormControlInput1" placeholder="">
        </div>
        <br>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Add User</button>
          </div>
    </form>
</div>

@endsection