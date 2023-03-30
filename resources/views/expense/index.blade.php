@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-lg-8 ">
            <div class="card">
                <div class="card-header">
                    All Expenses
                </div>
                <div class="card-body">
                    <table class="table" style="width: 100%" id="users-table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
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
                    Add new expense
                </div>

                <div class="card-body">
                    <form action="{{url('/insert/expense')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description *</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            <p id="p1" class="text-danger"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Price *</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="">
                            <p id="p2" class="text-danger"></p>

                        </div>
                        <button type="submit" id="submit2" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>



<script>
    $("#submit2").click(function() {
        var description = $("#description").val();
        var price = $("#price").val();

        if(description.length == "")
            {
            $("#p1").text("This field is required!");
            $("#description").focus();
            return false;
            }
          else if(price.length == "")
          {
            $("#p2").text("This field is required!");
            $("#price").focus();
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
            ajax: '{!! route('expense.data') !!}',
            columnDefs:[
                {
                    targets: 3,
                    title:'Action',
                    orderable:false,
                    render: function(data,type,full,meta){
                        return ' <a class="btn btn-sm text-info mt-1" href="expense/edit/'+full.id+'"><i class="fa fa-edit" style="  font-size: 16px;" ></i> </a> <a class="btn btn-sm text-danger" style="  font-size: 16px;" href="expense/delete/'+full.id+'"><i class="fa fa-trash-o"></i> </a>'
                        
                    }
                }
            ],
            columns: [
                
                { data: 'id', name: 'id' },
                { data: 'description', name: 'description' },
                { data: 'price', name: 'price' },
            ]
        });
    });
</script>

@endsection