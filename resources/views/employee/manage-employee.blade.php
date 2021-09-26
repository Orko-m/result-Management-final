@extends('admin.app')
@section('title','Manage Employee')

@section('content')
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="col-sm-3 ">
            <div class="btn-group float-sm-right">
                <a href="{{ route('add-employee') }}" type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-user-plus mr-1"></i> Add New Employee</a>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header border-0">@yield('title')

                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>profile</th>
                            <th>Email</th>
                            <th>DOB</th>
                            <th>Action</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_employee as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td><img src="{{$employee->employee_img}}" alt="image" style="hight: 35px; width: 70px"></td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->dob }}</td>
                                <td>
                                    <a href="{{ route('edit-employee',$employee->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('delete-employee',$employee->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--End Row-->

@endsection
