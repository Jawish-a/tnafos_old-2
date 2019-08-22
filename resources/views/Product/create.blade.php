@extends('admin')
@section('pagecss')
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        Settings
    </h1>
    <form action="{{ action('ProductController@store')}}" method="post" enctype="multipart/form-data">
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
                                <label for="productName">Product Name</label>
                                <input class="form-control border-1" type="text" name="productName" id="productName">
                            </div>
                            <div class="form-group">
                                <label for="productDescription">Product Descreption</label>
                                <textarea class="form-control border-1" name="productDescription"
                                    id="productDescription" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control  border-1" name="category_id" id="category_id" required="">
                                    <option value="0" default="">No parent</option>
                                    @foreach (App\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Brand</label>
                                <select class="form-control  border-1" name="category_id" id="category_id" required="">
                                    <option value="0" default="">No Brand</option>

                                    @foreach (App\Brand::all() as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brandName}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="productSku">SKU</label>
                                <input class="form-control border-1" type="text" name="productSku" id="productSku">
                            </div>
                            <div class="form-group">
                                <label for="productBarcode">Barcode</label>
                                <input class="form-control border-1" type="text" name="productBarcode"
                                    id="productBarcode">
                            </div>
                            <div class="form-group">
                                <label for="productVersion">Version</label>
                                <input class="form-control border-1" type="text" name="productVersion"
                                    id="productVersion">
                            </div>
                            <div class="form-group">
                                <label for="productWeight">Weight</label>
                                <input class="form-control border-1" type="text" name="productWeight"
                                    id="productWeight">
                            </div>
                            <div class="form-group">
                                <label for="productDimensionsX">Length</label>
                                <input class="form-control border-1" type="text" name="productDimensionsX"
                                    id="productDimensionsX">
                            </div>
                            <div class="form-group">
                                <label for="productDimensionsY">Width</label>
                                <input class="form-control border-1" type="text" name="productDimensionsY"
                                    id="productDimensionsY">
                            </div>
                            <div class="form-group">
                                <label for="productDimensionsZ">Height</label>
                                <input class="form-control border-1" type="text" name="productDimensionsZ"
                                    id="productDimensionsZ">
                            </div>
                            <div class="form-group">
                                <label for="productImage">Product Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="productImage" name="productImage">
                                    <label class="custom-file-label" for="productImage">Choose file</label>
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
