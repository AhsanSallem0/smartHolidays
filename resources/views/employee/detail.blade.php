@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-center">

        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-header">
                    Employee Name: {{$employee->name}} 
                </div>

                <div class="card-body">
                       <div class="card">
                        <div class="card-header">Overall Status</div>
                        <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="col">Total Sale (Rs.)</th>
                                    <td>{{$sale}}</td>
                                    <th scope="row">Total Purchase (Rs.)</th>
                                    <td>{{$purchase}}</td>
                                    <th scope="col">Profit (Rs.)</th>
                                    <td>{{$profit}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Payment Recieved (Rs.)</th>
                                    <td>{{$recieve}}</td>
                                    <th scope="col">Remaining Payment (Rs.)</th>
                                    <td>{{$remain}}</td>
                                    <th scope="col"></th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                       </div>



                        <div class="card">
                            <div class="card-header">Monthly Status</div>
                            <div class="card-body">
                            <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="col">Total Sale (Rs.)</th>
                                    <td>{{$monthlysale}}</td>
                                    <th scope="row">Total Purchase (Rs.)</th>
                                    <td>{{$monthlypurchase}}</td>
                                    <th scope="col">Profit (Rs.)</th>
                                    <td>{{$monthlyprofit}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Payment Recieved (Rs.)</th>
                                    <td>{{$monthlyrecieve}}</td>
                                    <th scope="col">Remaining Payment (Rs.)</th>
                                    <td>{{$monthlyremain}}</td>
                                    <th scope="col"></th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header">
                                Today Status
                            </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="col">Total Sale (Rs.)</th>
                                            <td>{{$todaysale}}</td>
                                            <th scope="row">Total Purchase (Rs.)</th>
                                            <td>{{$todaypurchase}}</td>
                                            <th scope="col">Profit (Rs.)</th>
                                            <td>{{$todayprofit}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Payment Recieved (Rs.)</th>
                                            <td>{{$todayrecieve}}</td>
                                            <th scope="col">Remaining Payment (Rs.)</th>
                                            <td>{{$todayremain}}</td>
                                            <th scope="col"></th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card">
                        <div class="card-header">
                             Tickets Status
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
            ajax: '{!! route('ticket.data.employee',"$employee->id") !!} ',
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
