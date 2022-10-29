@extends('backend.master.master')

@section('title')
Dashboard
@endsection


@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li> --}}
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    {{-- <div class="col-xl-4">
        <div class="card bg-primary bg-soft">
            <div>
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary">Welcome Back !</h5>



                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{ asset('/') }}public/new_admin/assets/images/profile-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="col-xl-12">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-copy-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">TOTAL STAFF</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>{{ $count_admin }}<i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>
                            {{-- <div class="d-flex">
                                <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span class="ms-2 text-truncate">From previous period</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-copy-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">TOTAL PRODUCT REQUISITION</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>{{ $total_re_product }}<i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>
                            {{-- <div class="d-flex">
                                <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span class="ms-2 text-truncate">From previous period</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-archive-in"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">DUE REQUISITION</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>{{ $total_re_due_product }}<i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>
                            {{-- <div class="d-flex">
                                <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span class="ms-2 text-truncate">From previous period</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-purchase-tag-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">TOTAL PRODUCT</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>{{ $total_product }} <i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>

                            {{-- <div class="d-flex">
                                <span class="badge badge-soft-warning font-size-12"> 0% </span> <span class="ms-2 text-truncate">From previous period</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                Due Requisition
            </div>
            <div class="card-body">


                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>SL.</th>
                                                                <th>Staff Name(Position)</th>
                                                                <th>Product Name & Quantity</th>
                                                                <th>Request Type</th>
                                                                <th>Date</th>
                                                                <th>Request Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                            @foreach ($requisition_list as $user)


                                                <tr>
                                                   <td>


                                                    {{ $loop->index+1 }}




                                                </td>


                                                    <td>

                                                    <?php

                                                 $use_list_new = DB::table('admins')->where('id',$user->admin_id)->first();

                                                    ?>



                                                        {{ $use_list_new->name }}({{ $use_list_new->position }})


                                                    </td>


                                                    <td>

                                                        <?php

                                                     $product_name_quantity = DB::table('rproducts')->where('r_id',$user->id)->get();

                                                        ?>
                @foreach($product_name_quantity as $all_product_name_quantity)
                <?php



                $product_name = DB::table('products')
                ->where('id', $all_product_name_quantity->product_id )->value('name');


                                        ?>

                {{ $product_name }}-{{ $all_product_name_quantity->quantity }} <br>
                @endforeach




                                                        </td>
                                                        <td>{{ $user->request_type }}</td>

                                                        <td>{{ date('d-m-Y', strtotime($user->request_date))}}</td>

                                                    <td>
                                                     {{$user->status}}







                                                    </td>

                                                    <td>

                                                        @if($Auth::guard('admin')->user()->id == 1)

                                                      @if (Auth::guard('admin')->user()->can('requisition_view'))
                                                          <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $user->id }}"
                                                          class="btn btn-success waves-light waves-effect  btn-sm" >
                                                          <i class="fas fa-envelope"></i></button>

                                                            <!--  Large modal example -->
                                                            <div class="modal fade bs-example-modal-lg{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myLargeModalLabel">Product Requisition Status Change</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{ route('admin.status_requisition_information.update') }}" method="POST" enctype="multipart/form-data">

                                                                                @csrf


                                                                        <input type="hidden" class="form-control form-control-sm" id="name" name="id" placeholder="Enter Name" value="{{ $user->id }}">
                                                                        <div class="row">

                                                                            <div class="form-group ">
                                                                                <label>Date:</label>
                                                                                <div class="input-group" id="datepicker2">
                                                                                    <input type="text" name="request_date" value="{{ $user->request_date }}" class="form-control" placeholder="dd M, yyyy"
                                                                                           data-date-format="dd M, yyyy" data-date-container='#datepicker2'
                                                                                           data-provide="datepicker" data-date-autoclose="true">

                                                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group ">
                                                                                <label>Product Requisition Status</label>
                                                                                <select name="status" id="" class="form-control">
                                                                                    <option value="Accept" {{ $user->status == 'Accept' ? 'selected':''}}>Accept</option>
                                                                                    <option value="Deny" {{ $user->status == 'Deny' ? 'selected':''}}>Deny</option>
                                                                                </select>
                                                                            </div>








                                                                        </div>





                                                                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                                                                            </form>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->


                @endif

                @else


                @endif

                {{-- <button type="button" class="btn btn-primary waves-light waves-effect  btn-sm" onclick="window.location.href='{{ route('admin.users.view',$user->id) }}'"><i class="fa fa-eye"></i></button> --}}





                                                    </td>
                                                </tr>
                @endforeach


                                                        </tbody>
                                                    </table>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
