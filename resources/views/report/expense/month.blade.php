@extends('layouts.dashboard')
@section('content')

<style>
    .bg-primary{
        background: rgb(198, 153, 68) !important;
    }
    .card{
        box-shadow: 1px 2px 8px rgb(198, 153, 68) !important;
    }
    .card-title{
        font-weight: bold;
    }
</style>

    <div class="row mt-5">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                                <div class="col-12 text-end">
                                    <a href="{{url('/monthExpensePdf')}}">
                                        <button type="button" class="btn btn-info">Export PDF</button>
                                    </a>

                                </div>
                        <h3 class="card-title">Monthly Expense:</h3>
                        <hr style="height: 2px; background-color:black;">

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="col">Total Expense (Rs.)</th>
                                    <td>{{$expense}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr style="height: 2px; background-color:black;">


                        <div class="card mt-5">
                            
                            <div class="card-header">
                                Monthly record
                            </div>
                            <div class="card-body">
                                <table class="table" style="width: 100%" id="users-table">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Date</th>
                                        <!-- <th scope="col">Action</th> -->
                                        </tr>
                                    </thead>
                                
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    
       

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>



  <!-- DataTables -->
  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('expense.data.month') !!}',
            // columnDefs:[
            //     {
            //         targets: 3,
            //         title:'Action',
            //         orderable:false,
            //         render: function(data,type,full,meta){
            //             return ' <a class="btn btn-sm text-info mt-1" href="expense/edit/'+full.id+'"><i class="fa fa-edit" style="  font-size: 16px;" ></i> </a> <a class="btn btn-sm text-danger" style="  font-size: 16px;" href="expense/delete/'+full.id+'"><i class="fa fa-trash-o"></i> </a>'
                        
            //         }
            //     }
            // ],
            columns: [
                
                { data: 'id', name: 'id' },
                { data: 'description', name: 'description' },
                { data: 'price', name: 'price' },
                { data: 'date', name: 'date' },
            ]
        });
    });
</script>

@endsection
