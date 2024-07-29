@extends('admin.partials.layout')


@section('content')
@if (session('status'))
<h6 class="alert alert-danger">{{session('status')}}</h6>
@endif

<div class="container">
    <div class="btn btn-danger"><a href="{{route('data.index')}}" class="nav-link"> Back</a></div>
</div>
{{-- <table class="table">
    <thead>
        <tr>

            <th scope="col">#</th>
            <th scope="col">Site Name</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Expences</th>
            <th scope="col">comment</th>
            <th scope="col">Amount</th>

        </tr>
    </thead>

    <tbody>
        <tr>

            <th>{{$item->id}}</th>
            <td>{{$item->location}}</td>
            <td>{{$item->paymentType}}</td>
            <td>{{$item->expence}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->amount}}</td>

        </tr>

    </tbody>

</table> --}}

<body>
    <div class="container mt-5 bg-white p-4">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Transaction Receipt</h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6">
                <h5>Company Name: <br>Shafqat & Co</h5>

                {{-- <p>1234 Street Name<br>City, State 56789</p> --}}
            </div>
            <div class="col-6 text-right">
                {{-- <h5>Receipt Number: 001</h5> --}}
                <p>Date: {{$item->created_at}}</p>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Site Name</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Expences</th>
                            <th scope="col">comment</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <th>{{$item->id}}</th>
                            <td>{{$item->location}}</td>
                            <td>{{$item->paymentType}}</td>
                            <td>{{$item->expence}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->amount}}</td>
                        </tr>
                        
                    </tbody>
                    
                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center">
                {{-- <p>Thank you for your purchase!</p> --}}
            </div>
        </div>
    </div>
</body>

@endsection