@extends('admin')

@section('pagecss')
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Brands</h1>
        <a href="{{route('brand.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add New Brand</a>
    </div>
    <div class="row">
            @if (count($brands) == 0)
            <div class="col-12">
                <h1>hmm.. somthing is missing</h1>
            </div>
            @else
        @foreach ($brands as $brand)
        <div class="col-xl-2 col-md-6 mb-4 ">
            <div class="card text-center" style="max-width: 15rem;">
                <img src="/storage/brands_logo/{{$brand->brandLogo}}" class="card-img-top" alt="...">
                {{--                 <img src="{{asset('images/brands'.$brand->brandLogo)}}" class="card-img-top"
                alt="..."> --}}
                <div class="card-body">
                    <h4 class="card-title">{{$brand->brandName}}</h4>
                    <p class="card-text">{{$brand->brandDescription}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endforeach
        @endif

    </div>
</div>
@endsection

@section('pagescript')
@endsection
