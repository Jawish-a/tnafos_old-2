@extends('admin')
@section('pagecss')
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        Settings
    </h1>
    <form action="{{ action('UserController@update', $user->id)}}" method="post">
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
                                <label for="firstName">First Name</label>
                                <input class="form-control border-1" type="text" name="firstName" id="firstName"
                                    value="{{$user->firstName}}">
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input class="form-control border-1" type="text" name="lastName" id="lastName"
                                    value="{{$user->lastName}}">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <input class="form-control border-1" type="text" name="gender" id="gender"
                                    value="{{$user->gender}}">
                            </div>
                            <div class="form-group">
                                <label for="birthDate">Birth Date</label>
                                <input class="form-control border-1" type="date" name="birthDate" id="birthDate"
                                    value="{{$user->birthDate}}">
                            </div>
                            <div class="form-group">
                                <label for="mobileNumber">Mobile Number</label>
                                <input class="form-control border-1" type="text" name="mobileNumber" id="mobileNumber"
                                    value="{{$user->mobileNumber}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control border-1" type="email" name="email" id="email"
                                    value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control border-1" type="password" name="password" id="password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-lg-3">
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
@endsection