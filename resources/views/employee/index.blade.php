@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-lg-9 ">
            <div class="card">
                <div class="card-header">
                    All Employee
                </div>
                <div class="card-body">
                    <table class="table" style="width: 100%" id="users-table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                            <th scope="col">Detail</th>
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mt-1">
            <div class="card">
                <div class="card-header">
                    Add new Employee
                </div>

                <div class="card-body">
                    <form action="{{url('/insert/employee')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name *</label>
                            <input type="text" class="form-control" id="name" name="fullname" placeholder="">

                            <p id="p1" class="text-danger"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email </label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="">
                             @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <p id="p2" class="text-danger"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password * </label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="">
                            <p id="p3" class="text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone </label>
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Address </label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="">

                        </div>

                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>



    <script>
        $("#submit").click(function() {
            var name = $("#name").val();
            var email = $("#email").val();
            var password = $("#password").val();

            if(name.length == "")
            {
                $("#p1").text("Employess name required!");
                $("#name").focus();
                return false;
            }
                else if(email.length == "")
                {
                    $("#p2").text("Employess email required!");
                    $("#email").focus();
                    return false;
                }
            else if(password.length == "")
            {
                $("#p3").text("Employess password required!");
                $("#password").focus();
                return false;
            }
            else{
                return true;
            }
        });
    </script>

    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('employee.data') !!}',
                columnDefs:[
                    {
                        targets:6,
                        title:'Action',
                        orderable:false,
                        render: function(data,type,full,meta){
                            return ' <a class="btn btn-sm text-info mt-1" href="employee/edit/'+full.id+'"><i class="fa fa-edit" style="  font-size: 16px;" ></i> </a> <a class="btn btn-sm text-danger" style="  font-size: 16px;" href="employee/delete/'+full.id+'"><i class="fa fa-trash-o"></i> </a>'

                        }
                    },
                    {
                        targets:7,
                        title:'Action',
                        orderable:false,
                        render: function(data,type,full,meta){
                            return ' <a class="btn btn-sm text-info mt-1" href="employee/detail/'+full.id+'"><button class="btn btn-sm btn-info">Detail</button> </a>'

                        }
                    }
                ],
                columns: [

                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'status', name: 'status' },
                    { data: 'phone', name: 'phone' },
                    { data: 'address', name: 'address' },

                ]
            });
        });
    </script>

@endsection
