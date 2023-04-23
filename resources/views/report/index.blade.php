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
                            <div class="card-header">Overall Report</div>
                            <div class="card-body">
                                   <div class="row">
                                        <div class="col-12">
                                            <h5>Ticket based report: </h5>
                                        </div>
                                        <div class="col-md-3 col-sm-6 ">
                                            <a href="{{url('/overall/today/report')}}">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Today Report
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-md-3 col-sm-6 ">
                                            <a href="{{url('/overall/month/report')}}">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Monthly Report
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-md-3 col-sm-6 ">
                                            <a href="{{url('/overall/search/report')}}">
                                                <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Search by date 
                                                            </h5>
                                                        </div>
                                                    </div>
                                            </a>
                                        </div>

                                        <div class="col-12">
                                            <h5>Expense based report: </h5>
                                        </div>
                                        <div class="col-md-3 col-sm-6 ">
                                            <a href="{{url('/today/expense')}}">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Today Expense
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-md-3 col-sm-6 ">
                                            <a href="{{url('/month/expense')}}">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Monthly Expense
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-md-3 col-sm-6 ">
                                            <a href="{{url('/search/expense')}}">
                                                <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Search by date 
                                                            </h5>
                                                        </div>
                                                    </div>
                                            </a>
                                        </div>
                                   </div>
                            </div>
                </div>
    @endif


   <div class="card">
        <div class="card-header">Your Status</div>
            <div class="card-body">
                <div class="row mt-2">

                    <div class="col-12">
                        <h5>Ticket based report: </h5>
                    </div>
                    <div class="col-md-3 col-sm-6 ">
                        <a href="{{url('/today/report')}}">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Today Report
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 ">
                        <a href="{{url('/month/report')}}">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Monthly Report
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 ">
                        <a href="{{url('/search/report')}}">
                            <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Search by date 
                                        </h5>
                                    </div>
                                </div>
                        </a>
                    </div>
                </div>
            </div>
    </div>
   
    
       

@endsection
