
@extends('Admin.app')
@section('title','Edit  Employee')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
            
                    
                    {{--                    <div class="card-title">@yield('title')</div>--}}
                    <hr>

                    <form action="{{ route('update-employee',$edit_employee->id) }}"method="post" id="myform" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{$edit_employee->employee_img}}">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control"name="first_name" id="first_name"value="{{$edit_employee->first_name}}" placeholder="Enter Your First Name">
                            @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control"name="last_name" id="last_name"value="{{$edit_employee->last_name}}" placeholder="Enter Your Last Name">
                            @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="mobile">Date Of Birth</label>
                            <input type="date"  class="form-control" name="dob"value="{{$edit_employee->dob}}" id="dob" placeholder="Enter Your Date Of Birth">
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastName">Employee Image</label>
                            <input type="file" class="form-control"name="employee_image" value="{{$edit_employee->employee_img}}" id="last_name">
                            
                        </div>
                         
                        <div class="form-group">
                            <img src="{{asset($edit_employee->employee_img)}}" alt="" style="height:150px; width: 150px;">
                        </div>
                        <div class="form-group">
                            <div style="display: flex; flex-direction:column;">
                            <label for="pr_address">Permanent Address </label>

                            <textarea id="parmanent_address" name="parmanent_address" rows="4" cols="85">

                               {{ $edit_employee->parmanent_address }}
                             </textarea>
                             @error('parmanent_address')
                             <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>
                    </div>
                        <div class="form-group">
                            <div style="display: flex; flex-direction:column;">

                            <label for="pr_address">Present Address </label>

                            <textarea id="present_address" name="present_address" rows="4"  cols="85">
                                {{ $edit_employee->present_address }}
                            </textarea>
                            @error('present_address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                        <div class="form-group text-right mb-0">
                            <button type="submit" class="btn btn-primary px-5"><i class="icon-check"></i> Update Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

