@extends('backend.master.master')

@section('title')
Vendor List |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Vendor  List</h4>

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
                                <div class="dropdown">
                                @if (Auth::guard('admin')->user()->can('vendor_add'))
<button class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light" type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">
                                        <i class="far fa-calendar-plus  mr-2"></i> Add New Vendor
                                    </button>
@endif
                                </div>
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
<div class="table-responsive">
    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                               <th>SL</th>


                                    <th>Primary Contact</th>
                                    <th>Display name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($users as $user)


                                <tr>
                                   <td>


                                    {{ $loop->index+1 }}




                                </td>


                                    <td>{{ $user->primary_contact }}</td>
                                    <td>{{ $user->customer_display_name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>



                                    <td>
                                        @if (Auth::guard('admin')->user()->can('vendor_view'))


                                        <a   href="{{ route('admin.vendor_information.view',$user->id) }}" class="btn btn-success waves-light waves-effect  btn-sm"><i class="fas fa-eye"></i></a>

                                        @endif
                                      @if (Auth::guard('admin')->user()->can('vendor_update'))
                                          <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $user->id }}"
                                          class="btn btn-primary waves-light waves-effect  btn-sm" >
                                          <i class="fas fa-pencil-alt"></i></button>

                                            <!--  Large modal example -->
                                            <div class="modal fade bs-example-modal-lg{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myLargeModalLabel">Update Vendor</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('admin.vendor_information.update') }}" method="POST" enctype="multipart/form-data">

                                                                @csrf


                                                        <input type="hidden" class="form-control form-control-sm" id="name" name="id" placeholder="Enter Name" value="{{ $user->id }}">
                              <!--personal info -->
                              <label for="name">Personal Information</label>


                              <div class="row">

                                  <div class="form-group col-md-4 col-sm-12">
                                      <label for="email">Primary Contact</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="primary_contact" value="{{ $user->primary_contact }}"  >
                                  </div>


                                  <div class="form-group col-md-4 col-sm-12">
                                      <label for="email">Company Name</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="company_name" value="{{ $user->company_name }}"  >
                                  </div>


                                  <div class="form-group col-md-4 col-sm-12">
                                      <label for="email">Customer Display Name</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="customer_display_name" value="{{ $user->customer_display_name }}" >
                                  </div>


                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">Phone</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="phone" value="{{ $user->phone }}" >
                                  </div>

                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">Email</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="email" value="{{ $user->email }}" >
                                  </div>

                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">Website</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="website" value="{{ $user->website }}" >
                                  </div>

                              </div>
<hr class="mt-3">
                              <!--personal info -->


                              <!--other information -->

                              <label for="name">Other Information</label>


                              <div class="row">
                                  <div class="form-group col-md-3 col-sm-12">
                                      <label for="name">GST Treatment</label>
                      <select class="form-control form-control-sm" id="name" name="gst_treatment">
<option value="0">Select a GST Treatment</option>
<option value="Individual" {{ $user->gst_treatment == "Individual" ? 'selected': ''  }}>Individual</option>
                      </select>


                                  </div>
                                  <div class="form-group col-md-3 col-sm-12">
                                      <label for="email">Pan</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="pan" value="{{ $user->pan }}"  >
                                  </div>


                                  <div class="form-group col-md-3 col-sm-12">
                                      <label for="email">Place Of Supply</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="company_name"  value="{{ $user->company_name }}" >
                                  </div>


                                  <div class="form-group col-md-3 col-sm-12">
                                      <label for="email">Tax Preference</label>
                                      <select class="form-control form-control-sm" id="name" name="tax_preference">
                                          <option value="Taxable" {{ $user->gst_treatment == "Taxable" ? 'selected': ''  }}>Taxable</option>
                                          <option value="Tax Exempt" {{ $user->gst_treatment == "Tax Exempt" ? 'selected': ''  }}>Tax Exempt</option>
                                                                      </select>
                                  </div>


                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">Currency</label>
                                      <select class="form-control form-control-sm" id="name" name="currency" value="{{ $user->currency }}">
                                          <option value="INR" {{ $user->currency == "INR" ? 'selected': ''  }}>INR</option>

                                                                      </select>
                                  </div>

                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">Opening Balance</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="opening_balance" value="{{ $user->opening_balance }}" >
                                  </div>

                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">Payment Term</label>
                                      <select class="form-control form-control-sm" id="name" name="payment_term">
                                          <option value="Payment Due On Receipt">Payment Due On Receipt</option>

                                                                      </select>
                                  </div>

                              </div>
                              <hr class="mt-3">
                              <!--other information -->

                              <!--billing information -->

                              <label for="name">Billing Address</label>


                              <div class="row">




                                  <div class="form-group col-md-4 col-sm-12">
                                      <label for="email">Attention</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="billing_attention"  value="{{ $user->billing_attention }}" >
                                  </div>


                                  <div class="form-group col-md-4 col-sm-12">
                                      <label for="email">Country/Region</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="billing_country_region" value="{{ $user->billing_country_region }}" >
                                  </div>


                                  <div class="form-group col-md-4 col-sm-12">
                                      <label for="email">Address One</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="billing_address_one" value="{{ $user->billing_address_one }}">
                                  </div>


                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">Address two</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="billing_address_two" value="{{ $user->billing_address_two }}" >
                                  </div>

                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">City</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="billing_city" value="{{ $user->billing_city }}" >
                                  </div>

                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">State</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="billing_state" value="{{ $user->billing_state }}">
                                  </div>


                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">Zip Code</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="billing_zip_code" value="{{ $user->billing_zip_code }}">
                                  </div>


                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">Phone</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="billing_phone" value="{{ $user->billing_phone }}">
                                  </div>



                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">Fax</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="billing_fax" value="{{ $user->billing_fax }}">
                                  </div>

                              </div>

                              <hr class="mt-3">

                              <!--billing information -->


                              <!--shipping information -->

                              <label for="name">Shipping Address</label>


                              <div class="row">




                                  <div class="form-group col-md-4 col-sm-12">
                                      <label for="email">Attention</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="shipping_attention" value="{{ $user->shipping_attention }}" >
                                  </div>


                                  <div class="form-group col-md-4 col-sm-12">
                                      <label for="email">Country/Region</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="shipping_country_region" value="{{ $user->shipping_country_region }}" >
                                  </div>


                                  <div class="form-group col-md-4 col-sm-12">
                                      <label for="email">Address One</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="shipping_address_one" value="{{ $user->shipping_address_one }}">
                                  </div>


                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">Address two</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="shipping_address_two" value="{{ $user->shipping_address_two }}">
                                  </div>

                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">City</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="shipping_city" value="{{ $user->shipping_city }}" >
                                  </div>

                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">State</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="shipping_state" value="{{ $user->shipping_state }}">
                                  </div>


                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">Zip Code</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="shipping_zip_code" value="{{ $user->shipping_zip_code }}">
                                  </div>


                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">Phone</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="shipping_phone" value="{{ $user->shipping_phone }}">
                                  </div>



                                  <div class="form-group col-md-4 col-sm-12 mt-2">
                                      <label for="email">Fax</label>
                                      <input type="text" class="form-control form-control-sm" id="email" name="shipping_fax" value="{{ $user->shipping_fax }}">
                                  </div>

                              </div>


                              <!--shipping information -->





                                                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->


@endif

{{-- <button type="button" class="btn btn-primary waves-light waves-effect  btn-sm" onclick="window.location.href='{{ route('admin.users.view',$user->id) }}'"><i class="fa fa-eye"></i></button> --}}

                                  @if (Auth::guard('admin')->user()->can('vendor_delete'))

<button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $user->id}})" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.vendor_information.delete',$user->id) }}" method="POST" style="display: none;">

                                                    @csrf

                                                </form>
                                                @endif
                                    </td>
                                </tr>
@endforeach


                                        </tbody>
                                    </table>
</div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->




  <!--  Large modal example -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add New Vendor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="custom-validation" action="{{ route('admin.vendor_information.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="row">

                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">


                                    <!--personal info -->
                                    <label for="name">Personal Information</label>


                                    <div class="row">

                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="email">Primary Contact</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="primary_contact"  >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="email">Company Name</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="company_name"  >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="email">Customer Display Name</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="customer_display_name" >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Phone</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="phone" >
                                        </div>

                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="email" >
                                        </div>

                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Website</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="website" >
                                        </div>

                                    </div>
<hr class="mt-3">
                                    <!--personal info -->


                                    <!--other information -->

                                    <label for="name">Other Information</label>


                                    <div class="row">
                                        <div class="form-group col-md-3 col-sm-12">
                                            <label for="name">GST Treatment</label>
                            <select class="form-control form-control-sm" id="name" name="gst_treatment">
<option value="0">Select a GST Treatment</option>
<option value="Individual">Individual</option>
                            </select>


                                        </div>
                                        <div class="form-group col-md-3 col-sm-12">
                                            <label for="email">Pan</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="pan"  >
                                        </div>


                                        <div class="form-group col-md-3 col-sm-12">
                                            <label for="email">Place Of Supply</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="company_name"  >
                                        </div>


                                        <div class="form-group col-md-3 col-sm-12">
                                            <label for="email">Tax Preference</label>
                                            <select class="form-control form-control-sm" id="name" name="tax_preference">
                                                <option value="Taxable">Taxable</option>
                                                <option value="Tax Exempt">Tax Exempt</option>
                                                                            </select>
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Currency</label>
                                            <select class="form-control form-control-sm" id="name" name="currency">
                                                <option value="INR">INR</option>

                                                                            </select>
                                        </div>

                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Opening Balance</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="opening_balance" >
                                        </div>

                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Payment Term</label>
                                            <select class="form-control form-control-sm" id="name" name="payment_term">
                                                <option value="Payment Due On Receipt">Payment Due On Receipt</option>

                                                                            </select>
                                        </div>

                                    </div>
                                    <hr class="mt-3">
                                    <!--other information -->

                                    <!--billing information -->

                                    <label for="name">Billing Address</label>


                                    <div class="row">




                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="email">Attention</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="billing_attention"  >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="email">Country/Region</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="billing_country_region"  >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="email">Address One</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="billing_address_one" >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Address two</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="billing_address_two" >
                                        </div>

                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">City</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="billing_city" >
                                        </div>

                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">State</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="billing_state" >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Zip Code</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="billing_zip_code" >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Phone</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="billing_phone" >
                                        </div>



                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Fax</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="billing_fax" >
                                        </div>

                                    </div>

                                    <hr class="mt-3">

                                    <!--billing information -->


                                    <!--shipping information -->

                                    <label for="name">Shipping Address</label>


                                    <div class="row">




                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="email">Attention</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="shipping_attention"  >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="email">Country/Region</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="shipping_country_region"  >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="email">Address One</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="shipping_address_one" >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Address two</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="shipping_address_two" >
                                        </div>

                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">City</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="shipping_city" >
                                        </div>

                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">State</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="shipping_state" >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Zip Code</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="shipping_zip_code" >
                                        </div>


                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Phone</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="shipping_phone" >
                                        </div>



                                        <div class="form-group col-md-4 col-sm-12 mt-2">
                                            <label for="email">Fax</label>
                                            <input type="text" class="form-control form-control-sm" id="email" name="shipping_fax" >
                                        </div>

                                    </div>


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
                      </div> <!-- end col -->
                  </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection

@section('script')

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







