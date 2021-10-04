@extends('admin.app')
@section('title','Add Attendance')

@section('content')

    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="col-sm-3 ">
            <div class="btn-group float-sm-right">
                <a href="{{ route('view') }}" type="button" class="btn btn-primary waves-effect waves-light"><i data-feather="check-square"></i> View Attendance</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12">

            <div class="card">
              @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                     @if (session('error'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
            
                <form action="{{ route('store') }}" method="post">
                    @csrf
                <div class="card-header border-0">@yield('title')
                    <div class="col-12 col-sm-6">
{{--                        for date--}}
                        <input type="date" required name="date" class="form-control">

                    </div>
                    </div>

                <div class="table-responsive">
                    <table id="example1" class="table align-items-center table-flush">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($employees as $employees)

                            <tr>
                                <td>{{++$loop->index}}</td>
                                <input type="hidden" name="employee_id[]" value="{{ $employees->id }}" />
                                <td>{{$employees->first_name." ".$employees->last_name}}</td>


                                <td>


                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" checked value="present" name="status[{{$employees->id}}]">
                                            <span class="btn btn-sm btn-success">Present</span>
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" value="absent" name="status[{{$employees->id}}]">
                                            <span class="btn btn-sm btn-danger">Absent</span>
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" value="leave" name="status[{{$employees->id}}]">
                                            <span class="btn btn-sm btn-warning">Leave</span>
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" value="offday" name="status[{{$employees->id}}]">
                                            <span class="btn btn-sm btn-info">off day</span>
                                        </label>
                                    </div>

                                </td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                </div>
                <br>
                    <div class="form-group text-center mb-2">
                        <button type="submit" class="btn btn-primary px-5"><i class="icon-check"></i>Save Attendance</button>
                    </div>
                </form>
            </div>
        </div>

    </div><!--End Row-->


@endsection

