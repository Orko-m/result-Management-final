@extends('admin.app')
@section('title','')

@section('content')

    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">






                    @if($edit_employee_status->status=='present')

                    <h3 class="text-center text-success"> Employee Status is Present</h3>
                        @elseif($edit_employee_status->status=='absent')
                        <h3 class=" text-center text-danger"> Employee Status is Absent</h3>
                    @elseif($edit_employee_status->status=='leave')
                        <h3 class=" text-center text-warning"> Employee Status is Leave</h3>
                    @elseif($edit_employee_status->status=='off day')
                        <h3 class=" text-center text-info"> Employee Status is Off day</h3>

                    @endif

                        <hr>
                    <hr>
                    <form action="{{ route('update-attendance',[$edit_employee_status->employee_id,$edit_employee_status->date]) }}"method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio"value="present"name="status"
                                           @if($edit_employee_status->status=="present")
                                           checked
                                        @endif >
                                    <span class="btn btn-sm btn-success">present</span>
                                </label>
                            </div>


                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" value="absent"name="status"
                                    @if($edit_employee_status->status=="absent")
                                        checked
                                           @endif >

                                    <span class="btn btn-sm btn-danger">Absent</span>
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" value="leave"name="status"
                                           @if($edit_employee_status->status=="leave")
                                           checked
                                        @endif >
                                    <span class="btn btn-sm btn-warning">Leave</span>
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" value="off day" name="status"
                                           @if($edit_employee_status->status=="off day")
                                           checked
                                        @endif >
                                    <span class="btn btn-sm btn-info">off day</span>
                                </label>
                            </div>
                        </div>


                        <div class="form-group text-right mb-0">
                            <button type="submit" class="btn  btn-primary"><i class="icon-check"></i>update Attendance</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
