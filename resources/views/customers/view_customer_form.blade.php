@extends('layouts.layout')

@section('content')
<style>
    ol li{
        font-size: 30px;
        font-family: 900;
    }
</style>
<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-plus-circle'></i> Customer Information
        <small>
        </small>
    </h1>
    <a href="" class="btn btn-primary waves-effect waves-themed text-white" onclick="printSection('p_page')"><i class="fal fa-print"></i> Print Invoice</a>
</div>
<div class="container" id="p_page">
    <div data-size="A4">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex align-items-center mb-5">
                    <h1 class="keep-print-font fw-500 mb-0 text-primary flex-1 position-relative">
                        APPLICATION FORM
                        <img  class="position-absolute pos-top pos-right mt-1 hidden-md-down keep-print-font" height="150" width="100" src="{{ asset('public/customer_images') }}/{{ $customer_info->images ?? 'no_image.png' }}">
                    </h1>
                </div>
                <h3 class="color-primary-600 keep-print-font pt-4 m-0">
                   Personal Information.
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-10 col-xl-8 d-flex">
                <div class="table-responsive">
                    <table class="table table-clean table-sm w-auto align-self-end">
                        <tbody>
                            <tr>
                                <th class="fw-900">
                                    Name Of The Applicant:
                                </th>
                                <th>
                                    <u>
                                        {{ $customer_info->name ?? 'Not Given' }}
                                    </u>
                                </th>
                            </tr>
                            <tr>
                                <th class="fw-900">
                                    S/O:
                                </th> 
                                <th>
                                    {{ $customer_info->guardian ?? 'Not Given' }}
                                </th>
                            </tr>
                            <tr>
                                <th class="fw-900">
                                    CNIC:
                                </th>
                                <th>
                                    {{ $customer_info->cnic_no ?? '**************' }}
                                </th>
                            </tr>
                            <tr>
                                <th class="fw-900">
                                    Mailing Address:
                                </th>
                                <th>
                                    {{ $customer_info->postal_address ?? 'Not Given' }}
                                </th>
                            </tr>
                            <tr>
                                <th class="fw-900">
                                    Permanent Address:
                                </th>
                                <th>
                                    {{ $customer_info->perment_address ?? 'Not Given' }}
                                </th>
                            </tr>
                            <tr>
                                <th class="fw-900">
                                    Mobile No:
                                </th>
                                <th>
                                    {{ $customer_info->mobile_no ?? 'Not Given' }}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 col-xl-12 col-sm-12">
                <hr class="table-scale-border-bottom fw-700">
            </div>
            <div class="col-sm-12 col-md-10 col-xl-8">
                <h3 class="color-primary-600 keep-print-font pt-4 m-0">
                    Next Of KIN (NOK) Information.
                 </h3>
                <div class="table-responsive">
                    <table class="table table-sm w-auto table-clean">
                        <tbody>
                            <tr>
                                <th class="fw-900">
                                    Nomeeni Name:
                                </th>
                                <th>
                                    {{ $customer_info->nominee->name ?? 'Not Given' }}
                                </th>
                            </tr>
                            <tr>
                                <th class="fw-900">
                                    Nomeeni CNIC:
                                </th>
                                <th>
                                    {{ $customer_info->nominee->cnic_no ?? '**************' }}
                                </th>
                            </tr>
                            <tr>
                                <th class="fw-900">
                                    Relation With Applicant:
                                </th>
                                <th>
                                    {{ $customer_info->nominee->relation ?? 'Not Given' }}
                                </th>
                            </tr>
                            <tr>
                                <th class="fw-900">
                                    Nomeeni Address
                                </th>
                                <th>
                                    {{ $customer_info->nominee->postal_address ?? 'Not Given' }}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-12 col-md-2 col-xl-4">
                <img  class="position-absolute pos-top pos-right mt-1 hidden-md-down keep-print-font" height="150" width="100" src="{{ asset('public/customer_images') }}/{{ $customer_info->nominee->images ?? 'no_image.png' }}">
            </div>
            <div class="col-md-12 col-xl-12 col-sm-12">
                <hr class="table-scale-border-bottom fw-700">
            </div>
            <div class="col-sm-12 col-md-10 col-xl-8">
                <h3 class="color-primary-600 keep-print-font pt-4 m-0">
                    Applicant Booking Information.
                 </h3>
                <div class="table-responsive">
                    <table class="table table-sm w-auto table-clean">
                        <tbody>
                            <tr>
                                <th class="fw-900">
                                    Plot Block:
                                </th>
                                <th>
                                    {{ $customer_info->booking->plot->block->name ?? 'Not Given' }}
                                </th>
                            </tr>
                            <tr>
                                <th class="fw-900">
                                    Plot No:
                                </th>
                                <th>
                                    {{ $customer_info->booking->plot->name ?? 'Not Given' }}
                                </th>
                            </tr>
                            <tr>
                                <th class="fw-900">
                                    Plot Size:
                                </th>
                                <th>
                                    {{ $customer_info->booking->plot->size ?? 'Not Given' }}
                                </th>
                            </tr>
                            <tr>
                                <th class="fw-900">
                                    Registration No:
                                </th>
                                <th>
                                    # {{ $customer_info->booking->id ?? 'Not Given' }}
                                </th>
                            </tr>
                            <tr>
                                <th class="fw-900">
                                    Down Payment:
                                </th>
                                <th>
                                    Rs {{ $customer_info->booking->down_payment ?? '0.00' }}
                                </th>
                            </tr>
                            <tr>
                                <th class="fw-900">
                                    Booking Date:
                                </th>
                                <th>
                                    {{ $customer_info->booking->created_at ?? '0.00' }}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- <hr> --}}
            </div>
            <div class="col-md-12 col-xl-12 col-sm-12">
                <hr class="table-scale-border-bottom fw-700">
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th class="text-center border-top-0 table-scale-border-bottom fw-700"></th>
                                <th class="border-top-0 table-scale-border-bottom fw-700">Recipits No #</th>
                                <th class="border-top-0 table-scale-border-bottom fw-700">Installment Amount</th>
                                <th class="text-right border-top-0 table-scale-border-bottom fw-700">Installment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
        <div class="row mb-5">
            <div class="col-sm-4">
                <table class="table table-clean">
                    <tbody>
                        <tr>
                            <td class="text-left">
                                <strong>Booking Officer</strong>
                            </td>
                            {{-- <td class="text-right">{{ $subtotal}}</td> --}}
                        </tr>
                        <tr class="table-scale-border-top border-left-0 border-right-0 border-bottom-0">
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4">
                <table class="table table-clean">
                    <tbody>
                        <tr>
                            <td class="text-left">
                                <strong>Date</strong>
                            </td>
                            {{-- <td class="text-right">{{ $subtotal}}</td> --}}
                        </tr>
                        <tr class="table-scale-border-top border-left-0 border-right-0 border-bottom-0">
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4">
                <table class="table table-clean">
                    <tbody>
                        <tr>
                            <td class="text-left">
                                <strong>Applicant Signature.</strong>
                            </td>
                            {{-- <td class="text-right">{{ $subtotal}}</td> --}}
                        </tr>
                        <tr class="table-scale-border-top border-left-0 border-right-0 border-bottom-0">
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="height: 400px;">
            
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                <h1 class="fw-900 fs-4"><u>شرائط و ضوابط</u></h1>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                <ol style="direction: rtl;text-align:right;">
                    <li>نا مکمل فارم مسترد کر دیاجائے گا ۔</li>
                    <li> ضروری کوائف شناختی کارڈ کی کاپی چار  عدد اور درخواست گزار اور نومنی کی دو عدد پاسپورٹ سائیز فوٹو  فارم کے ساتھ منسلک کریں ۔ </li>
                    <li> ہر ماہ کی 10 تاریخ سے پہلے پہلے قسط ادا کروائیں۔</li>
                    <li>ایک ماہ کی لیٹ قسط پر 5 فیصد اضافی چاجز وصول کیے جائیں گے ۔</li>
                    <li>پلاٹ کینسل ہونے کی صورت میں 35فیصد کٹوتی کر کے باقی رقم 150 دن کے اندر کسٹمر کو دی گئی شرائط پرواپس دی جائے گی۔دیگر کوئی کلیم بھی قابل  قبول نہ ہوگا۔</li>
                    <li>3 ماہ لگاتا رقسط جمع نا کروانے کی صورت میں ادارہ بغیر نوٹس پلاٹ فائل کینسل کرنے کا مجاز ہے۔ اور ادارہ لی گئی رقم واپس کرنے کا مجاذ نہیں ہوگا۔</li>
                    <li>فائل کو فروخت کرنے سے ایک ہفتہ  پہلے ادارہ کو مطلع کرنا لازمی ہوگا۔</li>
                    <li>فائل ٹرانسفر ہیڈ آفس سے ہی ہوگی۔</li>
                    <li>فائل ٹرانسفر فیس وصول کی جائے گی  ۔</li>
                    <li> پلاٹ کی قیمت میں ڈویلپمنٹ چارجز اور یوٹیلیٹی چارجز شامل نہیں ہیں ۔</li>
                    <li>پلاٹ کی تمام چارجز  مکمل کرنے  کے بعد لیز ٹرانسفر کے اخراجات کی تمام ذمہ داری کلائینٹ کی ہوگی۔ </li>
                    <li>پلاٹ کے حصول تک کی  ساری ذمہ داری ایجنٹ کی ہوگی ۔</li>
                    <li>اقساط اپنے متعلقہ برانچ میں ہی جمع کروائی جاسکتی ہے۔</li>
                    <li>رہائشی پلاٹ کو کسی بھی طرح کمرشل مقاصد کے لیے استعمال نہیں کرنے دیا جائے گا ۔</li>
                    <li>کسی بھی سرکاری محکمہ کی وجہ سے کوئی بھی تبدیلی کی جائے تو الاٹی کا کوئی اعتراض قابل قبول نہیں ہوگا۔</li>
                    <li>نیو فاطمہ سٹی انتظامیہ کی جانب سے ملنے والی ہدایات کی پابندی ہر کلائینٹ پر لازم ہوگی بصورت دیگر رکنیٹ منسوخ کی جاسکتی ہے ۔</li>
                    <li>ایکسٹرا لینڈ چارجز مربع یارڈ کے حساب سے لاگو ہوں گے۔</li>
                </ol>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <ol style="direction: rtl;text-align:right;list-style:none;">
                    <li>میں مسمی ۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔ ولد ۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔ شناختی کارڈ نمبر ۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔</li>
                    <li>مندرجہ بالا تمام قوائد و ضوابط کو پڑ ھچکا ہوں اور عمل کرنے کا پابند ہوں بصورت دیگر ادارہ تمام حقوق محفوظ رکھتا ہے ۔</li>
                    <li>دستخط ۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔					تاریخ۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔۔</li>
                </ol>
            </div>
            <div class="col-md-12 col-xl-12 col-sm-12">
                <hr class="table-scale-border-bottom fw-700">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                <h1 class="fw-900 fs-4"><u>دفتری استعمال</u></h1>
            </div>
        </div>
        <div class="row d-flex justify-content-end">
            <div class="col-md-12 col-xl-10 col-sm-12 ">
                <hr class="table-scale-border-bottom fw-700">
            </div>
            <div class="col-md-12 col-xl-10 col-sm-12">
                <hr class="table-scale-border-bottom fw-700">
            </div>
        </div>
    </div>
</div>
@endsection
