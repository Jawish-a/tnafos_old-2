@extends('admin')
@section('pagecss')
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        Settings
    </h1>
    <form action="{{ action('CompanyController@update', $company)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-9">
                <div class="card shadow mb-4">
                    <a href="#options" class="d-block card-header py-3" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="options">
                        <h6 class="m-0 font-weight-bold text-primary">General Settings</h6>
                    </a>
                    <div class="collapse show" id="options">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="companyName">Company Name</label>
                                <input class="form-control border-1" type="text" name="companyName" id="companyName"
                                    value="{{$company->companyName}}">
                            </div>
                            <div class="form-group">
                                <label for="companyType">Company Type</label>
                                <input class="form-control border-1" type="text" name="companyType" id="companyType">
                            </div>
                            <div class="form-group">
                                <label for="companyCR">Company CR</label>
                                <input class="form-control border-1" type="text" name="companyCR" id="companyCR">
                            </div>
                            <div class="form-group">
                                <label for="companyMainProducts">Company Main Products</label>
                                <input class="form-control border-1" type="text" name="companyMainProducts"
                                    id="companyMainProducts">
                            </div>
                            <div class="form-group">
                                <label for="companyEstablishmentYear">Company Establishment Year</label>
                                <input class="form-control border-1" type="date" name="companyEstablishmentYear"
                                    id="companyEstablishmentYear">
                            </div>
                            <div class="form-group">
                                <label for="companyTotalEmployees">Company Total Employees</label>
                                <input class="form-control border-1" type="number" name="companyTotalEmployees"
                                    id="companyTotalEmployees">
                            </div>
                            <div class="form-group">
                                <label for="companyBusinessType">Company Business Type</label>
                                <input class="form-control border-1" type="text" name="companyBusinessType"
                                    id="companyBusinessType">
                            </div>
                            <div class="form-group">
                                <label for="companyBio">Company Bio</label>
                                <input class="form-control border-1" type="text" name="companyBio" id="companyBio">
                            </div>
                            <div class="form-group">
                                <label for="companyTelephone">Company Telephone</label>
                                <input class="form-control border-1" type="text" name="companyTelephone"
                                    id="companyTelephone">
                            </div>
                            <div class="form-group">
                                <label for="companyFax">Company Fax</label>
                                <input class="form-control border-1" type="telephone" name="companyFax" id="companyFax">
                            </div>
                            <div class="form-group">
                                <label for="companyEmail">Company Email</label>
                                <input class="form-control border-1" type="email" name="companyEmail" id="companyEmail">
                            </div>
                            <div class="form-group">
                                <label for="companyWebsite">Company Website</label>
                                <input class="form-control border-1" type="text" name="companyTelephone"
                                    id="companyTelephone">
                            </div>
                            <div class="form-group">
                                <label for="companyPObox">Company PO BOX</label>
                                <input class="form-control border-1" type="text" name="companyPObox" id="companyPObox">
                            </div>
                            <div class="form-group">
                                <label for="companyCountry">Company Country</label>
                                <input class="form-control border-1" type="text" name="companyCountry"
                                    id="companyCountry">
                            </div>
                            <div class="form-group">
                                <label for="companyCity">Company City</label>
                                <input class="form-control border-1" type="text" name="companyCity" id="companyCity">
                            </div>
                            <div class="form-group">
                                <label for="companyAddress">Company Address</label>
                                <input class="form-control border-1" type="telephone" name="companyAddress"
                                    id="companyAddress">
                            </div>
                            <div class="form-group">
                                <label for="companyLocation">Company Location</label>
                                <input class="form-control border-1" type="telephone" name="companyLocation"
                                    id="companyLocation">
                            </div>
                            {{-- products --}}
                            <div class="form-group">
                                <label for="companyLogo">company Logo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="companyLogo" name="companyLogo">
                                    <label class="custom-file-label" for="companyLogo">Choose file</label>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <a href="#companyProducts" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="companyProducts">
                                    <h6 class="m-0 font-weight-bold text-primary">Company Products</h6>
                                </a>
                                <div class="collapse show" id="companyProducts">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="companyProducts">Company Products</label>
                                            <select class="custom-select" multiple="multiple" name="companyProducts[]"
                                                name="companyProducts[]">
                                                @foreach (App\Product::all() as $product)
                                                <option value="{{$product->id}}">{{$product->productName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                            {{-- services --}}
                <div class="card shadow mb-4">
                    <a href="#companyServices" class="d-block card-header py-3" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="companyServices">
                        <h6 class="m-0 font-weight-bold text-primary">Company Services</h6>
                    </a>
                    <div class="collapse show" id="companyServices">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="companyServices">Company Services</label>
                                <select class="custom-select" multiple="multiple" id="companyServicesSelect"
                                    name="companyServices[]" style="width: 100%">
                                    @foreach (App\Service::all() as $service)
                                    <option value="{{$service->id}}">{{$service->serviceName}}</option>
                                    @endforeach
                                </select>
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
        @method('put')
    </form>
</div>

@endsection

@section('pagescript')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.custom-select').select2();
});
</script>

@endsection
