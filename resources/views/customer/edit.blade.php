@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-center">

        <div class="col-md-6 mt-1">
            <div class="card">
                <div class="card-header">
                   Edit Customer
                </div>

                <div class="card-body">
                    <form action="{{url('/update/customer/'.$customer->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Reference Number *</label>
                            <input type="text" class="form-control text-dark" disabled id="reference" value="{{$customer->uniqueId}}" placeholder="">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name </label>
                            <input type="text" class="form-control" id="name" value="{{$customer->fullname}}" name="fullname" placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" id="email" value="{{$customer->email}}" name="email" placeholder="">
                            <p id="p2" class="text-danger"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone</label>
                            <input type="number" class="form-control" id="phone" value="{{$customer->phone}}" name="phone" placeholder="">
                            <p id="p3" class="text-danger"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>
                            <input type="text" class="form-control" id="address" value="{{$customer->address}}" name="address" placeholder="">
                            <p id="p4" class="text-danger"></p>

                        </div>
                        <a href="{{url('/customer')}}">
                            <button type="button" class="btn btn-secondary">Back</button>
                        </a>
                        <button type="submit" id="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection