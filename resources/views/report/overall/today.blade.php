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
                                    <a href="{{url('/overalltodayPdf')}}">
                                        <button type="button" class="btn btn-info">Export PDF</button>
                                    </a>

                                </div>
                        <h3 class="card-title">Overall Today Reporting:</h3>
                        <hr style="height: 2px; background-color:black;">

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="col">Total Sale (Rs.)</th>
                                    <td>{{$sale}}</td>
                                    <th scope="row">Total Purchase (Rs.)</th>
                                    <td>{{$purchase}}</td>
                                    <th scope="col">Your Profit (Rs.)</th>
                                    <td>{{$profit}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Payment Recieved (Rs.)</th>
                                    <td>{{$recieved}}</td>
                                    <th scope="col">Remaining Payment (Rs.)</th>
                                    <td>{{$remaining}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr style="height: 2px; background-color:black;">


                        <div class="card mt-5">
                            
                            <div class="card-header">
                                Today record
                            </div>
                            <div class="card-body">
                                <table class="table" style="width: 100%" id="users-table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Reference No#</th>
                            <th scope="col">To</th>
                            <th scope="col">From</th>
                                        <th scope="col">Custommer Name</th>
                                        <th scope="col">Sale Price</th>
                                        <th scope="col">Purchase Price</th>
                                        <th scope="col">Profit</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Recieved Amount</th>
                                        <th scope="col">Remaining Amount</th>
                                        <th scope="col">Date</th>
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
            ajax: '{!! route('ticket.data.today.overall') !!}',
            columns: [

                { data: 'customerId', name: 'customerId' },
                { data: 'to', name: 'to' },
                { data: 'from', name: 'from' },
                { data: 'customerName', name: 'customerName' },
                { data: 'salePrice', name: 'salePrice' },
                { data: 'purchsasePrice', name: 'purchsasePrice' },
                { data: 'profit', name: 'profit' },
                { data: 'paymentMethod', name: 'paymentMethod' },
                { data: 'paymentRecieved', name: 'paymentRecieved' },
                { data: 'paymentRemaining', name: 'paymentRemaining' },
                { data: 'date', name: 'date' },
            ]
        });
    });
</script>

@endsection
