@extends('backend.master.master')

@section('title')
Request Product information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">New Request Product  Invoice Generate</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
</div> <!-- container-fluid -->

<!--Invoice Generate section start-->
<form method="POST" action="{{ route('admin.request_product_information.update') }}">

    <input type="hidden"  value="{{ $invoice->id }}" name="id" />
    @csrf
<div class="row">
    @include('flash_message')
    <div class="col-xl-6">
        <div class="card">
            <h5 class="card-header">Supplier Information</h5>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Select Supplier</label>
                            <select class="select2 form-control show_all_addresss" name="vendor_name"
                                    data-placeholder="Choose ..." id="select_vendor_name_from_list" required>
                                <option value="Add New Supplier" selected>Add New Supplier</option>
                                @foreach($vendors as $all_client_print)
                                <option value="{{ $all_client_print->customer_display_name }}" {{ $all_client_print->customer_display_name == $invoice->vendor_id? 'selected':'' }}>{{ $all_client_print->customer_display_name }}</option>
                                @endforeach

                            </select>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <h5 class="card-header">Invoice</h5>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Invoice #</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="order_id" value="{{ $invoice->request_number }}" id="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Payment Term</label>
                    <div class="col-md-9">
                        <select class="form-select" name="payment_term">
                            <option>Select</option>
                            <option value="Instant Payment" {{ $invoice->term == 'Instant Payment'? 'selected':'' }}>Instant Payment</option>
                            <option value="After Delivery" {{ $invoice->term == 'After Delivery'? 'selected':'' }}>After Delivery</option>
                            <option value="Due end of Month" {{ $invoice->term == 'Due end of Month'? 'selected':'' }}>Due end of Month</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Purchase Date</label>
                    <div class="col-md-9">
                        <div class="input-group" id="datepicker2">
                            <input type="text" name="pay_date" value="{{ $invoice->request_date }}" class="form-control" placeholder="dd M, yyyy"
                                   data-date-format="dd M, yyyy" data-date-container='#datepicker2'
                                   data-provide="datepicker" data-date-autoclose="true">

                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Purchase Note</label>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="4"
                        placeholder="Describe about the product if have any"
                        name="request_note" required="">{{ $invoice->request_note }}</textarea>
                    </div>
                </div>





            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Product Information</h5>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap table-check" id="dynamicAddRemove">
                        <thead class="table-light">
                        <tr>
                            <th style="width:200px"> Product Name</th>

                            <th>Qty</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($invoice_detail as $key=>$all_invoice_detail)
                            @if(($key+1) == 1)

                            <tr>

                                <td style="width:400px">
                                    <select class=" form-control main_product_id select2" name="nmain_product_id[]" id="main_product_id{{ $key+5000 }}" >
                                        <option value="0">Please Select</option>
                                        @foreach($product_names as $main_product_list_all_print)
                                        <option value="{{ $main_product_list_all_print->id }}"
                                            {{ $all_invoice_detail->product_id == $main_product_list_all_print->id ? 'selected':''}}>{{ $main_product_list_all_print->name }}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td><input type="number" min="1" class="form-control p_quantity" value="{{ $all_invoice_detail->quantity }}" name="p_quantity[]" id="p_quantity{{ $key+5000 }}" placeholder="Quantity"></td>

                                <td>
                                    {{-- <div class="d-flex gap-3">
                                        <a href="javascript:void(0);" class="text-danger"><i
                                                    class="mdi mdi-delete-forever font-size-22"></i></a>
                                    </div> --}}
                                </td>
                            </tr>

                            @else
                        <tr>

                            <td style="width:400px">
                                <select class=" form-control main_product_id select2" name="nmain_product_id[]" id="main_product_id{{ $key+5000 }}" >
                                    <option value="0">Please Select</option>
                                    @foreach($product_names as $main_product_list_all_print)
                                    <option value="{{ $main_product_list_all_print->id }}" {{ $all_invoice_detail->product_id == $main_product_list_all_print->id ? 'selected':''}}>{{ $main_product_list_all_print->product_name }}</option>
                                    @endforeach
                                </select>
                            </td>

                            <td><input type="number" min="1" class="form-control p_quantity" value="{{ $all_invoice_detail->quantity }}" name="p_quantity[]" id="p_quantity{{ $key+5000 }}" placeholder="Quantity"></td>

                            <td>

                                <button type="button" class="btn btn-sm btn-outline-danger remove-input-field"><i class="mdi mdi-delete-forever font-size-22"></i></button>
                                {{-- <div class="d-flex gap-3">
                                    <a href="javascript:void(0);" class="text-danger"><i
                                                class="mdi mdi-delete-forever font-size-22"></i></a>
                                </div> --}}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        </tbody>
                    </table>

                    <button id="main_add_new_product" type="button" class="btn btn-light waves-effect btn-label waves-light"><i
                                class="bx bx-plus-medical label-icon "></i> Add New Product
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-7"></div>
                    <div class="col-xl-5">


                        <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Total Product</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="total_product" value="{{ $invoice->total_product }}" id="total_product" readonly>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Total Quantity</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="total_quantity" value="{{ $invoice->total_quantity }}" id="total_quantity" readonly>
                            </div>
                        </div>

                        <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Urgent</label>
                            <div class="col-md-9">
                                <select class="form-control"  name="urgent_type" >
                                    <option value="Yes" {{ $invoice->urgent_type == 'Yes'? 'selected':'' }}>Yes</option>
                                    <option value="No" {{ $invoice->urgent_type == 'No'? 'selected':'' }}>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Request Delivery Date</label>
                            <div class="col-md-9">
                                <div class="input-group" id="datepicker2">
                                    <input type="text" value="{{ $invoice->request_delivery_date }}" name="request_delivery_date" class="form-control" placeholder="dd M, yyyy"
                                           data-date-format="dd M, yyyy" data-date-container='#datepicker2'
                                           data-provide="datepicker" data-date-autoclose="true">

                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>


                        <div class="card mt-3">
                            <div class="card-body" style="background-color: #1f7556 !important; border-radius: 15px;">
                                <div class="d-flex">

                                    <div class="ms-3">
                                        <button type="submit" class="btn btn-success">
                                            <i class="mdi mdi-cart-arrow-right me-1"></i> Checkout </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection


@section('script')


<script type="text/javascript">
    var i = 0;
    var j= 0;
    $("#main_add_new_product").click(function () {
        ++i;
        var total_pp_quantity = $('#total_product').val();
        $("#dynamicAddRemove").append('<tr><td style="width:400px"><select class="select form-control main_product_id select2" name="nmain_product_id[]" id="main_product_id'+i+'" data-placeholder="Choose ..."><option value="0">Please Select</option> @foreach($product_names as $main_product_list_all_print)<option value="{{ $main_product_list_all_print->id }}">{{ $main_product_list_all_print->name }}</option>@endforeach</select></td><td><input type="number" class="form-control p_quantity" min="1" name="p_quantity[]" value="0" id="p_quantity'+i+'" placeholder="Quantity"></td><td><button type="button" class="btn btn-sm btn-outline-danger remove-input-field"><i class="mdi mdi-delete-forever font-size-22"></i></button></td></tr>');
            $('.select2').select2();


            if(total_pp_quantity.trim().length == 0){
                total_pp_quantity = 2;
            }else{
                total_pp_quantity = parseInt(total_pp_quantity) + parseInt(1);
            }

            $('#total_product').val(total_pp_quantity);
    });
    // $(document).on('click', '.remove-input-field', function () {
    //     $(this).parents('tr').remove();
    // });
</script>

<script type="text/javascript">

$(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();

        var total_product_quantity = $('#total_product').val();
        var p_result = total_product_quantity -1;

        $('#total_product').val(p_result);


        var final_total_net_discountprice = 0;

        var total_net_price = $('input[name="p_quantity[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();


for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_discountprice += total_net_price[i] << 0;
}

$('#total_quantity').val(final_total_net_discountprice);
});
</script>

<script type="text/javascript">

    $(document).ready(function () {

    ///main product
    $(document).on('change', 'select.main_product_id', function () {

    var total_product_quantity = $('#total_product').val();

       if(total_product_quantity.trim().length == 0){

        $('#total_product').val(1);

       }else{


       }





    });

    //quantity


    });

    </script>
    <script type="text/javascript">
        $(document).on('change', 'input[name="p_quantity[]"]', function () {

            var final_total_net_discountprice = 0;

            var total_net_price = $('input[name="p_quantity[]"]').map(function (idx, ele) {
       return $(ele).val();
    }).get();


    for (var i = 0; i < total_net_price.length; i++) {
        final_total_net_discountprice += total_net_price[i] << 0;
    }

    $('#total_quantity').val(final_total_net_discountprice);

        });
        </script>


@endsection
