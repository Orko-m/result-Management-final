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
                   
                    <form action="{{ route('store-employee') }}" method="post" id="myform" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control"name="first_name" id="first_name"value="{{old('first_name')}}" placeholder="Enter Your First Name">
                        @error('first_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>



                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                          
                          <input type="text" class="form-control"name="last_name" id="last_name"value="{{old('last_name')}}" placeholder="Enter Your Last Name">
                          @error('last_name')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <select id="email" name="email"class="form-control">
                                <option value=" ">Select employee email</option>
                                @foreach ($userEmail as $item)
                                <option value="{{ $item->email }}">{{ $item->email }}</option>
                                @endforeach 
                            </select>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mobile">Date Of Birth</label>
                            <input type="date" value="2018-05-10 00:00:00" class="form-control" name="dob"value="{{old('dob')}}" id="dob" placeholder="Enter Your Date Of Birth">
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div style="display: flex; flex-direction:column;">
                            <label for="pr_address">Permanent Address</label>
                            <textarea id="parmanent_address" name="parmanent_address" rows="4"  cols="70">
                            </textarea>
                        </div>
                            @error('parmanent_address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group" >
                            <div style="display: flex; flex-direction:column;">
                                <label for="pr_address">Present Address</label>
                                <textarea  id="present_address" name="present_address" rows="4" value="{{old('present_address')}}" cols="70">
                                </textarea> 
                            </div>
                             @error('present_address')
                             <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastName">Employee Image</label>
                            <input type="file" class="form-control"name="employee_image" id="last_name" placeholder="Enter Your Last Name">
                            @error('employee_image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
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


