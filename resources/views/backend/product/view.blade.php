@extends('backend.master.master')

@section('title')
 Product Info|{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0"> Product Info</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active"> </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
                        <div class="col-sm-6">
                            <div class="float-right d-md-block">

                            </div>
                        </div>
</div>
                    </div>
                    <!-- end page title -->

                    <div class="row mt-3">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">


                               <ul>
                                <li>Name:{{ $product_list->name }}</li>
                                <li>Category:{{ $product_list->category }}</li>
                                <li>Sub Category:{{ $product_list->subcategory }}</li>
                                <li>Brand:{{ $product_list->brand }}</li>
                                <li>Unit Measure:{{ $product_list->unit_measure }}</li>
                                <li>Unit:{{ $product_list->unit }}</li>
                                <li>Quantity:{{ $product_list->quantity }}</li>
                                <li>Alert Quantity:{{ $product_list->alert_quantity }}</li>
                                <li>Warehouse:{{ $product_list->ware_house }}</li>
                                <li>Buying Price:{{ $product_list->buying_price }}</li>
                                <li>Selling Price:{{ $product_list->selling_price }}</li>
                                <li>Whole Sale  Price:{{ $product_list->whole_sale_price }}</li>
                                <li>Tax:{{ $product_list->tax }}</li>
                                <li>Sku:{{ $product_list->sku }}</li>
                                <li>Vendor:{{ $product_list->vendor }}</li>
                                <li>Description:{{ $product_list->des }}</li>
                               </ul>



                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">


                                    <img src="{{ asset('/') }}{{ $product_list->image }}" style="height: 30px" />



                                </div>
                            </div>
                        </div>
                        </div>



@endsection

@section('script')

<script type="text/javascript">
    $("select[name='category']").change(function(){
        var id_country12 = $(this).val();

        $.ajax({
            url: "{{ route('get_subcat_from_cat') }}",
            method: 'GET',
            data: {id_country12:id_country12},
            success: function(data) {
              $("select[name='subcategory'").html('');
              $("select[name='subcategory'").html(data);
            }
        });
    });
  </script>




     <script>
         /**
         * Check all the permissions
         */
         $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });
         function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
         }
     </script>

      <script type="text/javascript">
        function deleteTag(id) {
            swal({
                title: 'Are you sure?',
                text: "You will not be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endsection







