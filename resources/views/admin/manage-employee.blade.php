@extends('admin.app')
@section('title','Manage Employee')

@section('content')
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="col-sm-3 ">
            <div class="btn-group float-sm-right">
                <a href="#" type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-user-plus mr-1"></i> Add New Employee</a>

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
                            <th>Email</th>
                            <th>DOB</th>
                            <th>Action</th>


                        </tr>
                        </thead>
                        <tbody>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--End Row-->

@endsection
