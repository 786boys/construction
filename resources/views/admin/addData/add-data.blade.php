@extends('admin.partials.layout')


@section('content')

<div class="mb-3">
    <h3 class=" h1 text-center">Add Transaction</h3>
    <form action="{{route('data.store')}}" method="POST">
        @csrf
        <div class="form-floating">
            <select class="form-select" name="sitename" id="floatingSelect" aria-label="Floating label select example">

                @foreach ($data as $items)

                <option value="{{$items->name}}">{{$items->name}}</option>
                @endforeach

            </select>
            <label for="floatingSelect">select a site</label>
        </div><br>

        <div class="form-floating">
            <select class="form-select" name="user" id="floatingSelect" aria-label="Floating label select example">

                @foreach ($datauser as $items)

                <option value="{{$items->name}}">{{$items->name}}</option>
                @endforeach

            </select>
            <label for="floatingSelect">select a person</label>
        </div><br>




        <div>
            <label for="exampleFormControlInput1" class="form-label"> Payment Type</label>

            <select class="form-select " required name="payment" aria-label="Default select example">
                
                <option value="credit">Credit</option>
                <option value="debit">Debit</option>
            </select>
        </div>
        <br>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Expenses type</label>
            <br>

            {{-- @foreach ($expenses as $item) --}}

            {{-- <option value="{{$items->name}}">{{$items->name}}</option> --}}
            {{-- <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="expence" id="inlineRadio2" value="{{$item->name}}">
                <label class="form-check-label" for="inlineRadio2">{{$item->name}}</label>
            </div>
            @endforeach --}}
            {{-- <label for="exampleDataList" class="form-label">Datalist example</label> --}}
            <input class="form-control" list="datalistOptions" name="expence"        id="exampleDataList" placeholder="Type to search...">
            <datalist id="datalistOptions">
                @foreach ($expenses as $item) 
                <option value=" {{$item->name}}">


                @endforeach
            </datalist>
           


        </div>
        <br>
        <div class="form-group">
            <label for="custom_date"> Date:</label>
            <input type="date" class="form-control" id="custom_date" name="custom_date" required>
        </div><br>
        <div>
            <label for="exampleFormControlInput1" class="form-label">description</label>
            <input type="text" class="form-control" name="description" id="exampleFormControlInput1" placeholder="">
        </div><br>

        <div>
            <label for="exampleFormControlInput1" class="form-label">Amount (PKR)</label>
            <input type="number" class="form-control" name="amount" id="exampleFormControlInput1" placeholder="">
        </div><br>


        <div class="col-12">
            <button class="btn btn-primary" type="submit">Add Data</button>
        </div>
    </form>
</div>

<script>
    window.onload = function() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById('custom_date').value = today;
    }
</script>
@endsection