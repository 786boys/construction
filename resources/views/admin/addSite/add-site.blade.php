@extends('admin.partials.layout')


@section('content')

<div class="mb-3">
    <h3 class=" h1 text-center">Add Site</h3>
    <form action="{{route('site.store')}}" method="POST">
        @csrf
        <div>
            <label for="exampleFormControlInput1" class="form-label">Site Name</label>
            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="">
        </div><br>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" id="exampleFormControlInput1" placeholder="">
        </div><br>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Site Owner</label>
            <select class="form-select" name="siteOwner" aria-label="Default select example">
                <option selected>Select Site Owner </option>
               
                @foreach ($data as $item)
                @if ( ($item->desigination) == "Site Owner")
                <option value="{{$item->name}}">{{$item->name}} </option>
                @else

                @endif
                @endforeach




            </select>
        </div>
        <br>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Site Incharge</label>
            <select class="form-select" name="siteIncharge" aria-label="Default select example">
                <option selected>Select Site Incharge </option>
              
                @foreach ($data as $item)
                @if ( ($item->desigination) =="Site Incharge")
                <option value="{{$item->name}}">{{$item->name}} </option>
                @else

                @endif
                @endforeach




            </select>
        </div>
        <br>

        <div>
            <label for="exampleFormControlInput1" class="form-label">Super Visor</label>
            <select class="form-select" name="superVisor" aria-label="Default select example">
                <option selected>Select Super Visor </option>
                
                @foreach ($data as $item)

                @if ( ($item->desigination) =="Super Visor")
                <option value="{{$item->name}}">{{$item->name}} </option>
                @else

                @endif
                @endforeach


            </select>
        </div>
        <br>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Add Site</button>
        </div>
    </form>
</div>

@endsection