@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    All Customers
                </div>
                <div class="card-body">
                    <table class="table" style="width: 100%" id="users-table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Reference no.</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                    
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mt-1">
            <div class="card">
                <div class="card-header">
                    Add new customer
                </div>

                <div class="card-body">
                    <form action="{{url('/insert/customer')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Reference Number *</label>
                            <input type="number" class="form-control" id="reference" name="reference" placeholder="">
                            <p id="emailError" style="color: red;">  </p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name </label>
                            <input type="text" class="form-control" id="name" name="fullname" placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email </label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone </label>
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Address </label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="">

                        </div>
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>



<script>
   $(document).ready(function() {
        // Attach a click event handler to the submit button
            $('#submit').click(function(event) {
            event.preventDefault(); 

            var reference = $('#reference').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var address = $('#address').val();

            if(reference.length == "")
            {
                $('#emailError').text('Please fill with unique number');

                return false;
            }
            else{
                $.ajax({
                url: '/check-email-unique',
                method: 'POST', 
                headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                data: {
                    reference: reference , name: name , email : email , phone  : phone , address : address
                },
                success: function(response) {
                        if (response.success) {
                        $('#emailError').text('Please fill with unique number');
                        } else if (response.done) {
                            location.reload(true);
                            toastr.success(success.message,'New Customer has been added!');
                        }
                    }
                });
            }
            

            
           
        });
    });
</script>

  <!-- DataTables -->
  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('customer.data') !!}',
            columnDefs:[
                {
                    targets: 6,
                    title:'Action',
                    orderable:false,
                    render: function(data,type,full,meta){
                        return ' <a class="btn btn-sm text-info mt-1" href="customer/edit/'+full.id+'"><i class="fa fa-edit" style="  font-size: 16px;" ></i> </a> <a class="btn btn-sm text-danger" style="  font-size: 16px;" href="customer/delete/'+full.id+'"><i class="fa fa-trash-o"></i> </a>'
                        
                    }
                }
            ],
            columns: [
                
                { data: 'id', name: 'id' },
                { data: 'uniqueId', name: 'uniqueId' },
                { data: 'fullname', name: 'fullname' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'address', name: 'address' },
            ]
        });
    });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>



@endsection