@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-center">

        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-header">
                   Add new Ticket
                </div>

                <div class="card-body">
                    <form action="{{url('/update/expense/')}}" method="POST">
                        @csrf
                        
                           <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">To *</label>
                                            <input type="text" class="form-control" id="to" name="to" placeholder="">
                                        <p id="p1" class="text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">From *</label>
                                        <input type="text" class="form-control" id="from"  name="from" placeholder="">
                                        <p id="p2" class="text-danger"></p>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Select Customers </label>
                                        <select name="cusNum" class="form-control" id="cusNum">
                                            <option value="" selected> -- Existing Customer --</option>
                                           @foreach($customer as $cus)
                                           <option value="{{$cus->id}}">{{$cus->fullname}}</option>
                                           @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Customer Reference No: * (It must be unique)</label>
                                            <input type="number" class="form-control" id="reference" name="reference" placeholder="">
                                        <p id="p3" class="text-danger"></p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Customer Name *</label>
                                        <input type="text" class="form-control" id="name"  name="name" placeholder="">
                                        <p id="p4" class="text-danger"></p>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Customer Email Address</label>
                                            <input type="number" class="form-control" id="email" name="email" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Customer Address</label>
                                        <input type="text" class="form-control" id="address"  name="address" placeholder="">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                            <input type="number" class="form-control" id="phone" name="phone" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Passenger *</label>
                                        <input type="number" class="form-control" id="passenger"  name="passenger" placeholder="">
                                        <p id="p5" class="text-danger"></p>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Purchase Price *</label>
                                            <input type="number" class="form-control" id="purchase" name="purchase" placeholder="">
                                            <p id="p6" class="text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sale Price *</label>
                                        <input type="number" class="form-control" id="sale"  name="sale" placeholder="">
                                        <p id="p7" class="text-danger"></p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Profit</label>
                                        <input type="number" value="0" disabled class="form-control text-dark" id="profit"  name="profit" placeholder="">

                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Payment Method *</label>
                                        <select name="paymentMethod" class="form-control" id="paymentMethod">
                                            <option value="" selected> -- Select on of them --</option>
                                            <option value="Cash">Cash</option>
                                            <option value="FullPay">FullPay</option>
                                            <option value="Partial">Partial</option>
                                        </select>
                                        <p id="p8" class="text-danger"></p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Payment Recieved *</label>
                                        <input type="number" class="form-control" id="payRecieved"  name="payRecieved" placeholder="">
                                        <p id="p9" class="text-danger"></p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Remaining payment </label>
                                        <input type="number" disabled value="0" class="form-control text-dark" id="remaining"  name="remainingPayment" placeholder="">

                                    </div>
                                </div>
                               

                             

                                <div class="col-12">
                                    <a href="{{url('/package')}}">
                                        <button type="button" class="btn btn-secondary">Back</button>
                                    </a>
                                    <button type="submit" id="submit" class="btn btn-primary">Add</button>
                                </div>
                           </div>

                        </div>
                     
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>



<script>
    $("#submit").click(function() {
        var to = $("#to").val();
        var from = $("#from").val();
        var reference = $("#reference").val();
        var name = $("#name").val();
        
        var passenger = $("#passenger").val();
        var purchase = $("#purchase").val();
        var sale = $("#sale").val();

        var paymentMethod = $("#paymentMethod").val();
        var payRecieved = $("#payRecieved").val();


            if(to.length == "")
            {
            $("#p1").text("This field is required!");
            $("#to").focus();
            return false;
            }

          else if(from.length == "")
          {
            $("#p2").text("This field is required!");
            $("#from").focus();
            return false;
          }
          else if(reference.length == "")
          {
            $("#p3").text("This field is required!");
            $("#cusNum").focus();
            return false;
          }
          else if(name.length == "")
          {
            $("#p4").text("This field is required!");
            $("#name").focus();
            return false;
          }
          else if(passenger.length == "")
          {
            $("#p5").text("This field is required!");
            $("#from").focus();
            return false;
          }
          else if(purchase.length == "")
          {
            $("#p6").text("This field is required!");
            $("#purchase").focus();
            return false;
          }
          else if(sale.length == "")
          {
            $("#p7").text("This field is required!");
            $("#sale").focus();
            return false;
          }
          else if(paymentMethod.length == "")
          {
            $("#p8").text("This field is required!");
            $("#paymentMethod").focus();
            return false;
          }
          else if(payRecieved.length == "")
          {
            $("#p9").text("This field is required!");
            $("#payRecieved").focus();
            return false;
          }
         
          else{
            return true;
          }


        

          
      });
</script>


@endsection