@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-center">
    <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">
                    Record
                </div>
                <div class="card-body">
                    <table class="table" style="width: 100%" id="users-table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pay Amount</th>
                            <th scope="col">Date</th>
                            </tr>
                        </thead>
                    
                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-4 mt-1">
            <div class="card">
                <div class="card-header">
                    Partial Payments
                </div>

                <div class="card-body">
                    <form action="{{url('update/partial/'.$partial->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sale Price</label>
                            <input type="text" class="form-control text-dark" disabled id="salePrice" value="{{$partial->salePrice}}" placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Recieved Payment</label>
                            <input type="text" class="form-control text-dark" disabled value="{{$partial->paymentRecieved}}" placeholder="">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Remaining Price</label>
                            <input type="text" class="form-control text-dark" id="remainingprice" disabled value="{{$partial->paymentRemaining}}" name="remainingprice" placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Collect</label>
                            <input type="text" class="form-control" id="received"  name="received" placeholder="">
                            <p id="p2" class="text-danger"></p>

                        </div>
                        <a href="{{url('/ticket')}}">
                            <button type="button" class="btn btn-secondary">Back</button>
                        </a >
                        <button type="submit" id="submit"  href="update/partial/" class="btn btn-primary">Enter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- DataTables -->
  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('partial.data',"$partial->id") !!} ',
            columns: [
                
                { data: 'id', name: 'id' },
                { data: 'payment', name: 'payment' },
                { data: 'date', name: 'date' },
            ]
        });
    });
</script>

@endsection
