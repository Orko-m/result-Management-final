@extends('employee.app')
@section('title','View Attendance show')

@section('content')
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')->{{$date2nd}}</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12">



            <div class="card">

                    <div class="card-header border-0">
                      
                    
                 
						<div class="table-responsive">
                            <table  class="table align-items-center table-flush">
                                <thead>
                                
                                    <tr>
                                        <th>Sl</th>
                                        <th>Employee</th>
                                        @foreach($employees[0]->attendances()->where('dateYM',$date2nd)->get() as $key=>$value)
                                           <th>{{$key+1}}</th>
                                        @endforeach 
                                       <th>Total Present</th>
                                       <th>Total Absents</th>
                                       <th>Total Leave</th>
                                       <th>Total Off day</th>
                                    </tr>

                                </thead>
                                <tbody>
                                  
                                @foreach($employees as $key => $employee  )
                                    <tr>
                                        <td>{{ $key + 1}}</td>
                                        
                                        <td>{{ $employee->first_name." ".$employee->last_name}}</td>
                                        @php 
                                            $present = 0;
                                            $absent = 0;
                                            $leave  = 0;
                                            $offday =0;
                                        @endphp 
                                        @foreach($atns as $atd )
                          
                                                    @if($atd->status =='present' && $atd->employee_id === $employee->id)
                                                      @php 
                                                        $present++;
                                                      @endphp  
                                                       <td><i class="fa fa-check text-success"></i> </td>

                                                    @elseif($atd->status =='absent' && $atd->employee_id === $employee->id)

                                                    @php 
                                                       $absent ++
                                                     @endphp  
                                                    <td><i class="fa fa-times text-danger"></i> </td>

                                                    @elseif($atd->status =='leave' && $atd->employee_id === $employee->id)
                                                        @php 
                                                        $leave++
                                                        @endphp  
                                                        <td><i class="fa fa-sign-out-alt text-warning"></i> </td>

                                                    @elseif($atd->status =='offday' && $atd->employee_id === $employee->id)
                                                    <td><i class="fa fa-power-off text-info"></i> </td>
                                                    @php 
                                                      $offday++
                                                    @endphp  

                                                    @endif

                                        @endforeach

                                            <td>{{ $present }}</td>
                                            <td>{{ $absent  }}</td>
                                            <td>{{  $leave }}</td>
                                            <td>{{ $offday }}</td>
                                       </tr>
                                       @endforeach
                                </tbody>
                            </table>
						</div>

                    <!-- end new design for table -->
                    <br>

            </div>
        </div>
        {{-- <a  href="{{route('previousPdf')}}" type="button" class="btn btn-primary waves-effect waves-light"><i data-feather="check-square"></i> create pdf</a> --}}

    </div><!--End Row--> 



@endsection

