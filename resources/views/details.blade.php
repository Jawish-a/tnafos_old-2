@extends('layouts.search')

@section('content')

<div class="container">
    <br>
    <div class="row">
        <div class="col-md-3">
            <img class="img-fluid rounded mb-3 mb-md-0" src="/storage/product_images/{{$product->productImage}}" alt="">
        </div>
        <div class="col-md-9">
            <h1 class="my-4 text-primary">{{$product->productName}} <small
                    class="text-muted">{{$product->productDescription}}</small></h1>
        </div>
    </div>

    {{--  --}}
    <hr>
    <div class="row col-lg-12">
        <h1>&emsp;List of Providers </h1>
    </div>
    <br>
    <div class="row">

    </div>

    @foreach ($product->companies as $company)
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <a href="#">
                <img class="img-fluid rounded mb-3 mb-md-0" style="width:300px; max-height:400px;"
                    src="/storage/companies_logos/{{$company->companyLogo}}" alt="">
            </a>
        </div>
        <div class="col-md-9 col-sm-9">
            <div class="row">
                <h3>{{$company->companyName}}</h3>
            </div>
            <div class="row">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, odit velit cumque vero doloremque
                    repellendus distinctio maiores rem expedita a nam vitae modi quidem similique ducimus! Velit, esse
                    totam
                    tempore.</p>
            </div>
            <div class="row col-md-12 position-absolute fixed-bottom">
                <div class="col-md-3">
                    <a class="btn btn-primary" href="#">View Profile</a>
                </div>
                <div class="col-md-3">
                    <h5 class="text-success">7 Years</h5>
                </div>
                <div class="col-md-3">
                    <h5 class="text-info">53 Poroject</h5>
                </div>
                <div class="col-md-3">
                    <span class="text-warning">★ ★ ★ ★ ☆</span> </div>
            </div>
        </div>
    </div>
    <hr>

    @endforeach

    <!-- /.row -->

</div>



@endsection
