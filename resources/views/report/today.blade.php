@extends('layouts.dashboard')
@section('content')

<div class="row justify-content-center">

    <div class="col-md-6 mt-1">
        <div class="card">
            <div class="card-header">
                Today Reports
            </div>

            <div class="card-body">


                    <table class="table" style="width: 100%" id="users-table" method="get">
                        @csrf
                        <thead>
                        <tr>
                            <th scope="col">Reference No#</th>
                            <th scope="col">Custommer Name</th>
                            <th scope="col">Sale Price</th>

                        </tr>
                        </thead>

                    </table>
            </div>
        </div>
    </div>
</div>

@endsection
