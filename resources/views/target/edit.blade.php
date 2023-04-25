@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-center">

        <div class="col-md-6 mt-1">
            <div class="card">
                <div class="card-header">
                    Edit Target
                </div>

                <div class="card-body">
                    <form action="{{url('/update/target/'.$target->id)}}" method="POST">
                        @csrf
                     <div class="form-group">
                            <label for="exampleInputEmail1">Select Month *</label>
                                    <input type="month" class="form-control"  value="{{$target->month}}" id="month" name="month" placeholder="">
                            <p id="p1" class="text-danger"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Set Amount* </label>
                            <input type="number" class="form-control"  value="{{$target->amount}}" id="amount" name="amount" placeholder="">
                            <p id="p2" class="text-danger"></p>

                        </div>      
                    
                        <a href="{{url('/target')}}">
                            <button type="button" class="btn btn-secondary">Back</button>
                        </a>
                        <button type="submit" id="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
