@extends('admin')
@section('pagecss')
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        Estimate NO. : {{$estimate->number}}
    </h1>
    <div class="row">
        <div class="col-lg-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">General</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <p class="text-info h5">Estimate Number: </p>
                        </div>
                        <div class="col-8 text-">
                            <p class="h5">{{$estimate->number}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="text-info h5">Estimate Date: </p>
                        </div>
                        <div class="col-8 text-">
                            <p class="h5">{{$estimate->date}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="text-info h5">Estimate Expiry Date: </p>
                        </div>
                        <div class="col-8 text-">
                            <p class="h5">{{$estimate->expiryDate}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="text-info h5">Company: </p>
                        </div>
                        <div class="col-8 text-">
                            <p class="h5">{{$estimate->company->companyName}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                </div>
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <table style="color: #444; width: 100%;">
                                <tbody>
                                    <tr class="invoice-preview-header-row">
                                        <td style="width: 45%; vertical-align: top;">
                                            <img style="max-height: 100px"
                                                src="/storage/companies_logos/{{$estimate->company->companyLogo}}">
                                        </td>
                                        <td class="hidden-invoice-preview-row" style="width: 20%;"></td>
                                        <td class="invoice-info-container"
                                            style="width: 35%; vertical-align: top; text-align: right"><span
                                                style="font-size:20px; font-weight: bold;background-color: #2AA384; color: #fff;">&nbsp;Estimate
                                                #{{$estimate->number}}&nbsp;</span>
                                            <div style="line-height: 10px;"></div><span>Estimate date:
                                                {{$estimate->date}}</span><br>
                                            <span>Valid until: {{$estimate->expiryDate}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px;"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div><b>{{$estimate->company->companyName}}</b></div>
                                            <div style="line-height: 3px;"> </div>
                                            <span class="invoice-meta" style="font-size: 90%; color: #666;">Demo
                                                address,<br>
                                                123, address line #1 <div style="line-height: 1px;"> </div>
                                                Phone: +01 123456789 <div style="line-height: 2px;"> </div>
                                                Website: <a style="color:#666; text-decoration: none;"
                                                    href="http://fairsketch.com">http://fairsketch.com</a>
                                            </span>
                                        </td>
                                        <td></td>
                                        <td>
                                            <div><b>Estimate To</b></div>
                                            <div style="line-height: 2px; border-bottom: 1px solid #f2f2f2;"> </div>
                                            <div style="line-height: 3px;"> </div>
                                            <strong>{{App\Company::find($estimate->client_id)->companyName}}</strong>
                                            <div style="line-height: 3px;"> </div>
                                            <span class="invoice-meta" style="font-size: 90%; color: #666;">
                                                <div>Demo Address Here<br>
                                                    4200 Sun N Lake Boulevard <br>USA </div>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center" scope="col" class="text-center" style="width: 5%">#
                                            </th>
                                            <th scope="col">Service Name</th>
                                            <th class="text-center" scope="col" style="width: 8%">QTY</th>
                                            <th class="text-center" scope="col" style="width: 10%">Unit Price</th>
                                            <th class="text-center" scope="col" style="width: 10%">Total</th>
                                            <th class="text-center" scope="col" style="width: 5%"><i
                                                    class="fas fa-ellipsis-h"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($estimate->services as $index => $service)
                                        <tr>
                                            <th class="text-center align-middle">{{$index+1}}</th>
                                            <th class="align-middle">
                                                <strong>{{$service->serviceName}}</strong><br><small>{{$service->serviceName}}</small>
                                            </th>
                                            <th class="text-center align-middle">1</th>
                                            <th class="text-center align-middle">{{$service->pivot->unitPrice}}</th>
                                            <th class="text-center align-middle">{{$service->pivot->total}}</th>
                                            <th class="text-center align-middle"></th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-9"></div>
                            <div class="col-3">
                                <div class="pull-right table-responsive">
                                    <table class="table display" id="dataTable" width="100%" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th>Sub Totol</th>
                                                <th>$500.00</th>
                                            </tr>
                                            <tr>
                                                <th>Discont</th>
                                                <th>$500.00</th>
                                            </tr>
                                            <tr>
                                                <th>VAT</th>
                                                <th>$500.00</th>
                                            </tr>
                                            <tr>
                                                <th>Totol</th>
                                                <th>$1500.00</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card mb-4 py-3 border-left-primary">
                                    <div class="card-body">
                                        <strong>Notes</strong>
                                        <p>random text</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card mb-4 py-3 border-left-warning">
                                    <div class="card-body">
                                        <strong>Terms</strong>
                                        <p>random text</p>
                                    </div>
                                </div>
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
                        <a href="{{action('EstimateController@print', $estimate)}}" class="btn btn-secondary btn-block">
                            <span class="icon text-white-50">
                                <i class="fas fa-print"></i>
                            </span>
                            <span class="text"> Print </span>
                        </a>
                        <a href="" class="btn btn-info btn-block">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                            <span class="text"> Accept </span>
                        </a>
                        <a href="" class="btn btn-info btn-danger btn-block">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                            <span class="text"> Decline </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('pagescript')
@endsection
