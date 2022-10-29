@extends('backend.master.master')

@section('title')
Company Information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Company Information</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li> --}}
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
                        <div class="col-sm-6">
                            <div class="float-right d-md-block">
                                <div class="dropdown">
                                @if (Auth::guard('admin')->user()->can('system_information_add'))
{{-- <button class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light" type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">
                                        <i class="far fa-calendar-plus  mr-2"></i> Add System Information
                                    </button> --}}
@endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('flash_message')

                                    <form method="post" action="{{ route('admin.system_information.update') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" class="form-control form-control-sm" value="{{ $user->id }}" name="id" placeholder="Enter Name">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label for="formrow-email-input" class="form-label">Company Name</label>
                                                    <input type="text" name="System_Name" value="{{ $user->System_Name }}" class="form-control" placeholder="Company Name">
                                                    <small></small>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label for="formFile" class="form-label">Company Logo</label>
                                                    <input name="logo" value="" class="form-control" type="file" id="formFile">
                                                    <small></small>
                                                    <img src="{{ asset('/') }}{{ $user->logo }}" style="height:20px;"/>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <label for="formFile" class="form-label">Company Icon</label>
                                                    <input name="icon" value="" class="form-control" type="file" id="formFile">
                                                    <small></small>
                                                    <img src="{{ asset('/') }}{{ $user->icon }}" style="height:20px;"/>
                                                </div>
                                            </div>



                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label for="formrow-inputZip" class="form-label">Phone Number</label>
                                                    <input name="Phone" value="{{ $user->Phone }}" type="text" class="form-control" id="formrow-inputZip" placeholder="Phone Number">
                                                    <small></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label for="formrow-inputZip" class="form-label">Email id</label>
                                                    <input name="Email" value="{{ $user->Email }}" type="email" class="form-control" id="formrow-inputZip" placeholder="Email id">
                                                    <small></small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label for="formrow-email-input" class="form-label">Address</label>
                                                    <input name="Address" value="{{ $user->Address }}" type="text" class="form-control" id="formrow-email-input" placeholder="Address Line 1">
                                                </div>
                                            </div>


                                        </div>






                                        <div>
                                            <button type="submit" class="btn btn-primary w-md">Save Changes</button>
                                        </div>


                                    </form>
{{-- <div class="table-responsive">
    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                            <th>SL</th>
                                            <th>Logo</th>
                                            <th>Icon</th>
                                    <th>Name </th>

                                    <th>Phone</th>
                                    <th>Email</th>
                                     <th>Address</th>


                                    <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($ins_details as $user)


                                <tr>
                                   <td>


                                    {{ $loop->index+1 }}




                                </td>
                                <td><img src="{{ asset('/') }}{{ $user->logo }}" style="height:30px;"/></td>
                                <td><img src="{{ asset('/') }}{{ $user->icon }}" style="height:30px;"/></td>
                                <td>



                                    {{ $user->System_Name }}


                                </td>

                                 <td>
                                    {{ $user->Phone }}

                                </td>
                                 <td>
                                   {{ $user->Email }}

                                </td>
                                   <td>




  {{ $user->Address }}



                                    </td>





                                    <td>
                                      @if (Auth::guard('admin')->user()->can('system_information_update'))

                    <button type="button"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $user->id }}"
                                          class="btn btn-primary waves-light waves-effect  btn-sm" >
                                          <i class="fas fa-pencil-alt"></i></button>


                                          <!-- Modal -->
                                          <div class="modal fade bs-example-modal-lg{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update System Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form class="custom-validation" action="{{ route('admin.system_information.update') }}" method="post" enctype="multipart/form-data">
                              @csrf
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
<div class="row">
<div class="form-group col-md-6 col-sm-12">
                                    <label for="password">System Name</label>
                        <input type="text" class="form-control form-control-sm"  name="System_Name" placeholder="Enter Name">


                                                            </div>


                                                            <div class="form-group col-md-6 col-sm-12">
                                                                <label for="name">Phone</label>
                                                                <input type="text" class="form-control form-control-sm" value="{{ $user->Phone }}" name="Phone" placeholder="Enter Phone">
                                                            </div>

                                                             <div class="form-group col-md-6 col-sm-12">
                                                                <label for="name">Email</label>
                                                                <input type="email" class="form-control form-control-sm" value="{{ $user->Email }}" name="Email" placeholder="Enter Email">
                                                            </div>

                                                            <div class="form-group col-md-6 col-sm-12">
                                                    <label for="password"> Address</label>
                     <input type="text" class="form-control form-control-sm" value="{{ $user->Address }}" name="Address" placeholder="Enter Address">
                                                            </div>
                                                        </div>
                                                <div class="row">







                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name"> Logo</label>
                                <input type="file" class="form-control form-control-sm" id="name" name="logo" placeholder="Enter Address">
                                <img src="{{ asset('/') }}{{ $user->logo }}" style="height:20px;"/>
                            </div>


                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Icon</label>
                                <input type="file" class="form-control form-control-sm" id="name" name="icon" placeholder="Enter Icon">
                                <img src="{{ asset('/') }}{{ $user->icon }}" style="height:20px;"/>
                            </div>





                        </div>






                                            </div>

                                        </div>
                                    </div>



                                    <div class="col-lg-12">
                                        <div class="float-right d-none d-md-block">
                                            <div class="form-group mb-4">
                                                <div>
                                                    <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                                                       Update
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </form>
      </div>

    </div>
  </div>
</div>


@endif






                                        </table>
</div> --}}
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->






<!--  Modal content for the above example -->

  <!--  Large modal example -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add System Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="custom-validation" action="{{ route('admin.system_information.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                       <div class="row">

                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">
<div class="row">
<div class="form-group col-md-6 col-sm-12">
                          <label for="password">System Name</label>
              <input type="text" class="form-control form-control-sm"  name="System_Name" placeholder="Enter Name">


                                                  </div>


                                                  <div class="form-group col-md-6 col-sm-12">
                                                    <label for="name">Phone</label>
                                                    <input type="text" class="form-control form-control-sm"  name="Phone" placeholder="Enter Phone">
                                                </div>

                                                 <div class="form-group col-md-6 col-sm-12">
                                                    <label for="name">Email</label>
                                                    <input type="email" class="form-control form-control-sm" name="Email" placeholder="Enter Email">
                                                </div>




                                                  <div class="form-group col-md-6 col-sm-12">
                                          <label for="password"> Address</label>
           <input type="text" class="form-control form-control-sm"  name="Address" placeholder="Enter Address">
                                                  </div>
                                              </div>
                                      <div class="row">







                  <div class="form-group col-md-6 col-sm-12">
                      <label for="name"> Logo</label>
                      <input type="file" class="form-control form-control-sm" id="name" name="logo" placeholder="Enter Address">

                  </div>


                  <div class="form-group col-md-6 col-sm-12">
                    <label for="name">Icon</label>
                    <input type="file" class="form-control form-control-sm" id="name" name="icon" placeholder="Enter Icon">

                </div>





              </div>






                                  </div>

                              </div>
                          </div>



                          <div class="col-lg-12">
                              <div class="float-right d-none d-md-block">
                                  <div class="form-group mb-4">
                                      <div>
                                          <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                                             Submit
                                          </button>
                                      </div>
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




@endsection







