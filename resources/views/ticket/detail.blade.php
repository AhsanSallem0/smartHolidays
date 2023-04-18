@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-center">

        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-header">
                   Detail
                </div>

                <div class="card-body">
                    <form action="{{url('/ticket/detail/')}}" method="GET">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">To</label>
                                    <input type="text" class="form-control text-dark" disabled id="to" value="{{$ticket->to}}" name="to" placeholder="">
                                    <p id="p1" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">From </label>
                                    <input type="text" class="form-control text-dark" disabled id="from" value="{{$ticket->from}}" name="from" placeholder="">
                                    <p id="p2" class="text-danger"></p>

                                </div>
                            </div>


                            <div class="col-12">
                                <hr>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Reference No</label>
                                    <input type="text" class="form-control text-dark" disabled  value="{{$ticket->customerId}}" id="reference" name="reference" placeholder="">
                                    <p id="p3" class="text-danger"></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Customer Name</label>
                                    <input type="text" class="form-control text-dark" disabled value="{{$ticket->customerName}}" id="name"  name="name" placeholder="">
                                    <p id="p4" class="text-danger"></p>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer Email Address</label>
                                    <input type="email" class="form-control text-dark" disabled value="{{$ticket->customerEmail}}" id="email" name="email" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Customer Address</label>
                                    <input type="text" class="form-control text-dark" disabled id="address"  value="{{$ticket->customerAddress}}" name="address" placeholder="">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="number" class="form-control text-dark" disabled id="phone" value="{{$ticket->customerPhone}}" name="phone" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Passenger</label>
                                    <input type="number" class="form-control text-dark" disabled id="passenger" value="{{$ticket->passengerCount}}" name="passenger" placeholder="">
                                    <p id="p5" class="text-danger"></p>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <input type="text" class="form-control text-dark" disabled id="desc" value="{{$ticket->desc}}" name="desc" placeholder="">

                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sale Price </label>
                                    <input type="number" class="form-control text-dark" disabled id="sale" value="{{$ticket->salePrice}}" name="sale" placeholder="">
                                    <p id="p7" class="text-danger"></p>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Purchase Price </label>
                                    <input type="number" class="form-control text-dark" disabled id="purchase"  value="{{$ticket->purchsasePrice}}" name="purchase" placeholder="">
                                    <p id="p6" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Profit</label>
                                    <input type="number" class="form-control text-dark" id="profit" disabled value="{{$ticket->profit}}"  name="profit" placeholder="">

                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Payment Method </label>
                                    <input type="text" class="form-control text-dark" disabled id="payRecieved" value="{{$ticket->paymentMethod}}" name="payRecieved" placeholder="">



                                    <p id="p8" class="text-danger"></p>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Payment Recieved</label>
                                    <input type="number" class="form-control text-dark" disabled id="payRecieved" value="{{$ticket->paymentRecieved}}" name="payRecieved" placeholder="">
                                    <p id="p9" class="text-danger"></p>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Remaining balance </label>
                                    <input type="number" class="form-control text-dark"  disabled id="remaining" value="{{$ticket->paymentRemaining}}"  name="remainingPayment" placeholder="">

                                </div>
                            </div>




                            <div class="col-12">
                                <a href="{{url('/ticket')}}">
                                    <button type="button" class="btn btn-secondary">Back</button>
                                </a>

                                <a href="{{url('ticketPDF/'.$ticket->id)}}">
                                    <button type="button" class="btn btn-info">Export PDF</button>
                                </a>
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
    </script>




@endsection
