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
                                <select  class="form-control" value="{{$target->Month}}" id="month" name="month">
                                    <option selected value='{{$target->Month}}'>{{$target->Month}}</option>
                                    <option value='January'>January</option>
                                    <option value='February'>February</option>
                                    <option value='March'>March</option>
                                    <option value='April'>April</option>
                                    <option value='May'>May</option>
                                    <option value='June'>June</option>
                                    <option value='July'>July</option>
                                    <option value='August'>August</option>
                                    <option value='September'>September</option>
                                    <option value='October'>October</option>
                                    <option value='1November1'>November</option>
                                    <option value='December'>December</option>
                                </select>
                            <p id="p1" class="text-danger"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Set Amount* </label>
                            <input type="number" class="form-control"  value="{{$target->Amount}}" id="amount" name="amount" placeholder="">
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
