@extends('admin')
@section('pagecss')
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content') {{-- start of page content --}}
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Companies</h1>
        <a href="{{route('company.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add New Company</a>
    </div>
    <br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of companies</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Company Barcode</th>
                            <th>Company SKU</th>
                            <th>Company Brand</th>
                            <th>Company Category</th>
                            <th class="text-center"><i class="fas fa-ellipsis-h"></i></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Company Name</th>
                            <th>Company Barcode</th>
                            <th>Company SKU</th>
                            <th>Company Brand</th>
                            <th>Company Category</th>
                            <th class="text-center"><i class="fas fa-ellipsis-h"></i></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($companies as $company)
                        <tr>
                            <td><a href="{{route('company.show', $company->id)}}">{{$company->companyName}}</a></td>
                            <td>{{$company->companyCR}}</td>
                            <td>{{$company->companyMainProducts}}</td>
                            <td>{{$company->companyEmail}}</td>
                            <td>{{$company->companyCountry}}, {{$company->companyCity}}</td>
                            <td class="text-center">
                                <a href="{{action('CompanyController@edit', $company->id)}}"
                                    class="fas fa-pen text-success"></a>
                                <a class="fas fa-minus-circle text-danger"></a>
                            </td>
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
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
  $('#dataTable').DataTable();
});

</script>
@endsection