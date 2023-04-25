@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-header">
                   Ticket Detail
                </div>

                <div class="card-body">
                <?php $role = Auth::user()->role_as; ?>
                    @if($role ==0)
                    <form action="{{url('/ticket/update/'.$ticket->id)}}" method="POST">
                    @endif

                        @csrf

                           <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">To *</label>
                                            <input type="text" class="form-control"  value="{{$ticket->to}}" id="to" name="to" placeholder="">
                                        <p id="p1" class="text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">From *</label>
                                        <input type="text" class="form-control" id="from"  value="{{$ticket->from}}"  name="from" placeholder="">
                                        <p id="p2" class="text-danger"></p>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Reference No: * (Auto generated for new customer)</label>
                                        <input type="hidden" class="form-control text-dark"   value="{{$ticket->customerId}}"   name="reference" placeholder="">

                                            <input type="text" class="form-control text-dark" disabled  value="{{$ticket->customerId}}"  placeholder="">
                                        <p id="p3" class="text-danger"></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Customer Name *</label>
                                        <input type="text" class="form-control" id="name"   value="{{$ticket->customerName}}"  name="name" placeholder="">
                                        <p id="p4" class="text-danger"></p>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Customer Email Address</label>
                                            <input type="email" class="form-control" id="email"    value="{{$ticket->customerEmail}}" name="email" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Customer Address</label>
                                        <input type="text" class="form-control" id="address"   value="{{$ticket->customerAddress}}"  name="address" placeholder="">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                            <input type="number" class="form-control"   value="{{$ticket->customerPhone}}"  id="phone" name="phone" placeholder="">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Passenger *</label>
                                        <input type="number" class="form-control" id="passenger"   value="{{$ticket->passengerCount}}"   name="passenger" placeholder="">
                                        <p id="p5" class="text-danger"></p>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                            <input type="text" class="form-control" id="desc"   value="{{$ticket->desc}}"  name="desc" placeholder="">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sale Price *</label>
                                        <input type="number" class="form-control" id="sale"   value="{{$ticket->salePrice}}"   name="sale" placeholder="">
                                        <p id="p7" class="text-danger"></p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Purchase Price *</label>
                                            <input type="number" class="form-control"   value="{{$ticket->purchsasePrice}}"  id="purchase" name="purchase" placeholder="">
                                            <p id="p6" class="text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Profit</label>
                                        <input type="number"    value="{{$ticket->profit}}"   class="form-control text-dark" id="profit"  name="profit" placeholder="">

                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Payment Method *</label>
                                        <select name="paymentMethod" class="form-control" id="paymentMethod">
                                            <option value="{{$ticket->paymentMethod}}" selected> {{$ticket->paymentMethod}}</option>
                                            <option value="FullPay">FullPay</option>
                                            <option value="Partial">Partial</option>
                                        </select>
                                        <p id="p8" class="text-danger"></p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Payment Recieved *</label>
                                        <input type="number" class="form-control" value="{{$ticket->paymentRecieved}}" id="payRecieved"  name="payRecieved" placeholder="">
                                        <p id="p9" class="text-danger"></p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Remaining balance </label>
                                        <input type="number"   value="{{$ticket->paymentRemaining}}" class="form-control text-dark" id="remaining"  name="remainingPayment" placeholder="">

                                    </div>
                                </div>




                                <div class="col-12">
                                    <a href="{{url('/ticket')}}">
                                        <button type="button" class="btn btn-secondary">Back</button>
                                    </a>

                                    <a href="{{url('/ticketDetailPdf/'.$ticket->id)}}">
                                        <button type="button" class="btn btn-info">Export PDF</button>
                                    </a>

                                <button type="submit" id="submit" class="btn btn-primary">Update</button>

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
                $("#reference").focus();
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
                $("#passenger").focus();
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


    <script>
        $(document).ready(function() {
            //  get value of profit
            $("#purchase").keyup(function() {
                var purchase = $(this).val();
                var sale = $('#sale').val();

                var profit = sale - purchase;
                $('#profit').val(profit);
            });


            // here we ger remaining payment
            $("#payRecieved").keyup(function() {
                var payRecieved = $(this).val();
                var sale = $('#sale').val();

                var remain = sale - payRecieved;
                $('#remaining').val(remain);
            });


        // here we get existing customer data
            $("#cusNum").change(function(){
                var id = $(this).val();
                $.ajax({
                    url:'{{ url('/customer/fetch/data') }}',
                    type:'get',
                    data:{'id':id},
                    success:function(data){
                        $('#reference').val(data.uniqueId);
                        $('#name').val(data.fullname);
                        $('#email').val(data.email);
                        $('#address').val(data.address);
                        $('#phone').val(data.phone);
                        toastr.success('Existing customer data added!');
                    }
                });

            });
    });
        $(document).ready(function(){
            $('#paymentMethod').on('change', function() {
            if ( this.value == 'FullPay')
            {
               var sale = $('#sale').val();
               $('#payRecieved').val(sale);
            }
            else
            {
                $('#payRecieved').val('');
            }
            });
        });
</script>




@endsection
