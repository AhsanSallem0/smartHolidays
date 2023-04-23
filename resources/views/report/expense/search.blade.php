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

                    <form action="{{url('/search/expense/list')}}">
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

                                            <form action="{{url('/searchExpensePDF')}}">
                                                @csrf
                                                        <input type="hidden" name="get_from_date" id="get_from_date" value="{{$from_date}}" class="form-control" >

                                                        <input type="hidden" name="get_to_date" id="get_to_date" value="{{$to_date}}" class="form-control" >

                                                        <button type="submit" class="btn btn-info">Export PDF</button>
                                            </form>

                                </div>

                            <table class="table table-bordered mt-5">
                                <tbody>
                                    <tr>
                                        <th scope="col">Total Expense (Rs.)</th>
                                        <td>{{$expense}}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <hr style="height: 2px; background-color:black;">


                            <table class="table table-striped">
                                <thead style="background-color: rgb(198, 153, 68) !important; color: white; font-weight: bold;">
                                        <tr>
                                        <th scope="col" class="text-white">#</th>
                                        <th scope="col" class="text-white">Description</th>
                                        <th scope="col" class="text-white">Price</th>
                                        <th scope="col" class="text-white">Date</th>
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
