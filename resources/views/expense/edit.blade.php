@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-center">

        <div class="col-md-6 mt-1">
            <div class="card">
                <div class="card-header">
                   Edit Expense
                </div>

                <div class="card-body">
                    <form action="{{url('/update/expense/'.$expense->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description *</label>
                                <input type="text" class="form-control" id="description" value="{{$expense->description}}" name="description" placeholder="">
                            <p id="p1" class="text-danger"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Price *</label>
                            <input type="number" class="form-control" id="price" value="{{$expense->price}}" name="price" placeholder="">
                            <p id="p2" class="text-danger"></p>

                        </div>
                        <a href="{{url('/expense')}}">
                            <button type="button" class="btn btn-secondary">Back</button>
                        </a>
                        <button type="submit" id="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>



<script>
    $("#submit").click(function() {
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var address = $("#address").val();

        if(name.length == "")
            {
            $("#p1").text("Full name required!");
            $("#name").focus();
            return false;
            }
        else if(email.length == "")
          {
            $("#p2").text("Email address required!");
            $("#email").focus();
            return false;
          }
          else if(phone.length == "")
          {
            $("#p3").text("Phone number required!");
            $("#phone").focus();
            return false;
          }
          else if(address.length == "")
          {
            $("#p4").text("This field is required!");
            $("#address").focus();
            return false;
          }
          else{
            return true;
          }


        

          
      });
</script>


@endsection