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
                            <label for="exampleInputEmail1">Month</label>
                            <input type="text" class="form-control text-black" id="month" disabled value="{{$target->Month}}" name="month" placeholder="">
                            <p id="p1" class="text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Amount</label>
                            <input type="text" class="form-control text-black" id="amount" disabled value="{{$target->Amount}}" name="amount" placeholder="">
                            <p id="p2" class="text-danger"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Achieve Amount</label>
                            <input type="number" class="form-control text-black" id="achieve_amount"  value="{{$target->achieve}}"  name="achieve_amount" placeholder="">
                            <p id="p3" class="text-danger"></p>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <select  class="form-control" id="status" value="{{$target->status}}" name="status">
                                <option selected value="{{$target->status}}">
                                    @if($target->status == 1)
                                        Achieved
                                    @else
                                        Not Achieved
                                    @endif
                                </option>
                                <option value='1'>Achieved</option>
                                <option value='0'>Not Achieved</option>
                            </select>
                            <p id="p4" class="text-danger"></p>

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
