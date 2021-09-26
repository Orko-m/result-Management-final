@extends('admin.app')
@section('title','View Attendance')

@section('content')

    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="col-sm-3 ">
                    <div class="btn-group float-sm-right">
                        <a href="{{route('attendance_index')}}" type="button" class="btn btn-primary waves-effect waves-light"><i data-feather="check-square"></i> Add Attendance</a>
                    </div>
                </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12">



            <div class="card">

                    <div class="card-header border-0">

                        <div class="row">
                        <h3 class="btn btn-primary"> Today's attendance status count:({{$date}})</h3>
                    </div>

                        <div class="row">
                            <div class="col-sm-12 ">
                                <button type="button" class="btn btn-sm btn-success ">
                                    Present <span  class="badge badge-dark">{{$present}}</span>
                                </button>

                                <button type="button" class="btn btn-sm btn-danger ">
                                    Absent <span  class="badge badge-dark">{{$absent}}</span>
                                </button>
                                <button type="button" class="btn btn-sm btn-warning ">
                                    Leave <span  class="badge badge-dark">{{$leave}}</span>
                                </button>

                                <button type="button" class="btn btn-sm btn-info ">
                                    Off Day <span  class="badge badge-dark">{{$offday}}</span>
                                </button>


                            </div>
                            </div>
                        


                        </div>


                    </div>

                    <div class="table-responsive">
                        <table id="example1" class="table align-items-center table-flush">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($attendances as $attendance)

                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td>{{ $attendance->first_name." ".$attendance->last_name}}</td>
                                    <td>{{ $attendance->date}}</td>
                                    <td>
                                    @if($attendance->status =='present')


                                            <span class="btn btn-sm btn-success">{{ $attendance->status}}</span>
                                        @elseif($attendance->status =='absent')

                                        <span class="btn btn-sm btn-danger">{{ $attendance->status}}</span>

                                        @elseif($attendance->status =='leave')


                                            <span class="btn btn-sm btn-warning">{{ $attendance->status}}</span>
                                        @elseif($attendance->status =='off day')

                                        <span class="btn btn-sm btn-info">{{ $attendance->status}}</span>
                                    @endif
                                    </td>

                                    <td>
                                    <a href="{{ route('edit-attendance',[$attendance->employee_id,$attendance->date]) }}" class="btn btn-sm btn-dark"><i class="fa fa-edit"></i></a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <br>

            </div>
        </div>

    </div><!--End Row-->


@endsection

