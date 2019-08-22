@extends('admin')
@section('pagecss')
@endsection

@section('content') {{-- start of page content --}}
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Orders</h1>
        <a href="{{route('order.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add New Order</a>
    </div>
    <br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Orders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Order End Date</th>
                            <th scope="col">Order Status</th>
                            <th class="text-center" scope="col"><i class="fas fa-ellipsis-h"></i></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">Order UUID</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Order End Date</th>
                            <th scope="col">Order Status</th>
                            <th class="text-center" scope="col"><i class="fas fa-ellipsis-h"></i></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($inbox as $order)
                        <tr>
                            <th scope='row'><a href="{{route('inboxShow', $order)}}">{{$order->id}}</a></th>
                            <th>{{$order->company->companyName}}</th>
                            <th>
                                @foreach ($services as $service)
                                    {{$service->serviceName}}
                                @endforeach
                            </th>
                            <th>{{$order->date}}</th>
                            <th>{{$order->endDate}}</th>
                            <th>{{$order->pivot['qty']}}</th>
                            <th></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
{{-- end of page content --}}
@endsection

@section('pagescript')
@endsection
