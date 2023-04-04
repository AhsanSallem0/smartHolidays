@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-center">

        <div class="col-md-6 mt-1">
            <div class="card">
                <div class="card-header">
                   Edit Supplier
                </div>

                <div class="card-body">
                    <form action="{{url('/update/supplier/'.$supplier->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name </label>
                            <input type="text" class="form-control" id="name" value="{{$supplier->fullname}}" name="fullname" placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" id="email" value="{{$supplier->email}}" name="email" placeholder="">
                            <p id="p2" class="text-danger"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone</label>
                            <input type="number" class="form-control" id="phone" value="{{$supplier->phone}}" name="phone" placeholder="">
                            <p id="p3" class="text-danger"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>
                            <input type="text" class="form-control" id="address" value="{{$supplier->address}}" name="address" placeholder="">
                            <p id="p4" class="text-danger"></p>

                        </div>
                        <a href="{{url('/supplier')}}">
                            <button type="button" class="btn btn-secondary">Back</button>
                        </a>
                        <button type="submit" id="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection