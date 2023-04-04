@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-center">

        <div class="col-md-6 mt-1">
            <div class="card">
                <div class="card-header">
                    Partial Payments
                </div>

                <div class="card-body">
                    <form action="{{url('update/partial/'.$partial->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sale Price</label>
                            <input type="text" class="form-control text-dark" disabled id="salePrice" value="{{$partial->salePrice}}" placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Recieved Payment</label>
                            <input type="text" class="form-control text-dark" disabled value="{{$partial->paymentRecieved}}" placeholder="">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Remaining Price</label>
                            <input type="text" class="form-control text-dark" id="remainingprice" disabled value="{{$partial->paymentRemaining}}" name="remainingprice" placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Collect</label>
                            <input type="text" class="form-control" id="received"  name="received" placeholder="">
                            <p id="p2" class="text-danger"></p>

                        </div>
                        <a href="{{url('/ticket')}}">
                            <button type="button" class="btn btn-secondary">Back</button>
                        </a >
                        <button type="submit" id="submit"  href="update/partial/" class="btn btn-primary">Enter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
