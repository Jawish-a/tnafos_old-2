@extends('admin')
@section('pagecss')
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        service : {{$service->serviceName}}
    </h1>
    <div class="row">
        <div class="col-lg-9">
            <div class="card shadow mb-4">
                <a href="#options" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="options">
                    <h6 class="m-0 font-weight-bold text-primary">General</h6>
                </a>
                <div class="collapse show" id="options">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="serviceName">service Name</label>
                            <h6 class="form-control border-1 m-0 font-weight-bold text-info" type="text"
                                name="serviceName" id="serviceName">{{$service->serviceName}}</h6>
                            <h6 class="form-control border-1 m-0 font-weight-bold text-info" type="text"
                                name="serviceName" id="serviceName">@if (!$service->category)
                                    no category
                                @else
                                {{$service->category->categoryName}}
                                @endif</h6>{{--  --}}
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
                        <a href="{{route('service.edit', $service)}}" class="btn btn-info btn-block">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                            <span class="text"> Edit </span>
                        </a>
                        <form action="{{action('ServiceController@destroy', $service)}}" method="post">
                            <button type="submit" class="btn btn-danger btn-block">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text"> Delete </span>
                            </button>
                            @csrf
                            @method('delete')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('pagescript')
@endsection
