<html>
    <head>
         <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>PDF search expense</title>
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
                <div class="m-2">
                    <h6>From date: {{$get_from_date}} </h6>
                    <h6>To date: {{$get_to_date}}</h6>
                </div>


                <div class="card-header" style="background-color: rgb(198, 153, 68) !important; color: white; font-weight: bold; font-family: Candara;">
                   Search by date Expense
                </div>

                <div class="card-body">

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="col">Total Expense (Rs.)</th>
                                    <td>{{$expense}}</td>d>
                                </tr>
                            </tbody>
                        </table>
                </div>


                <div class="card">
                <div class="card-header" style="background-color: rgb(198, 153, 68) !important; color: white; font-weight: bold; font-family: Candara;">
                   Records:
                </div>
                <table class="table table-striped" style="font-size: 14px;">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Date</th>
                                        <!-- <th scope="col">Action</th> -->
                                        </tr>
                                    </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$data->description}}</td>
                                    <td>{{$data->price}}</td>
                                    <td>{{$data->date}}</td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    </body>
</html>
