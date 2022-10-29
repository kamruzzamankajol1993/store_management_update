@extends('backend.master.master')

@section('title')
Add Product |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Add Product</h4>

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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('flash_message')
                                    <form class="custom-validation" action="{{ route('admin.product_information.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf

                                    <div class="row">

                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="email">Product Image</label>
                                            <input type="file" class="form-control form-control-sm" id="email" name="image"  >
                                        </div>


                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="email">Product Name</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="name"  >
                                        </div>


                                        <div class="form-group col-md-6 col-sm-12 mt-2">
                                            <label for="email">Category Name</label>
                                            <select class="form-control form-control-sm" id="category" name="category">
<option>--Please Select--</option>
                                                @foreach($cat_list as $all_cat_list)
<option value="{{ $all_cat_list->name }}">{{ $all_cat_list->name }}</option>

                                                @endforeach

                                            </select>
                                        </div>


                                        <div class="form-group col-md-6 col-sm-12 mt-2">
                                            <label for="email">Sub Category</label>
                                            <select class="form-control form-control-sm" id="subcategory" name="subcategory">
                                                <option>--Please Select--</option>



                                                                                            </select>
                                        </div>

                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Brand</label>
                                            <select class="form-control form-control-sm" id="brand" name="brand">
                                                <option>--Please Select--</option>
                                                                                                @foreach($brand_list as $all_cat_list)
                                                <option value="{{ $all_cat_list->name }}">{{ $all_cat_list->name }}</option>

                                                                                                @endforeach

                                                                                            </select>
                                        </div>

                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Unit Measure</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="unit_measure" >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Unit</label>
                                            <select class="form-control form-control-sm" id="unit" name="unit">
                                                <option>--Please Select--</option>
                                                                                                @foreach($unit_list as $all_cat_list)
                                                <option value="{{ $all_cat_list->name }}">{{ $all_cat_list->name }}</option>

                                                                                                @endforeach

                                                                                            </select>
                                        </div>

                                    </div>
<hr class="mt-3">
                                    <!--personal info -->


                                    <!--other information -->




                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="name">Quantity</label>
                            <input type="text" class="form-control form-control-sm" id="name" name="quantity" />



                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="email">Alert Quantity</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="alert_quantity"  >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="email">Buying Price</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="buying_price"  >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="email">Selling Price</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="selling_price"  >
                                        </div>

                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="email">Whole Sell Price</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="whole_sale_price"  >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Warehouse</label>
                                            <select class="form-control form-control-sm" id="unit" name="ware_house">
                                                <option>--Please Select--</option>
                                                                                                @foreach($warehouse_list as $all_cat_list)
                                                <option value="{{ $all_cat_list->name }}">{{ $all_cat_list->name }}</option>

                                                                                                @endforeach

                                                                                            </select>
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Tax</label>
                                            <select class="form-control form-control-sm" id="unit" name="tax">
                                                <option>--Please Select--</option>
                                                <option value="0" selected>No Tax</option>
                                                                                                @foreach($tax_list as $all_cat_list)
                                                <option value="{{ $all_cat_list->tax_rate }}">{{ $all_cat_list->tax_name }}</option>

                                                                                                @endforeach

                                                                                            </select>
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Vendor</label>
                                            <select class="form-control form-control-sm" id="unit" name="vendor">
                                                <option>--Please Select--</option>
                                                                                                @foreach($vendor_list as $all_cat_list)
                                                <option value="{{ $all_cat_list->customer_display_name }}">{{ $all_cat_list->customer_display_name }}</option>

                                                                                                @endforeach

                                                                                            </select>
                                        </div>

                                        <div class="form-group col-md-12 col-sm-12 mt-2">
                                            <label for="email">Sku</label>
                                            <input type="text" class="form-control form-control-sm" id="email" value="<?php echo substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,10);?>" name="sku" >
                                        </div>

                                        <div class="form-group col-md-12 col-sm-12 mt-2">
                                            <label for="email">Description</label>
                                            <textarea class="form-control form-control-sm" id="name" name="des">


                                                                            </textarea>
                                        </div>

                                    </div>

                                    <!--other information -->




                                    <!--shipping information -->





                                  </div>

                              </div>
                          </div>



                          <div class="col-lg-12">

                                  <div class="form-group mb-4">
                                      <div>
                                          <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                                             Submit
                                          </button>
                                      </div>

                              </div>
                          </div>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </form>





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







