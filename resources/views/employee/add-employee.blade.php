@extends('Admin.app')
@section('title','Add New Employee')

@section('content')

    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="col-sm-3 ">
            <div class="btn-group float-sm-right">
                <a href="{{ route('employee') }}" type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-list mr-1"></i> Manage Employee</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <hr>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('store-employee') }}" method="post" id="myform" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control"name="first_name" id="first_name"value="{{old('first_name')}}" placeholder="Enter Your First Name">
                        </div>


                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control"name="last_name" id="last_name"value="{{old('last_name')}}" placeholder="Enter Your Last Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control"name="email" id="email"value="{{old('email')}}" placeholder="Enter Your Email Address">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Date Of Birth</label>
                            <input type="date" value="2018-05-10 00:00:00" class="form-control" name="dob"value="{{old('dob')}}" id="dob" placeholder="Enter Your Date Of Birth">
                        </div>
                        <div class="form-group">
                            <label for="pr_address">Permanent Address </label>

                            <textarea id="parmanent_address" name="parmanent_address" rows="4"  cols="85">
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="pr_address">Present Address </label>

                            <textarea id="present_address" name="present_address" rows="4" value="{{old('present_address')}}" cols="85">
                             </textarea>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Employee Image</label>
                            <input type="file" class="form-control"name="employee_image" id="last_name" placeholder="Enter Your Last Name">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control"name="password_confirmation" id="confirm_password" placeholder="Confirm Password">
                        </div>
                        <div class="form-group text-right mb-0">
                            <button type="submit" class="btn btn-primary px-5"><i class="icon-check"></i> Add Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


