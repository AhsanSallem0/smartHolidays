<html>
    <head>
         <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>PDF Monthly report</title>
        <!-- CSS only -->
        <style>

        </style>
    </head>
    <body>
    <div class="row justify-content-center">
        
   

        <div class="col-md-12 mt-1">
                        <table class="table" style="background: #000; color: white;">
                            <tbody>
                                <tr>
                                    <th scope="col" >samartholidayskw@gmail.com</th>
                                    <td class="text-end">    </td>
                                    <td class="text-end">    </td>
                                    <td class="text-end">   +96551600163 | +96551600163  </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <br>
                            <img class="brand-img img-fluid" style="width: 50%;" src="{{asset('asset/dist/img/logo-light.png')}}" alt="brand" />
                        <br> -->


            <div class="card">
                <div class="card-header" style="background-color: rgb(198, 153, 68) !important; color: white; font-weight: bold; font-family: Candara;">
                   Monthly Reporting
                </div>

                <div class="card-body">

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
                                    <th scope="col"></th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                </div>


                <div class="card">
                <div class="card-header" style="background-color: rgb(198, 153, 68) !important; color: white; font-weight: bold; font-family: Candara;">
                   Recordss:
                </div>


                    <table class="table table-striped" style="font-size: 14px;">
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
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                        <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{$data->customerId}}</td>
                                    <td>{{$data->customerName}}</td>
                                    <td>{{$data->salePrice}}</td>
                                    <td>{{$data->purchsasePrice}}</td>
                                    <td>{{$data->profit}}</td>
                                    <td>
                                        @if($data->paymentMethod == 'FullPay')
                                            <span class="badge bg-success text-white">FullPay</span>
                                        @else
                                            <span class="badge bg-danger text-white">Partial</span>
                                        @endif
                                    </td>
                                    <td>{{$data->paymentRecieved}}</td>
                                    <td>{{$data->paymentRemaining}}</td>
                                    <td>{{$data->date}}</td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    </body>
</html>
