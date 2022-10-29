@extends('backend.master.master')

@section('title')
Invoice Detail | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Invoice & Payment Section</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active">Invoice</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    @include('flash_message')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="button-items justify-content-center">


                    <a href="{{ route('admin.sell_information.edit',$invoice->id) }}" class="btn btn-primary waves-effect waves-light"><i class="fas fa-pen"></i> Edit Invoice
                    </a>




                    <a href="{{ route('admin.sell_information.print',$invoice->id) }}" class="btn btn-info waves-effect waves-light"><i class="fas fa-print"></i> Print
                    </a>



                    <button type="button" class="btn btn-danger waves-effect waves-light" onclick="deleteTag({{ $invoice->id}})"><i class="fas fa-trash-alt "></i> Delete Invoice
                    </button>

                    <form id="delete-form-{{ $invoice->id }}" action="{{ route('admin.sell_information.delete',$invoice->id) }}" method="POST" style="display: none;">

                        @csrf

                    </form>


                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="invoice-title">
                    <h4 class="float-end font-size-16">Order #{{ $invoice->order_id }}</h4>
                    <div class="mb-4">
                        <img src="{{ asset('/') }}{{ $logo }}" alt="logo" height="20" />
                    </div>
                </div>
                <hr>

                <?php

                $client_info_list = DB::table('clients')->where('customer_display_name',$invoice->client_slug)->first();


                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <address>
                            <strong>Billed To:</strong><br>
                            {{ $client_info_list->customer_display_name }}<br>
                            {{ $client_info_list->email }}<br>
                            {{ $client_info_list->phone }}<br>
                            {{ $client_info_list->billing_address_one }}
                        </address>
                    </div>
                    <div class="col-sm-6 text-sm-end">
                        <address class="mt-2 mt-sm-0">
                            <strong>Shipped To:</strong><br>
                           {{ $client_info_list->customer_display_name }}<br>
                           {{ $client_info_list->shipping_address_one }}
                           {{ $client_info_list->shipping_phone}}
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mt-3">
                        <address>
                            <strong>Payment Method:</strong><br>
                            {{ $invoice->payment_term }}<br>
                            {{ $client_info_list->email }}
                        </address>
                    </div>
                    <div class="col-sm-6 mt-3 text-sm-end">
                        <address>
                            <strong>Order Date:</strong><br>
                            {{ $invoice->pay_date }}<br><br>
                        </address>
                    </div>
                </div>
                <div class="py-2 mt-3">
                    <h3 class="font-size-15 fw-bold">Order summary</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 70px;">No.</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Tax</th>
                            <th class="text-end">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($invoice_detail as $key=>$all_invoice_detail)

                          <?php



                            $product_name = DB::table('products')
                            ->where('id', $all_invoice_detail->product_id )->value('name');


                                                    ?>

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $product_name }}</td>
                            <td>{{ $all_invoice_detail->qty }}</td>
                            <td>{{ $all_invoice_detail->price }}</td>
                            <td>{{ $all_invoice_detail->tax }}</td>
                            <td class="text-end">{{ $all_invoice_detail->total_price }}</td>
                        </tr>
                         @endforeach

                        <tr>
                            <td colspan="4" class="text-end">Sub Total</td>
                            <td class="text-end"> {{ $invoice->total_net_price }}</td>
                        </tr>

                        <tr>
                            <td colspan="4" class="border-0 text-end">
                                <strong>Price With Vat/Tax</strong>
                            </td>
                            <td class="border-0 text-end">{{ $invoice->total_vat_tax }}</td>
                        </tr>

                        <tr>
                            <td colspan="4" class="border-0 text-end">
                                <strong>Discount</strong>
                            </td>
                            <td class="border-0 text-end">{{ $invoice->total_discount }}</td>
                        </tr>

                        <tr>
                            <td colspan="4" class="border-0 text-end">
                                <strong>Total</strong>
                            </td>
                            <td class="border-0 text-end">
                                <h4 class="m-0">{{ $invoice->grand_total }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border-0 text-end">
                                <strong>Due</strong>
                            </td>
                            <td class="border-0 text-end">
                                <h4 class="m-0">{{ $invoice->due }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border-0 text-end">
                                <strong>Total Pay</strong>
                            </td>
                            <td class="border-0 text-end">
                                <h4 class="m-0">{{ $invoice->grand_total-$invoice->due}}</h4>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-print-none">
                    {{-- <div class="float-end">
                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                        <a href="#" class="btn btn-primary w-md waves-effect waves-light">Send</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end row -->

@endsection

@section('script')
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
