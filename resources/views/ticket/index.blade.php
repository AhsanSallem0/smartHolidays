@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-end">
        <div class="col-2 my-2">
            <a href="{{url('/ticket/add')}}">
                <button class="btn btn-block btn-primary  btn-sm">Add new ticket</button>
            </a>
        </div>
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-header">
                    All Packges
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