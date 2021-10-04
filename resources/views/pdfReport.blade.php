@extends('admin.app')
@section('title','Previous report form')

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


            <div class="col-sm-4 ">
        
                <div class="card text-center">
                    <form action="{{ route('download-daily') }}" method="post">
                        @csrf
                    <div class="card-header border-0 text-center">
                        <h3>For daily  report</h3>
                        <div class="text-center">
                           
                            <input type="date" required name="date" class="form-control text-center">
    
                        </div>
                        </div>
    
                   
                    <br>
                        <div class="form-group text-center mb-0 pb-2">
                            <button type="submit" class="btn btn-primary px-5"><i class="icon-check"></i>download daily attendacne report</button>
                        </div>
                    </form>
                </div>
           
        </div>



            <div class=" col-sm-4">
    
                
                    <div class="card text-center">
                        <form action="{{ route('download') }}" method="post">
                            @csrf
                        <div class="card-header border-0 text-center">
                            <h3>For monthly  report</h3>
                            <div class="text-center">
                               
                                <input type="date" required name="date" class="form-control text-center">
        
                            </div>
                            </div>
        
                       
                        <br>
                            <div class="form-group text-center mb-0 pb-2">
                                <button type="submit" class="btn btn-primary px-5"><i class="icon-check"></i>download monthly attendacne report</button>
                            </div>
                        </form>
                    </div>
               
            </div>
            <div class=" col-sm-4">
    
                
                <div class="card text-center">
                    <form action="{{ route('download-yearly') }}" method="post">
                        @csrf
                    <div class="card-header border-0 text-center">
                        <h3>For yearly  report</h3>
                        <div class="text-center">
                           
                            <input type="date" required name="date" class="form-control text-center">
    
                        </div>
                        </div>
    
                   
                    <br>
                        <div class="form-group text-center mb-0 pb-2">
                            <button type="submit" class="btn btn-primary px-5"><i class="icon-check"></i>download yearly attendacne report</button>
                        </div>
                    </form>
                </div>
           
        </div>
    
        </div><!--End Row-->
 

@endsection


 
