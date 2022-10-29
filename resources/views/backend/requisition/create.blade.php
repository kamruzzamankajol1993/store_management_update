@extends('backend.master.master')

@section('title')
Requisition information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">New Requisition Generate</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item active">Requisition</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
</div> <!-- container-fluid -->

<!--Invoice Generate section start-->
<form method="POST" action="{{ route('admin.requisition_information.store') }}">
    @csrf
<div class="row">
    @include('flash_message')

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">

                <p class="card-title-desc">Please Fill Up The Form Carefully</p>

                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Enter
                        Date</label>
                    <div class="col-sm-8">
                        <div class="input-group" id="datepicker2">
                            <input type="text" name="request_date" class="form-control" placeholder="dd M, yyyy"
                                   data-date-format="dd M, yyyy" data-date-container='#datepicker2'
                                   data-provide="datepicker" data-date-autoclose="true">

                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                        </div>
                    </div>
                </div>

                @if(Auth::guard('admin')->user()->id == 1)

                <div class="form-group row mt-2">
                    <label for="" class="col-sm-4 col-form-label">Staff Name</label>
                    <div class="col-sm-8">
                        <select class="form-control" type="text" name="admin_id" id="">
                            <option>--Please Select --</option>
                        @foreach($users as $all_user)

                        <option value="{{ $all_user->id }}">{{ $all_user->name }}({{ $all_user->position }})</option>
                        @endforeach
                    </select>
                    </div>
                </div>

                @else

                @endif



                <div class="form-group row mt-2">
                    <label for="" class="col-sm-4 col-form-label">Request Type</label>
                    <div class="col-sm-8">
                        <select name="request_type" id="" class="form-control">
                            <option value="Normal">Normal</option>
                            <option value="Emergency">Emergency</option>
                        </select>
                    </div>
                </div>

                <p class="card-title-desc mt-3">Enter The Requested Product</p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
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
                                        <tr>

                                            <td style="width:400px">
                                                <select class=" form-control main_product_id select2" name="nmain_product_id[]" id="main_product_id0" >
                                                    <option value="0">Please Select</option>
                                                    @foreach($product_names as $main_product_list_all_print)
                                                    <option value="{{ $main_product_list_all_print->id }}">{{ $main_product_list_all_print->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td><input type="number" min="1" class="form-control p_quantity" value="0" name="p_quantity[]" id="p_quantity0" placeholder="Quantity"></td>

                                            <td>
                                                {{-- <div class="d-flex gap-3">
                                                    <a href="javascript:void(0);" class="text-danger"><i
                                                                class="mdi mdi-delete-forever font-size-22"></i></a>
                                                </div> --}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <button id="main_add_new_product" type="button" class="btn btn-light waves-effect btn-label waves-light"><i
                                                class="bx bx-plus-medical label-icon "></i> Add New Product
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="float-right d-none d-md-block">
                            <div class="form-group mb-4">
                                <div>
                                    <button type="submit"
                                        class="btn btn-primary btn-lg  waves-effect waves-light mr-1">
                                        Submit
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div> <!-- end col -->

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
