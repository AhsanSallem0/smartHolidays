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

    <?php $role = Auth::user()->role_as; ?>
        @if($role == 0)
    <div class="card">
                <div class="card-header">Overall History</div>

        <div class="card-body">

                <div class="row">
                    <div class="col-md-3 col-sm-6 ">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Empolyees
                                <span class="badge bg-primary" style="float: right;">{{$employee}}</span> </h5>   
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 ">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Customers
                                <span class="badge bg-primary" style="float: right;">{{$customer}}</span> </h5>   
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Expense
                            <span class="badge bg-primary" style="float: right;">{{$totalExpense}}</span> </h5>  

                            </div>

                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Today Expense
                            <span class="badge bg-primary" style="float: right;">{{$todayExpense}}</span> </h5>  

                            </div>

                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Overall Total Sale
                                <span class="badge bg-primary" style="float: right;">{{$OveralltotalSale}}</span> </h5>   
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Overall Total Purcahse
                                <span class="badge bg-primary" style="float: right;">{{$OveralltotalPurchase}}</span> </h5>   
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Overall Total Profit
                                <span class="badge bg-primary" style="float: right;">{{$Overallprofit}}</span> </h5>   
                            </div>
                        </div>
                    </div>


            




                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Overall Today Sale
                                    <span class="badge bg-primary" style="float: right;">{{$OveralltodaySale}}</span> </h5>  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Overall Today Purchase
                                    <span class="badge bg-primary" style="float: right;">{{$OveralltodayPurchase}}</span> </h5>  
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Overall Today Profit
                                    <span class="badge bg-primary" style="float: right;">{{$OveralltodayProfit}}</span> </h5>  
                            </div>
                        </div>
                    </div>
                </div>







        </div>

        
    </div>
        @endif
        <!-- <div class="col-md-3 col-sm-6 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Suppliers
                    <span class="badge bg-primary" style="float: right;">{{$suppliers}}</span> </h5>   
                    </h5>
                </div>
            </div>
        </div> -->
       
  <div class="card">
    <div class="card-header">Your Status</div>
        <div class="card-body">

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Total Sale
                                            <span class="badge bg-primary" style="float: right;">{{$totalSale}}</span> </h5>   
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"> Total Purcahse
                                            <span class="badge bg-primary" style="float: right;">{{$totalPurchase}}</span> </h5>   
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"> Total Profit
                                            <span class="badge bg-primary" style="float: right;">{{$profit}}</span> </h5>   
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Today Sale
                                                <span class="badge bg-primary" style="float: right;">{{$todaySale}}</span> </h5>  
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Today Purchase
                                                <span class="badge bg-primary" style="float: right;">{{$todayPurchase}}</span> </h5>  
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Today Profit
                                                <span class="badge bg-primary" style="float: right;">{{$todayProfit}}</span> </h5>  
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Refunds</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Partial Payments
                                    <span class="badge bg-primary" style="float: right;">{{$totalPartial}}</span> </h5>  

                                    </div>
                                </div>
                            </div>


                            </div>




    </div>
  </div>
       

@endsection
