
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('include.head')
</head>
<body>
    <div class="container">
        <div class="row justify-content-center item-align-center">
            <div class="col-md-12">
                <div class="card" style="top: 5%;">
                    <div class="card-header fw-900 bg-dark text-light">User Plot & Installment Info</div>
                    <div class="card-body">
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <th colspan="2">
                                        <div class="row">
                                            @php
                                                $down_payment = 0;
                                                $id = 0;
                                            @endphp
                                            <div class="col-md-6">
                                                <span class="text-info">Customer Name</span>
                                                <h5 class="text-primary">
                                                    {{ $customer->name ?? "Not Given" }}
                                                </h5>
                                                <span class="text-info">Total Amount</span>
                                                <h5 class="text-primary">
                                                    {{ $customer->booking->total_amount ?? 0.00 }}
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="text-info">Register No</span>
                                                <h5 class="text-primary">
                                                    # {{ $customer->booking->id ?? "##" }}
                                                </h5>
                                                <span class="text-info">Plot No</span>
                                                <h5 class="text-primary">
                                                    {{ $customer->booking->plot->name  ?? 'Not Given' }}
                                                </h5>
                                            </div>
                                        </div>
                                    </th>
                                    <th colspan="2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <span class="text-info">Paid Amount</span>
                                                <h5 class="text-primary">
                                                    {{ $customer->booking->total_amount - $customer->booking_orders->total_amount }}
                                                </h5>
    
                                                <span class="text-info">Payable Amount</span>
                                                <h5 class="text-primary">
                                                    {{ $customer->booking_orders->total_amount ?? 0.00 }}
                                                </h5>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="text-info">Block</span>
                                                <h5 class="text-primary">
                                                    {{ $customer->booking->plot->block->name ?? 'Not Given' }}
                                                </h5>
    
                                                <span class="text-info">Plot Size</span>
                                                <h5 class="text-primary">
                                                    {{ $customer->booking->plot->size ?? 'Not Given' }}
                                                </h5>
                                            </div>
                                            {{-- @php
                                                $total = $down_payment;
                                            @endphp --}}
                                            <div class="col-md-4">
                                                <span class="text-info">DownPayment</span>
                                                <h5 class="text-primary">
                                                    {{ $customer->booking->down_payment ?? 0.00 }}
                                                </h5>
                                                <span class="text-info">Paid Installments</span>
                                                <h5 class="text-primary">
                                                    {{ count($customer->installments ?? []) }}
                                                </h5>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Recipt No</th>
                                    <th>Installment Amount</th>
                                    <th>Installment Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($customer))
                                    {{-- @foreach ($customer as $row) --}}
                                    @foreach ($customer->installments as $irow)
                                        <tr>
                                            <td>{{ $irow->id }}</td>
                                            <td>{{ $irow->installment_amount }}</td>
                                            <td>{{ $irow->created_at }}</td>
                                            <th>
                                                <a href="/user/file/installment/info/{{ $irow->id }}/{{ $customer->id }}" class="btn btn-info btn-sm">View <span class="fal fa-eye"></span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- @endforeach --}}
                                @endif
    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('include.footer_js')
</body>
</html>
