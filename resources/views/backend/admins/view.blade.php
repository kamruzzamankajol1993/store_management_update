@extends('backend.master.master')

@section('title')
{{ $admins->name }} |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Profile</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
                        <div class="row">
                            <div class="col-xl-4">


                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Personal Information</h4>


                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td>{{ $admins->name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Position :</th>
                                                        <td>{{ $admins->position }} </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mobile :</th>
                                                        <td>{{ $admins->phone }} </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-mail :</th>
                                                        <td>{{ $admins->email }} </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->


                                <!-- end card -->
                            </div>

                            <div class="col-xl-8">




                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Assaign Product</h4>
                                        <div class="table-responsive">
                                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>SL.</th>

                                                                                        <th>Product Name & Quantity</th>
                                                                                        <th>Request Type</th>
                                                                                        <th>Date</th>
                                                                                        <th>Request Status</th>

                                                                                    </tr>
                                                                                </thead>


                                                                                <tbody>
                                                                                    @foreach ($requisition_list as $user)


                                                                        <tr>
                                                                           <td>


                                                                            {{ $loop->index+1 }}




                                                                        </td>





                                                                            <td>




                                        <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $user->id }}"
                                            class="btn btn-success waves-light waves-effect  btn-sm" >
                                        view</button>

                                              <!--  Large modal example -->
                                              <div class="modal fade bs-example-modal-lg{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-lg">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h5 class="modal-title" id="myLargeModalLabel">Product Name & Quantity</h5>
                                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
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
                                                          </div>
                                                      </div><!-- /.modal-content -->
                                                  </div><!-- /.modal-dialog -->
                                              </div><!-- /.modal -->




                                                                                </td>
                                                                                <td>{{ $user->request_type }}</td>

                                                                                <td>{{ date('d-m-Y', strtotime($user->request_date))}}</td>

                                                                            <td>
                                                                             {{$user->status}}







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
                        <!-- end row -->
@endsection
