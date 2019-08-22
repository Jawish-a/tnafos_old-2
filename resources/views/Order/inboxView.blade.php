@extends('admin')
@section('pagecss')
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        Order : {{$order->id}}
    </h1>
    <form action="{{action('EstimateController@store')}}" method="post">
        <div class="row">
            @csrf
            <div class="col-lg-9">
                <div class="card shadow mb-4">
                    <a href="#options" class="d-block card-header py-3" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="options">
                        <h6 class="m-0 font-weight-bold text-primary">General</h6>
                    </a>
                    <div class="collapse show" id="options">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h6 class="mb-3">From:</h6>
                                    <div>
                                        <input type="hidden" name="client" value="{{$order->company->id}}">
                                        <strong>{{$order->company->companyName}}</strong>
                                    </div>
                                    <div>Madalinskiego 8</div>
                                    <div>71-101 Szczecin, Poland</div>
                                    <div>Email: info@webz.com.pl</div>
                                    <div>Phone: +48 444 666 3333</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="expiryDate" class="col-sm-3 col-form-label">Expiry Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" required name="expiryDate" class="form-control" id="expiryDate">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="number" class="col-sm-3 col-form-label">Estimate Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" required name="number" class="form-control" id="number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select required class="form-control" name="status" id="status">
                                                <option value="draft" selected>Draft</option>
                                                <option value="ready">Ready</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="order_id" value="{{$order->id}}">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" style="width: 5%">ID</th>
                                            <th scope="col" style="width: 30%">Item Name</th>
                                            <th scope="col" style="width: 35%">Item Descreption</th>
                                            <th scope="col" style="width: 10%">Unit Price</th>
                                            <th scope="col" style="width: 10%">Total</th>
                                            <th class="text-center" scope="col"  style="width: 10%"><i class="fas fa-ellipsis-h"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                        <tr>
                                            <th scope='row'></th>
                                            <th><input type="hidden" name="services[]" value="{{$service->id}}">{{$service->serviceName}}</th>
                                            <th>{{$service->serviceDescription}}</th>
                                            <th><input class="form-control border-1" type="text" name="unitPrice[]" id="unitPrice"></th>
                                            <th><input type="hidden" name="total[]" value=""><p id="total"></p></th>
                                            <th><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                            </button></th>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="notes"><strong>Notes</strong></label>
                                    <textarea class="form-control" required id="notes" rows="3" name="notes"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="terms"><strong>Terms</strong></label>
                                    <textarea class="form-control" required id="terms" rows="3" name="terms"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card shadow mb-4">
                    <a href="#saveOption" class="d-block card-header py-3" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="saveOption">
                        <h6 class="m-0 font-weight-bold text-primary">Options</h6>
                    </a>
                    <div class="collapse show text-center" id="saveOption">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success btn-block">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text"> Save </span>
                            </button>
                            <a href="#" class="btn btn-secondary btn-block">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text"> Cancel </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection

@section('pagescript')

@endsection
