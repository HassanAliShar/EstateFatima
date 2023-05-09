
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
                    <div class="card-header fw-900 bg-dark text-light">User Plot Installment Info</div>
                    <div class="card-body">
                        <a href="" class="btn btn-primary waves-effect waves-themed text-white mb-5" onclick="printSection('p_page')"><i class="fal fa-print"></i> Print Invoice</a>
                        <div class="container" id="p_page">
                            <div data-size="A4" >
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="d-flex align-items-center mb-5">
                                            <h2 class="keep-print-font fw-500 mb-0 text-primary flex-1 position-relative">
                                                FatimaKashmiri City
                                                <small class="text-muted mb-0 fs-xs">
                                                    227 Cobblestone Road 30000 Bedrock, Cobblestone County
                                                </small>
                                                <!-- barcode demo only -->
                                                <img id="barcode" alt="" class="position-absolute pos-top pos-right height-3 mt-1 hidden-md-down" src="data:image/png;base64,">
                                            </h2>
                                        </div>
                                        <h3 class="color-primary-600 keep-print-font pt-4 m-0">
                                           Customer's Installments Details
                                        </h3>
                                        <div class="text-dark fw-700 h1 mb-g keep-print-font">
                                            {{-- # @foreach ($invoice->bookings as $row) --}}
                                                # {{ $invoice->booking->id ?? '##' }}
                                            {{-- @endforeach --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 d-flex">
                                        <div class="table-responsive">
                                            <table class="table table-clean table-sm align-self-end">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Issue Date:
                                                        </td>
                                                        <td>
                                                            {{ $date }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Installments:
                                                        </td>
                                                        <td>
                                                            {{ count($invoice->installments) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Block:
                                                        </td>
                                                        <td>
                                                            {{ $invoice->booking->plot->block->name ?? "Not Given" }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Plot No #
                                                        </td>
                                                        <td>
                                                            {{ $invoice->booking->plot->name ?? "Not Given" }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 ml-sm-auto">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-clean">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <strong>Customer Name</strong>
                                                        </td>
                                                        <td>
                                                            <strong>{{ $invoice->name }}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong>Contact No #</strong>
                                                        </td>
                                                        <td>
                                                            {{ $invoice->mobile_no }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong>Email Address</strong>
                                                        </td>
                                                        <td>
                                                            {{ $invoice->email }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong>Address</strong>
                                                        </td>
                                                        <td>
                                                            {{ $invoice->perment_address }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table mt-5">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center border-top-0 table-scale-border-bottom fw-700"></th>
                                                        <th class="border-top-0 table-scale-border-bottom fw-700">Recipits No #</th>
                                                        <th class="border-top-0 table-scale-border-bottom fw-700">Installment Amount</th>
                                                        <th class="border-top-0 table-scale-border-bottom fw-700">Installment Details</th>
                                                        <th class="text-right border-top-0 table-scale-border-bottom fw-700">Installment Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $count = 1;
                                                        $subtotal = 0;
                                                        $down_payment =0;
                                                    @endphp
                                                        <tr>
                                                            <td class="text-center fw-700">{{ $count }}</td>
                                                            <td class="text-left strong">{{ $current_installent->id }}</td>
                                                            <td class="text-left">Rs {{ $current_installent->installment_amount }}</td>
                                                            <td class="text-left">{{ $current_installent->installment_details ?? 'N/A' }}</td>
                                                            <td class="text-right">{{ $current_installent->created_at }}</td>
                                                        </tr>
                                                        @php
                                                            $subtotal +=$current_installent->installment_amount;
                                                        @endphp
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5 ml-sm-auto">
                                        <table class="table table-clean">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left">
                                                        <strong>Installment Amount</strong>
                                                    </td>
                                                    <td class="text-right">{{ $subtotal}}</td>
                                                </tr>
                                                <tr class="table-scale-border-top border-left-0 border-right-0 border-bottom-0">
                                                    <td class="text-left keep-print-font">
                                                        <h4 class="m-0 fw-700 keep-print-font color-primary-700">Total</h4>
                                                    </td>
                                                    <td class="text-right keep-print-font">
                                                        <h4 class="m-0 fw-700 keep-print-font">
                                                            {{-- @foreach ($invoice->bookings as $rows) --}}
                                                                {{ $invoice->booking->total_amount ?? 0.00 }}
                                                            {{-- @endforeach --}}
                                                        </h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left keep-print-font">
                                                        <h4 class="m-0 fw-700 keep-print-font color-primary-700">Amount Due</h4>
                                                    </td>
                                                    <td class="text-right keep-print-font">
                                                        <h4 class="m-0 fw-700 keep-print-font text-danger">
                                                            {{-- @foreach ($invoice->booking_orders as $rows) --}}
                                                                {{ $invoice->booking_orders->total_amount }}
                                                            {{-- @endforeach --}}
                                                        </h4>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="py-5 text-primary">
                                            CEO BABAR, thank you very much. We really appreciate your Hopes.
                                            <br>
                                            Please check your all Installments.
                                        </h4>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('include.footer_js')
</body>
</html>
