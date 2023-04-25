@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-center">

        <div class="col-md-6 mt-1">
            <div class="card">
                <div class="card-header">
                    Edit Employee
                </div>

                <div class="card-body">
                    <form action="{{url('/update/employee/'.$employee->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name </label>
                            <input type="text" class="form-control text-dark"   id="name" value="{{$employee->name}}" name="fullname" placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control text-dark" disabled id="email" value="{{$employee->email}}" name="email" placeholder="">
                            <p id="p2" class="text-danger"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="{{$employee->status}}" selected >
                                    @if ($employee->status == 1)
                                        Active
                                    @else
                                        Disable
                                    @endif
                                </option>
                                <option value="1">Active</option>
                                <option value="0">Disable</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone</label>
                            <input type="number" class="form-control text-dark"   id="phone" value="{{$employee->phone}}" name="phone" placeholder="">
                            <p id="p3" class="text-danger"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>
                            <input type="text" class="form-control text-dark"   id="address" value="{{$employee->address}}" name="address" placeholder="">
                            <p id="p4" class="text-danger"></p>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Date</label>
                            <input type="text" class="form-control text-dark"   id="dare" value="{{$employee->date}}" disabled placeholder="">

                        </div>
                        <a href="{{url('/employee')}}">
                            <button type="button" class="btn btn-secondary">Back</button>
                        </a>

                        <a href="{{url('/employeeDetailPdf/'.$employee->id)}}">
                                        <button type="button" class="btn btn-info">Export PDF</button>
                                    </a>


                        <button type="submit" id="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
