@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-lg-8 ">
            <div class="card">
                <div class="card-header">
                    All Suppliers
                </div>
                <div class="card-body">
                    <table class="table" style="width: 100%" id="users-table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
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
                    Add new Supplier
                </div>

                <div class="card-body">
                    <form action="{{url('/insert/supplier')}}" method="POST">
                        @csrf
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name *</label>
                            <input type="text" class="form-control" id="name" name="fullname" placeholder="">

                            <p id="p1" class="text-danger"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email </label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="">

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

        if(name.length == "")
            {
            $("#p1").text("Supplier name required!");
            $("#name").focus();
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
            ajax: '{!! route('supplier.data') !!}',
            columnDefs:[
                {
                    targets: 5,
                    title:'Action',
                    orderable:false,
                    render: function(data,type,full,meta){
                        return ' <a class="btn btn-sm text-info mt-1" href="supplier/edit/'+full.id+'"><i class="fa fa-edit" style="  font-size: 16px;" ></i> </a> <a class="btn btn-sm text-danger" style="  font-size: 16px;" href="supplier/delete/'+full.id+'"><i class="fa fa-trash-o"></i> </a>'
                        
                    }
                }
            ],
            columns: [
                
                { data: 'id', name: 'id' },
                { data: 'fullname', name: 'fullname' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'address', name: 'address' },
            ]
        });
    });
</script>

@endsection