<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function pdfGenerator(){

    

    $date1=date('Y-m');



     $atns=Attendance::select('employee_id','date','dateYM','status')->where('dateYM',$date1)->get();
     $employees = Employee::withCount(['presents','absents','leave','offday'])->get();
     $pdf = PDF::loadView('pdf',compact('employees','atns','date1'));
     $pdf->setPaper('A4','landscape');
    return $pdf->stream('new.pdf');
    }

    // for input page 
    public function forReport(){
    return view('pdfReport');
     }

    public function downloadPdf(Request $request){
        $date2nd=date('Y-m',strtotime($request->date));
        $atns=Attendance::select('employee_id','date','dateYM','status')->where('dateYM',$date2nd)->get();
        $employees= Employee::all();
        $pdf = PDF::loadView('downloadPdf',compact('employees','atns','date2nd'));
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('monthly.pdf');
    }
    public function downloadPdf_daily(Request $request){

        // $date2nd=date('Y-m',strtotime($request->date));
        $date=$request->date;
        
        $atns=Attendance::select('employee_id','date','status')->where('date',$date)->get();
        $employees= Employee::select('id','first_name','last_name')->get();

        $pdf = PDF::loadView('downloadPdf-daily',compact('employees','atns','date'));
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('daily.pdf');
    }

    public function download_yearly(Request $request){

       
        $year=date('Y',strtotime($request->date));
        
        // $employee = Employee::whereHas('attendances',function($query) use($year
        // ){ return $query->where('date','like',"%{$year}%"); })->with('attendances')->get();
        

        //select `attendances`.*, `employees`.first_name ,count(attendances.status) from `employees` inner join `attendances` 
        //on `employees`.id = `attendances`.employee_id where `attendances`.date like '%2021%' group by `attendances`.employee_id ,attendances.status;
        
         $employeeList =Employee::with(['attendances'])
                    // ->whereYear('attendances.date',$year)
                    // ->select('attendances.*','employees.first_name')
                    // ->groupBy('attendances.employee_id','attendances.status','employees.id')
                    ->get();
                   
        //  dd($employeeList);
        //  $employeesList      = Employee::with(['attendances'])->where('date','like',"%{$year}%")->get();
        // $employPresentYearly =Attendance::with(['employee'])->present()->where('date','like',"%{$year}%")->get();
        //  $employabstractYearly =Attendance::with(['employee'])->absent()->where('date','like',"%{$year}%")->get();
        //  $employleavetYearly =Attendance::with(['employee'])->leave()->where('date','like',"%{$year}%")->get();
        //  $employOffDayYearly =Attendance::with(['employee'])->OffDay()->where('date','like',"%{$year}%")->get();
        //  dd($employeeList);
        // ->present()->count()->present()->get()
    //    dd($employeeList);

       
        $pdf = PDF::loadView('downloadPdf-yearly',compact('employeeList','year'));
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('yearly.pdf');
    }





    public function view_single_employee()
    {
        

        return view('find_single_employee_report');
    }
    
    public function view_employee_reportpdf(Request $request){
      

        $authEmail=Auth::user()->email;
        $userEmail=Employee::where('email',$authEmail)->first();
        $authEmplyeeId=$userEmail->id;
        
        $date2nd=date('Y-m',strtotime($request->date));
        
        $atns=Attendance::select('employee_id','date','dateYM','status')->where('employee_id',$authEmplyeeId)->where('dateYM',$date2nd)->get();
          
        $employees= Employee::select('id','first_name','last_name')->where('id',$authEmplyeeId)->get();
       
    
        
        $pdf = PDF::loadView('single-employee-pdf',compact('employees','atns','date2nd'));
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('monthly.pdf');
    
        }

}
