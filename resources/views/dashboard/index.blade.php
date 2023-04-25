@extends('layouts.dashboard')
@section('content')


<?php
$totalAmount = 0;
$achievedAmount = 0;

foreach ($data as $item) {
    $totalAmount += $item->amount;
    $achievedAmount += $item->achieveAmount;
}
?>

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
			<div class="card-body">
				<div class="chart-container">
                <canvas id="myChart"></canvas>
				</div>
			</div>
		</div>






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


                            <!-- <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Refunds</h5>

                                    </div>
                                </div>
                            </div> -->

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
       
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Target Set', 'Achieved Amount'],
        datasets: [{
            data: [{{$totalAmount}}, {{$achievedAmount}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>


  
@endsection
