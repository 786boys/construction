@extends('admin.partials.layout')


@section('content')

<div class="mb-3">
    <h3 class=" h1 text-center">Update Transaction</h3>
    <form action="{{route('data.update', $itemee->id)}}" method="POST">
        @csrf
        @method('PUT')
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
            <label for="floatingSelect">select a site</label>
        </div><br>




        <div>
            <label for="exampleFormControlInput1" class="form-label"> Payment Type</label>

            <select class="form-select " required name="payment" aria-label="Default select example">
                <option value="Credit">Credit</option>
                <option value="Debit">Debit</option>
            </select>
        </div>
        <br>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Expenses type</label>
            <br>


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
            <input type="date" class="form-control" value="{{$itemee->custom_date}}" id="custom_date" name="custom_date" required>
        </div><br>
        
        <div>
            <label for="exampleFormControlInput1" class="form-label">description</label>
            <input type="text" class="form-control"  value="{{$itemee->description}}" name="description" id="exampleFormControlInput1" placeholder="">
        </div><br>

        <div>
            <label for="exampleFormControlInput1" class="form-label">Amount (PKR)</label>
            <input type="number" class="form-control"  value="{{$itemee->amount}}" name="amount" id="exampleFormControlInput1" placeholder="">
        </div><br>


        <div class="col-12">
            <button class="btn btn-primary" type="submit">update Data</button>
        </div>
    </form>
</div>

{{-- <script>
    window.onload = function() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById('custom_date').value = today;
    }
</script> --}}

@endsection