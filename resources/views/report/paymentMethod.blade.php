@if($paymentMethod->paymentMethod == 'Cash')
    <span class="badge bagde-sm bg-success">Cash</span>
@elseif($paymentMethod->paymentMethod == 'FullPay')
    <span class="badge bagde-sm bg-success">FullPay</span>
@else
    <span class="badge bagde-sm bg-danger">
        <a class=" text-white">{{$paymentMethod->paymentMethod}}</a>
    </span>
@endif  