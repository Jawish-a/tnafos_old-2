@extends('admin')
@section('pagecss')
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        Settings
    </h1>
    <form action="{{ action('ServiceController@store')}}" method="post">
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
                                <label for="serviceName">Service Name</label>
                                <input class="form-control border-1" type="text" name="serviceName" id="serviceName">
                            </div>
                            <div class="form-group">
                                <label for="serviceDescription">Service Descreption</label>
                                <textarea class="form-control border-1" name="serviceDescription"
                                    id="serviceDescription" cols="30" rows="10"></textarea>
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
