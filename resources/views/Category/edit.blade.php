@extends('admin')
@section('pagecss')
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        Settings
    </h1>
    <form action="{{ action('CategoryController@update', $category)}}" method="post">
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
                                <label for="categoryName">Categoy Name</label>
                                <input class="form-control border-1" type="text" name="categoryName" id="categoryName"
                                    value="{{$category->categoryName}}">
                            </div>
                            <div class="form-group">
                                <label for="categoryDescreption">Category Descreption</label>
                                <textarea class="form-control border-1" name="categoryDescreption"
                                    id="categoryDescreption" cols="30"
                                    rows="10">{{$category->categoryDescreption}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="categoryParent_id">Category Parent</label>
                                <select class="form-control  border-1" name="categoryParent_id" id="categoryParent_id"
                                    required="">
                                    <option value="0" default="">No parent</option>
                                    @foreach (App\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categoryIcon">Category Icon</label>
                                <input class="form-control border-1" type="text" name="categoryIcon" id="categoryIcon"
                                    value="{{$category->categoryIcon}}">
                            </div>
                            <div class="form-group">
                                <label for="categoryImage">Category Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="categoryImage"
                                        name="categoryImage">
                                    <label class=" custom-file-label" for="categoryImage">Choose file</label>
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
        @method('PUT')
    </form>
</div>

@endsection

@section('pagescript')
@endsection