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

                    <form action="{{url('/overall/search/report/list')}}">
                            @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <label for="">From Date *</label>
                                <input type="date" name="from_date" id="from_date" value="{{$from_date}}" class="form-control" >
                                <p id="p1" class="text-danger"></p>

                            </div>
                            <div class="col-md-5">
                                <label for="">To date *</label>
                                <input type="date" name="to_date" id="to_date" value="{{$to_date}}" class="form-control" >
                                <p id="p2" class="text-danger"></p>

                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="submit" id="submit" class="mt-2 btn btn-primary btn-block"> Search </button>
                            </div>
                    </form>

                        <div class="col-12 mt-5" id="portion">                            
                            <hr style="height: 2px; background-color:black;">
                                <div class="col-12 text-end">

                                            <form action="{{url('/overallsearchPDF')}}">
                                                @csrf
                                                        <input type="hidden" name="get_from_date" id="get_from_date" value="{{$from_date}}" class="form-control" >

                                                        <input type="hidden" name="get_to_date" id="get_to_date" value="{{$to_date}}" class="form-control" >

                                                        <button type="submit" class="btn btn-info">Export PDF</button>
                                            </form>

                                </div>

                            <table class="table table-bordered mt-5">
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

                            <table class="table table-striped" style="font-size: 14px;">
                                <thead style="background-color: rgb(198, 153, 68) !important; color: white; font-weight: bold;">
                                    <tr>
                                        <th scope="col" class="text-white">Reference No#</th>
                            <th scope="col">To</th>
                            <th scope="col">From</th>
                                        <th scope="col" class="text-white">Custommer Name</th>
                                        <th scope="col" class="text-white">Sale Price</th>
                                        <th scope="col" class="text-white">Purchase Price</th>
                                        <th scope="col" class="text-white">Profit</th>
                                        <th scope="col" class="text-white">Payment Method</th>
                                        <th scope="col" class="text-white">Recieved Amount</th>
                                        <th scope="col" class="text-white">Remaining Amount</th>
                                        <th scope="col" class="text-white">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datas as $data)
                                        <tr>
                                            <td>{{$data->customerId}}</td>
                                            <td>{{$data->to}}</td>
                                            <td>{{$data->from}}</td>
                                            <td>{{$data->customerName}}</td>
                                            <td>{{$data->salePrice}}</td>
                                            <td>{{$data->purchsasePrice}}</td>
                                            <td>{{$data->profit}}</td>
                                            <td>
                                                @if($data->paymentMethod == 'FullPay')
                                                    <span class="badge bg-success text-white">FullPay</span>
                                                @else
                                                   <span class="badge bg-danger text-white">{{$data->paymentMethod}}</span>
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
        </div>
    </div>
    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>



<script>
    $("#submit").click(function() {
        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();


        if(from_date.length == "")
        {
            $("#p1").text("This field is required!");
            $("#from_date").focus();
            return false;
        }
        else if(to_date.length == "")
        {
            $("#p2").text("This field is required!");
            $("#to_date").focus();
            return false;
        }
        else{
            return true;
        }
    });
</script>

@endsection
