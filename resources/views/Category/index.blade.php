@extends('admin')
@section('pagecss')
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Categories</h1>
    <br>
    <div class="row">
        @if (count($categories) == 0)
        <div class="col-12">
            <h1>hmm.. somthing is missing</h1>
        </div>
        @else
        @foreach ($categories as $category)
        <div class="col-lg-4">
            <div class="card mb-4 py-3 border-bottom-primary">
                <div class="card-body text-center">
                    <h1><i class="fas fa-code"></i></h1>
                    <br>
                    <h5 class="text-primary">{{$category->categoryName}}</h5>
                    <hr>
                    <span>{{$category->categoryDescreption}}</span>
                    <div class="row">
                        <div class="col-lg-6">
                            <a class="btn btn-warning btn-block" href="{{route('category.edit', $category)}}">Edit</a>
                        </div>
                        <div class="col-lg-6">
                            <form action="{{action('CategoryController@destroy', $category)}}" method="POST">
                                <button class="btn btn-danger btn-block" type="submit">DELETE</button>
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </div>
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
