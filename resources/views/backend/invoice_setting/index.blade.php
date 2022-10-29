@extends('backend.master.master')

@section('title')
Invoice Setting |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Invoice Setting </h4>

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

                        </div>
</div>
                    </div>
                    <!-- end page title -->

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('flash_message')


@if(count($users) == 0)
                                    <form class="custom-validation" action="{{ route('admin.invoice_setting_information.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                          <div class="row">

                                              <div class="col-lg-12">
                                                  <div class="card">
                                                      <div class="card-body">

                                                        <div class="row">
                                                            <div class="form-group col-md-12 col-sm-12">
                                                                <label for="name">Invoice Number Prefix</label>
                                                                <input type="text" class="form-control form-control-sm" id="email" name="invice_number" placeholder="Enter Invoice Number Prefix" >


                                                            </div>
                                                            <div class="form-group col-md-12 col-sm-12">
                                                                <label for="email">Next Invoice Number</label>
                                                                <input type="text" class="form-control form-control-sm" id="email" name="next_invoice_number" placeholder="Enter Next Invoice Number" >
                                                            </div>

                                                            <div class="form-group col-md-12 col-sm-12">
                                                                <label for="email">Invoice Due After(days)</label>
                                                                <input type="text" class="form-control form-control-sm" id="email" name="invoice_due_after" placeholder="Enter Invoice Due After(days)" >
                                                            </div>


                                                        </div>



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
@else

@foreach($users as $user)

<form class="custom-validation" action="{{ route('admin.invoice_setting_information.update') }}" method="post" enctype="multipart/form-data">
    @csrf

    <input type="hidden" class="form-control form-control-sm" id="email" value="{{ $user->id }}" name="id" placeholder="Enter Prefix Format" >
      <div class="row">

          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">

                    <div class="row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="name">Invoice Number Prefix</label>
                            <input type="text" class="form-control form-control-sm" id="email" name="invice_number" value="{{ $user->invice_number }}" placeholder="Enter Invoice Number Prefix" >


                        </div>
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="email">Next Invoice Number</label>
                            <input type="text" class="form-control form-control-sm" id="email" name="next_invoice_number" value="{{ $user->next_invoice_number }}" placeholder="Enter Next Esimate Number" >
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label for="email">Invoice Due After(days)</label>
                            <input type="text" class="form-control form-control-sm" id="email" name="invoice_due_after" value="{{ $user->invoice_due_after }}" placeholder="Enter Invoice Due After(days)" >
                        </div>

                    </div>



                  </div>

              </div>
          </div>



          <div class="col-lg-12">

                  <div class="form-group mb-4">
                      <div>
                          <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                             Update
                          </button>
                      </div>

              </div>
          </div>
      </div> <!-- end col -->
  </form>
@endforeach

@endif


                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->







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







