@extends('admin.partials.layout')


@section('content')

<div class="mb-3">
    <h3 class=" h1 text-center">Update User</h3>
    <form action="{{ route('user.update',$item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" value="{{$item->name}}" name="name" id="exampleFormControlInput1" placeholder="">
        </div><br>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Phone</label>
            <input type="text" class="form-control" value="{{$item->phone}}" name="phone" id="exampleFormControlInput1" placeholder="">
        </div><br>
        <div>
            <label for="exampleFormControlInput1" class="form-label"> Desigination</label>
           
            <select class="form-select" value="{{$item->desigination}}" name="select" aria-label="Default select example">
                {{-- <option selected>Desigination</option> --}}
                <option value="Site Ower">Site Ower</option>
                <option value="Site Incharge">Site Incharge</option>
                <option value="Super Visor">Super Visor</option>
              </select>
        </div>
        <br>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Comment</label>
            <input type="text" class="form-control" value="{{$item->comment}}" name="comment" id="exampleFormControlInput1" placeholder="">
        </div>
        <br>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Update User</button>
          </div>
    </form>
</div>

@endsection