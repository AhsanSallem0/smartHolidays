<html>
    <head>
         <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>PDF Customet</title>
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
                   Employees Records:
                </div>
                <table class="table table-striped" style="font-size: 14px;">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                               @foreach($datas as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>
                                        @if($data->status == 1)
                                            <span class="badge bg-success text-white">Active</span>
                                        @else
                                            <span class="badge bg-danger text-white">Disable</span>
                                        @endif
                                    </td>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->address}}</td>
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
