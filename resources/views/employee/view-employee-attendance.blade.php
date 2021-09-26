@extends('employee.app')
@section('title','View Attendance')

@section('content')

    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="col-sm-3 ">
            <div class="btn-group float-sm-right">
                <a href="{{route('redirects')}}" type="button" class="btn btn-primary waves-effect waves-light"><i data-feather="home"></i> Dashboard</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12">

            <div class="card">


                    <div class="card-header border-0">@yield('title')
                        <div class="col-12 col-sm-6">


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

