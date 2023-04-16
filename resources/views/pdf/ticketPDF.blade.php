<html>
    <head>
         <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>PDF User</title>
        <!-- CSS only -->
        <style>

        </style>
    </head>
    <body>
    <div class="row justify-content-center">

        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-header" style="background-color: rgb(198, 153, 68) !important; color: white; font-weight: bold; font-family: Candara;">
                   Ticket Detail
                </div>

                <div class="card-body">

                <table class="table">
                    <tbody>
                        <tr>
                        <th scope="col">To</th>
                        <td scope="col">{{$ticket->to}}</td>
                        <th scope="col">From</th>
                        <td scope="col">{{$ticket->from}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Reference No</th>
                        <td>{{$ticket->customerId}}</td>
                        <th>Customer Name</th>
                        <td>{{$ticket->customerName}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Email Address</th>
                        <td>{{$ticket->customerEmail}}</td>
                        <th>Customer Address</th>
                        <td>{{$ticket->customerAddress}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Phone</th>
                        <td>{{$ticket->customerPhone}}</td>
                        <th>Passenger</th>
                        <td>{{$ticket->passengerCount}}</td>
                        </tr>

                        <tr>
                        <th scope="row">Sale Price</th>
                        <td>{{$ticket->salePrice}}</td>
                        <th>Purchase Price</th>
                        <td>{{$ticket->purchsasePrice}}</td>
                        </tr>

                        <tr>
                        <th scope="row">Profit</th>
                        <td>{{$ticket->profit}}</td>
                        <th>Payment Method </th>
                        <td>{{$ticket->paymentMethod}}</td>
                        </tr>

                        <tr>
                        <th scope="row">Payment Recieved</th>
                        <td>{{$ticket->paymentRecieved}}</td>
                        <th>Remaining balance </th>
                        <td>{{$ticket->paymentRemaining}}</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>



    </body>
</html>
