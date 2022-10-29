@extends('backend.master.master')

@section('title')
Inventory  information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">New Inventory Generate</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item active">Inventory</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
</div> <!-- container-fluid -->

<!--Invoice Generate section start-->
<form method="POST" action="{{ route('admin.inventory_information.store') }}">
    @csrf
<div class="row">
    @include('flash_message')

    <div class="col-xl-6">
        <div class="card">

            <div class="card-body">

                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label"> Date</label>
                    <div class="col-md-9">
                        <div class="input-group" id="datepicker2">
                            <input type="text" name="request_date" class="form-control" placeholder="dd M, yyyy"
                                   data-date-format="dd M, yyyy" data-date-container='#datepicker2'
                                   data-provide="datepicker" data-date-autoclose="true">

                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                        </div>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Product</label>
                    <div class="col-md-9">
                        <select class=" form-control main_product_id " name="vendor_id" id="main_product_id0" >
                            <option value="0">Please Select</option>
                            @foreach($product_names as $main_product_list_all_print)
                            <option value="{{ $main_product_list_all_print->name }}">{{ $main_product_list_all_print->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Supplier</label>
                    <div class="col-md-9">
                        <select class=" form-control main_product_id " name="request_number" id="main_product_id0" >
                            <option value="0">Please Select</option>
                            @foreach($supplier_list as $main_product_list_all_print)
                            <option value="{{ $main_product_list_all_print->customer_display_name }}">{{ $main_product_list_all_print->customer_display_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Quantity</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="total_quantity" value="" id="">
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Alert Quantity</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="total_product" value="" id="">
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Rack Location</label>
                    <div class="col-md-9">
                        <select class=" form-control main_product_id " name="request_note" id="main_product_id0" >
                            <option value="0">Please Select</option>
                            @foreach($rack_list as $main_product_list_all_print)
                            <option value="{{ $main_product_list_all_print->name }}">{{ $main_product_list_all_print->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label"> Expire Date</label>
                    <div class="col-md-9">
                        <div class="input-group" id="datepicker2">
                            <input type="text" name="request_delivery_date" class="form-control" placeholder="dd M, yyyy"
                                   data-date-format="dd M, yyyy" data-date-container='#datepicker2'
                                   data-provide="datepicker" data-date-autoclose="true">

                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                        </div>
                    </div>
                </div>



                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Status</label>
                    <div class="col-md-9">
                        <select class=" form-control main_product_id" name="status" id="main_product_id0" >
                            <option value="0">Please Select</option>

                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>

                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>



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
