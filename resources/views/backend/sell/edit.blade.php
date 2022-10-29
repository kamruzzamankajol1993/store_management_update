@extends('backend.master.master')

@section('title')
Edit Invoice information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Invoice Generate</h4>

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
<form method="POST" action="{{ route('admin.sell_information.update') }}">
    @csrf
<div class="row">
    @include('flash_message')
    <div class="col-xl-6">
        <div class="card">
            <h5 class="card-header">Client Information</h5>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Select Client</label>
                            <select class="select2 form-control show_all_addresss" name="client_slug"
                                    data-placeholder="Choose ..." id="select_client_name_from_list">
                                <option value="0">Select Client</option>
                                @foreach($client_list_all as $all_client_print)
                                <option value="{{ $all_client_print->customer_display_name }}" {{ $invoice->client_slug == $all_client_print->customer_display_name ? 'selected':''}}>{{ $all_client_print->customer_display_name }}</option>
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
                        <input class="form-control" type="text" name="order_id" value="<?php echo substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,10);?>" id="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Payment Term</label>
                    <div class="col-md-9">
                        <select class="form-select" name="payment_term">
                            <option>Select</option>
                            <option value="Instant Payment" {{ $invoice->payment_term == 'Instant Payment' ? 'selected':''}}>Instant Payment</option>
                            <option value="After Delivery"  {{ $invoice->payment_term == 'After Delivery' ? 'selected':''}}>After Delivery</option>
                            <option value="Due end of Month" {{ $invoice->payment_term == 'Due end of Month' ? 'selected':''}}>Due end of Month</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Date</label>
                    <div class="col-md-9">
                        <div class="input-group" id="datepicker2">
                            <input type="text" name="pay_date" value="{{ $invoice->pay_date }}" class="form-control" placeholder="dd M, yyyy"
                                   data-date-format="dd M, yyyy" data-date-container='#datepicker2'
                                   data-provide="datepicker" data-date-autoclose="true">

                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Due Date</label>
                    <div class="col-md-9">
                        <div class="input-group" id="datepicker2">
                            <input type="text" name="due_date" value="{{ $invoice->due_date }}" class="form-control" placeholder="dd M, yyyy"
                                   data-date-format="dd M, yyyy" data-date-container='#datepicker2'
                                   data-provide="datepicker" data-date-autoclose="true">

                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Warehouse</label>
                    <div class="col-md-9">
                        <select class="form-select" name="ware_house">
                            <option>Select</option>
                            @foreach($warehouse_list as $all_warehouse_list)
                            <option  value="{{$all_warehouse_list->name}}" {{ $invoice->ware_house == $all_warehouse_list->name  ? 'selected':''}}>{{ $all_warehouse_list->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>


                {{-- <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Order BY</label>
                    <div class="col-md-9">
                        <select class="form-select" name="order_by">
                            <option>Select</option>
                            @foreach($order_by_list as $all_order_by_list)
                            <option value="{{ $all_order_by_list->company_name }}">{{ $all_order_by_list->company_name }}</option>
@endforeach
                        </select>
                    </div>
                </div> --}}


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
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>Tax(%)</th>
                            <th>After Tax.</th>
                            <th>Grand Total</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($invoice_detail as $key=>$all_invoice_detail)

                            @if(($key+1) == 1)

                            <tr>

                            <td style="width:200px">
                                <input type="hidden"  class="form-control" name="p_p_id[]" id="p_p_id{{ $key+5000 }}" value="{{ $all_invoice_detail->product_id }}" placeholder="pid">
                                <select class=" form-control main_product_id select2" name="main_product_id[]" id="main_product_id{{ $key+5000 }}" >
                                    <option value="0">Please Select</option>
                                    @foreach($main_product_list_all as $main_product_list_all_print)
                                    <option value="{{ $main_product_list_all_print->id }}">{{ $main_product_list_all_print->name }}</option>
                                    @endforeach
                                </select>
                            </td>

                            <td>
                                <input type="number" min="1" class="form-control p_quantity" name="p_quantity[]" id="p_quantity{{ $key+5000 }}" placeholder="Quantity">
                                <input type="hidden"  class="form-control" name="d_quantity[]" id="d_quantity{{ $key+5000 }}" value="{{ $all_invoice_detail->qty }}" placeholder="dQuantity">
                            </td>
                            <td><input type="text" class="form-control" name="unit_price[]" id="unit_price{{ $key+5000 }}" placeholder="Unit Price" readonly></td>
                            <td><input type="text" class="form-control" name="total_amount[]" id="total_amount{{ $key+5000 }}" placeholder="Total Amount" readonly></td>
                            <td><input type="number" min="0" class="form-control unit_tax" value="0" name="unit_tax[]" id="unit_tax{{ $key+5000 }}" placeholder="Unit Tax" readonly></td>
                            <td><input type="text" class="form-control" id="after_tax{{ $key+5000 }}" name="after_tax[]" placeholder="After Tax" readonly></td>
                            <td><input type="text" class="form-control" id="gafter_tax{{ $key+5000 }}" name="gafter_tax[]" placeholder="Grand Total" readonly></td>
                            <td>
                                {{-- <div class="d-flex gap-3">
                                    <a href="javascript:void(0);" class="text-danger"><i
                                                class="mdi mdi-delete-forever font-size-22"></i></a>
                                </div> --}}
                            </td>
                        </tr>

                        @else


                        <tr>

                            <td style="width:200px">
                                <input type="hidden"  class="form-control" name="p_p_id[]" id="p_p_id{{ $key+5000 }}" value="{{ $all_invoice_detail->product_id }}" placeholder="pid">
                                <select class=" form-control main_product_id select2" name="main_product_id[]" id="main_product_id{{ $key+5000 }}" >
                                    <option value="0">Please Select</option>
                                    @foreach($main_product_list_all as $main_product_list_all_print)
                                    <option value="{{ $main_product_list_all_print->id }}">{{ $main_product_list_all_print->name }}</option>
                                    @endforeach
                                </select>
                            </td>

                            <td>
                                <input type="number" min="1" class="form-control p_quantity" name="p_quantity[]" id="p_quantity{{ $key+5000 }}" placeholder="Quantity">
                                <input type="hidden"  class="form-control" name="d_quantity[]" id="d_quantity{{ $key+5000 }}" value="{{ $all_invoice_detail->qty }}" placeholder="dQuantity">
                            </td>
                            <td><input type="text" class="form-control" name="unit_price[]" id="unit_price{{ $key+5000 }}" placeholder="Unit Price" readonly></td>
                            <td><input type="text" class="form-control" name="total_amount[]" id="total_amount{{ $key+5000 }}" placeholder="Total Amount" readonly></td>
                            <td><input type="number" min="0" class="form-control unit_tax" value="0" name="unit_tax[]" id="unit_tax{{ $key+5000 }}" placeholder="Unit Tax" readonly></td>
                            <td><input type="text" class="form-control" id="after_tax{{ $key+5000 }}" name="after_tax[]" placeholder="After Tax" readonly></td>
                            <td><input type="text" class="form-control" id="gafter_tax{{ $key+5000 }}" name="gafter_tax[]" placeholder="Grand Total" readonly></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-danger remove-input-field"><i class="mdi mdi-delete-forever font-size-22"></i></button>
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
                    <div class="col-xl-8"></div>
                    <div class="col-xl-4">


                        <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Net Price</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="total_net_price_f" value="{{ $invoice->total_net_price }}" id="total_net_price_f" readonly>
                            </div>
                        </div>


                        <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Net Price With Tax</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="total_net_price_tax" value="{{ $invoice->total_vat_tax }}" id="total_net_price_tax" readonly>
                            </div>
                        </div>


                        <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Total Discount</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="total_dis" value="{{ $invoice->total_discount }}" id="total_dis">
                            </div>
                        </div>



                        <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Grand Total</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="total_grand_price_f" value="{{ $invoice->grand_total }}" id="total_grand_price_f" readonly>


                            </div>
                        </div>


                        <div class="mb-2 row" id="show_order_by_price">
                        </div>
                        <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Total Pay</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="total_payble_price" value="{{ $invoice->total_pay }}" id="total_payble_price">
                            </div>

                        </div>

                        <div class="card mt-3">
                            <div class="card-body" style="background-color: #1f7556 !important; border-radius: 15px;">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h5 class="font-size-10 mb-1 text-white">Total Due</h5>
                                        <p class=" text-white font-size-16  mb-1" id="total_final_due" >
                                            {{ $invoice->due }} Taka
                                        </p>
                                        <input type="hidden" value="{{ $invoice->due }}" name="total_final_due" id="total_final_due1"/>
                                    </div>
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
    $("#main_add_new_product").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td style="width:200px"><input type="hidden" value="0" id="p_p_id'+i+'" name="p_p_id[]"/><select class="select form-control main_product_id select2" name="main_product_id[]" id="main_product_id'+i+'" data-placeholder="Choose ..."><option value="0">Please Select</option> @foreach($main_product_list_all as $main_product_list_all_print)<option value="{{ $main_product_list_all_print->id }}">{{ $main_product_list_all_print->name }}</option>@endforeach</select></td><td><input type="number" class="form-control p_quantity" min="1" name="p_quantity[]" id="p_quantity'+i+'" placeholder="Quantity"><input type="hidden" class="form-control" value="0"  name="d_quantity[]" id="d_quantity'+i+'" placeholder="dQuantity"></td><td><input type="text" class="form-control" name="unit_price[]" id="unit_price'+i+'" placeholder="Unit Price" readonly></td><td><input type="text" class="form-control" name="total_amount[]" id="total_amount'+i+'" placeholder="Total Amount" readonly></td><td><input type="number" min="0" class="form-control unit_tax" value="0" name="unit_tax[]" id="unit_tax'+i+'" placeholder="Unit Tax" readonly></td><td><input type="text" class="form-control" id="after_tax'+i+'" name="after_tax[]" placeholder="After Tax" readonly></td><td><input type="text" class="form-control" id="gafter_tax'+i+'" name="gafter_tax[]" placeholder="Grand Total" readonly></td><td><button type="button" class="btn btn-sm btn-outline-danger remove-input-field"><i class="mdi mdi-delete-forever font-size-22"></i></button></td></tr>'
            );
            $('.select2').select2();
    });
    // $(document).on('click', '.remove-input-field', function () {
    //     $(this).parents('tr').remove();
    // });
</script>

<script type="text/javascript">

    $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();


            ////////****///////////////////

             //total net price start


       var final_total_net_price = 0;
    var total_net_price = $('input[name="total_amount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_price += total_net_price[i] << 0;
}

       $('#total_net_price_f').val('');
         $('#total_net_price_f').val(final_total_net_price);

      //end total net price


      //start total discount

      var final_total_net_discountprice = 0;
    var total_net_discountprice = $('input[name="gafter_tax[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_discountprice.length; i++) {
    final_total_net_discountprice += total_net_discountprice[i] << 0;
}

$('#total_net_price_tax').val('');
         $('#total_net_price_tax').val(final_total_net_discountprice);

      //end total discount


      var total_dis =$('#total_dis').val();
    var total_payble_price = $('#total_payble_price').val();

    var ff_dis_result = final_total_net_discountprice - total_dis;


    $('#total_grand_price_f').val(ff_dis_result);

    $('#total_final_due1').val(ff_dis_result - total_payble_price);
    $('#total_final_due').html(ff_dis_result - total_payble_price);
        });
    </script>




<script type="text/javascript">
     $(document).on('change', 'select.main_product_id', function () {

//main product id
var main_id = $(this).attr('id');
var get_id_from_main = main_id.slice(15);
var main_product_id = $('#main_product_id'+get_id_from_main).val();

   //alert(get_id_from_main);

   //product price
$.ajax({
    url: "{{ route('sell_information_price') }}",
    method: 'GET',
    data: {main_product_id:main_product_id},
    success: function(data) {
     // $("#unit_price"+get_id_from_main).val('');
     $("#unit_price"+get_id_from_main).val('');
      $("#unit_price"+get_id_from_main).val(data);

      var p_quantity = $('#p_quantity'+get_id_from_main).val();
        var unit_price = data;
        var after_tax= $('#after_tax'+get_id_from_main).val();

       // alert(get_id_from_main);

        var total_amount = unit_price * p_quantity;

        var total_after_tax = after_tax * p_quantity;


       $('#total_amount'+get_id_from_main).val(total_amount);
       $('#gafter_tax'+get_id_from_main).val(total_after_tax);

         //multiple net price from quantity
         var final_total_net_price = 0;
    var total_net_price = $('input[name="total_amount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_price += total_net_price[i] << 0;
}


$('#total_net_price_f').val(final_total_net_price);
    //end multiple net price from quantity


     //multiple net price from quantity
     var final_total_net_price1 = 0;
    var total_net_price1 = $('input[name="gafter_tax[]"]').map(function (idx, ele) {
   return parseFloat($(ele).val());
}).get();

for (var i = 0; i < total_net_price1.length; i++) {
    final_total_net_price1 += total_net_price1[i] << 0;
}


$('#total_net_price_tax').val(final_total_net_price1);
    //end multiple net price from quantity


    //catch discount

    var total_dis =$('#total_dis').val();
    var total_payble_price = $('#total_payble_price').val();

    var ff_dis_result = final_total_net_price1 - total_dis;


    $('#total_grand_price_f').val(ff_dis_result);

    $('#total_final_due1').val(ff_dis_result - total_payble_price);
    $('#total_final_due').html(ff_dis_result - total_payble_price);


     //end discount
    }
    });
    //end product price


    //product tax
$.ajax({
    url: "{{ route('sell_information_tax') }}",
    method: 'GET',
    data: {main_product_id:main_product_id},
    success: function(data) {
     // $("#unit_price"+get_id_from_main).val('');
     $("#unit_tax"+get_id_from_main).val('');
      $("#unit_tax"+get_id_from_main).val(data);

      var p_quantity = $('#p_quantity'+get_id_from_main).val();
        var unit_price = $('#unit_price'+get_id_from_main).val();
        var after_tax= $('#after_tax'+get_id_from_main).val();

       // alert(get_id_from_main);

        var total_amount = unit_price * p_quantity;

        var total_after_tax = after_tax * p_quantity;


       $('#total_amount'+get_id_from_main).val(total_amount);
       $('#gafter_tax'+get_id_from_main).val(total_after_tax);

         //multiple net price from quantity
         var final_total_net_price = 0;
    var total_net_price = $('input[name="total_amount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_price += total_net_price[i] << 0;
}


$('#total_net_price_f').val(final_total_net_price);
    //end multiple net price from quantity


     //multiple net price from quantity
     var final_total_net_price1 = 0;
    var total_net_price1 = $('input[name="gafter_tax[]"]').map(function (idx, ele) {
   return parseFloat($(ele).val());
}).get();

for (var i = 0; i < total_net_price1.length; i++) {
    final_total_net_price1 += total_net_price1[i] << 0;
}


$('#total_net_price_tax').val(final_total_net_price1);
    //end multiple net price from quantity


    //catch discount

    var total_dis =$('#total_dis').val();
    var total_payble_price = $('#total_payble_price').val();

    var ff_dis_result = final_total_net_price1 - total_dis;


    $('#total_grand_price_f').val(ff_dis_result);

    $('#total_final_due1').val(ff_dis_result - total_payble_price);
    $('#total_final_due').html(ff_dis_result - total_payble_price);


     //end discount
    }
    });
    //end product tax


    //product after tax price
$.ajax({
    url: "{{ route('sell_information_after_tax_price') }}",
    method: 'GET',
    data: {main_product_id:main_product_id},
    success: function(data) {
     // $("#unit_price"+get_id_from_main).val('');
     $("#after_tax"+get_id_from_main).val('');
      $("#after_tax"+get_id_from_main).val(data);

      var p_quantity = $('#p_quantity'+get_id_from_main).val();
        var unit_price = $('#unit_price'+get_id_from_main).val();
        var after_tax= data;

       // alert(get_id_from_main);

        var total_amount = unit_price * p_quantity;

        var total_after_tax = after_tax * p_quantity;


       $('#total_amount'+get_id_from_main).val(total_amount);
       $('#gafter_tax'+get_id_from_main).val(total_after_tax);

         //multiple net price from quantity
         var final_total_net_price = 0;
    var total_net_price = $('input[name="total_amount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_price += total_net_price[i] << 0;
}


$('#total_net_price_f').val(final_total_net_price);
    //end multiple net price from quantity


     //multiple net price from quantity
     var final_total_net_price1 = 0;
    var total_net_price1 = $('input[name="gafter_tax[]"]').map(function (idx, ele) {
   return parseFloat($(ele).val());
}).get();

for (var i = 0; i < total_net_price1.length; i++) {
    final_total_net_price1 += total_net_price1[i] << 0;
}


$('#total_net_price_tax').val(final_total_net_price1);
    //end multiple net price from quantity


    //catch discount

    var total_dis =$('#total_dis').val();
    var total_payble_price = $('#total_payble_price').val();

    var ff_dis_result = final_total_net_price1 - total_dis;


    $('#total_grand_price_f').val(ff_dis_result);

    $('#total_final_due1').val(ff_dis_result - total_payble_price);
    $('#total_final_due').html(ff_dis_result - total_payble_price);


     //end discount
    }
    });
    //end product after tax price


});
</script>


<script type="text/javascript">
    $(document).on('change', 'input.p_quantity', function () {

        var main_id = $(this).attr('id');
        var get_id_from_main = main_id.slice(10);

        var p_quantity = $('#p_quantity'+get_id_from_main).val();
        var unit_price = $('#unit_price'+get_id_from_main).val();
        var after_tax= $('#after_tax'+get_id_from_main).val();

       // alert(get_id_from_main);

        var total_amount = unit_price * p_quantity;

        var total_after_tax = after_tax * p_quantity;


       $('#total_amount'+get_id_from_main).val(total_amount);
       $('#gafter_tax'+get_id_from_main).val(total_after_tax);

         //multiple net price from quantity
         var final_total_net_price = 0;
    var total_net_price = $('input[name="total_amount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_price += total_net_price[i] << 0;
}


$('#total_net_price_f').val(final_total_net_price);
    //end multiple net price from quantity


     //multiple net price from quantity
     var final_total_net_price1 = 0;
    var total_net_price1 = $('input[name="gafter_tax[]"]').map(function (idx, ele) {
   return parseFloat($(ele).val());
}).get();

for (var i = 0; i < total_net_price1.length; i++) {
    final_total_net_price1 += total_net_price1[i] << 0;
}


$('#total_net_price_tax').val(final_total_net_price1);
    //end multiple net price from quantity


    //catch discount

    var total_dis =$('#total_dis').val();
    var total_payble_price = $('#total_payble_price').val();

    var ff_dis_result = final_total_net_price1 - total_dis;


    $('#total_grand_price_f').val(ff_dis_result);

    $('#total_final_due1').val(ff_dis_result - total_payble_price);
    $('#total_final_due').html(ff_dis_result - total_payble_price);


     //end discount




    });


    $("#total_dis").change(function(){


        //catch discount

    var total_dis =$(this).val();


    var total_grand_price_f = $('#total_grand_price_f').val();

    //alert(total_grand_price_f);
     var total_payble_price = $('#total_payble_price').val();

     var ff_dis_result = total_grand_price_f - total_dis;


    $('#total_grand_price_f').val(ff_dis_result);

    $('#total_final_due1').val(ff_dis_result - total_payble_price);
    $('#total_final_due').html(ff_dis_result - total_payble_price);


     //end discount

    });

    $("#total_payble_price").change(function(){

        var total_grand_price_f = $('#total_grand_price_f').val();
        var total_payble_price = $(this).val();


        $('#total_final_due1').val(total_grand_price_f - total_payble_price);
    $('#total_final_due').html(total_grand_price_f - total_payble_price);

    });
</script>


@endsection
