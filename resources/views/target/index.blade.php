@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-lg-8 ">
            <div class="card">
                <div class="card-header">
                    Targets
                </div>
                <div class="card-body">
                    <table class="table" style="width: 100%" id="users-table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Month</th>
                            <th scope="col">Set Amount</th>
                            <th scope="col">Achieve Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mt-1">
            <div class="card">
                <div class="card-header">
                    Targets
                </div>

                <div class="card-body">
                    <form action="{{url('/insert/target')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Month *</label>
                                <select  class="form-control" id="month" name="month">
                                    <option selected value='Janaury'>Janaury</option>
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
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="">
                            <p id="p2" class="text-danger"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Achieve Amount</label>
                            <input type="text" class="form-control text-black" id="achieve_amount"  name="achieve_amount" placeholder="">
                            <p id="p3" class="text-danger"></p>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <select  class="form-control" id="status" name="status">
                                <option selected value='achieved'>Achieved</option>
                                <option value='no achieved'>No Achieved</option>
                            </select>
                            <p id="p4" class="text-danger"></p>

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
            var month = $("#month").val();
            var amount = $("#amount").val();
            var achieve_amount = $("#achieve_amount").val();
            var status = $("#status").val();

            if(month.length == "")
            {
                $("#p1").text("select month required!");
                $("#month").focus();
                return false;
            }
            else if(amount.length == "")
            {
                $("#p2").text("Amount required!");
                $("#amount").focus();
                return false;
            }
            else if(achieve_amount.length == "")
            {

                $("#p3").text("Achieve_amount required!");
                $("#achieve_amount").focus();
                return false;
            }
            else if(status.length == "")
            {

                $("#p4").text("Status required!");
                $("#status").focus();
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
                ajax: '{!! route('target.data') !!}',
                columnDefs:[
                    {
                        targets:5,
                        title:'Action',
                        orderable:false,
                        render: function(data,type,full,meta){
                            return ' <a class="btn btn-sm text-info mt-1" href="/target/edit/'+full.id+'"><i class="fa fa-edit" style="  font-size: 16px;" ></i> </a>'

                        }
                    }
                ],
                columns: [

                    { data: 'id', name: 'id' },
                    { data: 'Month', name: 'month' },
                    { data: 'Amount', name: 'amount' },
                    { data: 'achieve', name: 'achieve' },
                    { data: 'status', name: 'status' },

                ]
            });
        });
    </script>

@endsection

