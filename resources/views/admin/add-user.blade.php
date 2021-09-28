@extends('admin.app')
@section('title','Add New User')

@section('content')

    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="col-sm-3 ">
            <div class="btn-group float-sm-right">
                <a href="{{route('user')}}" type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-list mr-1"></i> Manage Manager</a>

            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
{{--                    <div class="card-title">@yield('title')</div>--}}
                    <hr>
                    <form action="{{ route('storeUser') }}"method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="firstName">Name</label>
                            <input type="text" class="form-control"name="name" id="name"value="{{old('name')}}" placeholder="Enter Your  Name">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control"name="email" id="email"value="{{old('email')}}" placeholder="Enter Your Email Address">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="user_role">User Role</label>
                            <select id="user_role" name="role"class="form-control">
                                <option value="0">Select User Role</option>
                                <option value="1">ADMIN</option>
                                <option value="2">Manager</option>
                                <option value="3">Hr Manager</option>
                                <option value="0">Employee</option>


                            </select>
                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror  
                        </div>



                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror  
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control"name="password_confirmation" id="confirm_password" placeholder="Confirm Password">
                            @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror  
                        </div>


                        <div class="form-group text-right mb-0">
                            <button type="submit" class="btn btn-primary px-5"><i class="icon-check"></i> Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
