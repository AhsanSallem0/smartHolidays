<html>
    <head>
         <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>PDF ticket detail</title>
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
                   Ticket Detail
                </div>

                <div class="card-body">

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="col">To</th>
                                    <td>{{$datas->to}}</td>
                                    <th scope="row">From</th>
                                    <td>{{$datas->from}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Reference No</th>
                                    <td>{{$datas->customerId}}</td>
                                    <th scope="col">Customer Name</th>
                                    <td>{{$datas->customerName}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Customer Email</th>
                                    <td>{{$datas->customerEmail}}</td>
                                    <th scope="col">Customer Address</th>
                                    <td>{{$datas->customerAddress}}</td>
                                </tr>

                                <tr>
                                    <th scope="col">Customer Phone</th>
                                    <td>{{$datas->customerPhone}}</td>
                                    <th scope="col">Total Passengers</th>
                                    <td>{{$datas->passengerCount}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Description</th>
                                    <td>{{$datas->desc}}</td>
                                    <th scope="col">Sale Price</th>
                                    <td>{{$datas->salePrice}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Purchase Price</th>
                                    <td>{{$datas->purchsasePrice}}</td>
                                    <th scope="col">Profit</th>
                                    <td>{{$datas->profit}}</td>
                                </tr>

                                <tr>
                                    <th scope="col">Payment Method</th>
                                    <td>{{$datas->paymentMethod}}</td>
                                    <th scope="col">Payment Recieved</th>
                                    <td>{{$datas->paymentRecieved}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Remaining Amount</th>
                                    <td>{{$datas->paymentRemaining}}</td>
                                    <th scope="col">Date</th>
                                    <td>{{$datas->date}}</td>

                                </tr>


                                
                            </tbody>
                        </table>
                </div>


               
            </div>
        </div>
    </div>



    </body>
</html>
