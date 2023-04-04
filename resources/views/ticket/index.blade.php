@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-end">
        <div class="col-lg-2 col-md-3 col-sm-5 col-12 my-2">
            <a href="{{url('/ticket/add')}}">
                <button class="btn btn-block btn-primary  btn-sm">Add new ticket</button>
            </a>
        </div>
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-header">
                    All Tickets
                </div>
                <div class="card-body">
                    <table class="table" style="width: 100%" id="users-table">
                        <thead>
                            <tr>
                            <th scope="col">Reference No#</th>
                            <th scope="col">Custommer Name</th>
                            <th scope="col">Sale Price</th>
                            <th scope="col">Purchase Price</th>
                            <th scope="col">Profit</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Recieved Amount</th>
                            <th scope="col">Remaining Amount</th>
                            <th scope="col">Action</th>
                            <th scope="col">Payments</th>
                            </tr>
                        </thead>

                    </table>
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
            ajax: '{!! route('ticket.data') !!}',
            columnDefs:[
                {
                    targets: 8,
                    title:'Action',
                    orderable:false,
                    render: function(data,type,full,meta) {
                        return ' <a class="btn btn-sm text-info mt-1" href="ticket/detail/' + full.id + '"><button type="button" class="btn btn-info btn-sm">Detail</button></a> '

                    }},
                {
                    targets: 9,
                    title:'Payments',
                    orderable:false,
                    render: function(data,type,full,meta){
                        return ' <a class="btn btn-sm text-info mt-1" href="ticket/partial/'+full.id+'"><button type="button" class="btn btn-warning btn-sm">Partial</button></a> '

                    },


                }
            ],
            columns: [

                { data: 'customerId', name: 'customerId' },
                { data: 'customerName', name: 'customerName' },
                { data: 'salePrice', name: 'salePrice' },
                { data: 'purchsasePrice', name: 'purchsasePrice' },
                { data: 'profit', name: 'profit' },
                { data: 'paymentMethod', name: 'paymentMethod' },
                { data: 'paymentRecieved', name: 'paymentRecieved' },
                { data: 'paymentRemaining', name: 'paymentRemaining' },
            ]
        });
    });
</script>

@endsection
