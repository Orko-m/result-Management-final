@extends('employee.app')
@section('title','View Attendance form')

@section('content')

    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
       
    </div>

    
        <div class="row">
            <div class="col-12 col-lg-12">
    
                
                    <div class="card text-center">
                        <form action="{{ route('singleEmployee') }}" method="get">
                            @csrf
                        <div class="card-header border-0 text-center">
                            <div class="col-12 col-sm-8 text-center">
                               
                                <input type="date" required name="date" class="form-control text-center">
        
                            </div>
                            </div>
        
                       
                        <br>
                            <div class="form-group text-center mb-0 pb-2">
                                <button type="submit" class="btn btn-primary px-5"><i class="icon-check"></i>Download attendance report</button>
                            </div>
                        </form>
                    </div>
               
            </div>
    
        </div><!--End Row-->
 

@endsection

