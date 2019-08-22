@extends('admin')
@section('pagecss')
@endsection

@section('content')
{{-- start of page content --}}
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        Settings
    </h1>
    <form action="{{ action('SettingsController@store')}}" method="post">
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
                                <label for="appTagline">Application Title</label>
                                <input class="form-control border-1" type="text" name="appTagline" id="appTagline">
                            </div>
                            <div class="form-group">
                                <label for="appTitle">Application Tagline</label>
                                <input class="form-control border-1" type="text" name="appTitle" id="appTitle">
                            </div>
                            <div class="form-group">
                                <label for="appFavicon">Application Favicon</label>
                                <input class="form-control border-1" type="text" name="appFavicon" id="appFavicon">
                            </div>
                            <div class="form-group">
                                <label for="appIcon">Application Icon</label>
                                <input class="form-control border-1" type="text" name="appIcon" id="appIcon">
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
                                <span class="text"> Save</span>
                            </button>
                            <a href="#" class="btn btn-secondary btn-block">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text"> Cancel</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
{{-- end of page content --}}

@endsection

@section('pagescript')
@endsection