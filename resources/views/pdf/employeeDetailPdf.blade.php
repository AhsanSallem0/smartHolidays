<html>
    <head>
         <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>PDF Customer detail</title>
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
                   Employee Detail: 
                </div>

                <div class="card-body">

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="col">Name</th>
                                    <td>{{$datas->name}}</td>
                                    <th scope="row">Email</th>
                                    <td>{{$datas->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Status</th>
                                    <td>
                                        @if($datas->status == 1)
                                            Active
                                        @else
                                            Disable
                                        @endif
                                    </td>
                                    <th scope="col">Phone</th>
                                    <td>{{$datas->phone}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Address</th>
                                    <td>{{$datas->address}}</td>
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
