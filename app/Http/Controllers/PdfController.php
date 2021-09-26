<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;



class PdfController extends Controller
{
    public function pdfGenerator(){

    // // $data = [

    // // ];

    // $present=Attendance::where('status','=','present')->count();


    // $absent =Attendance::where('status','=','absent')->count();
    // $leave =Attendance::where('status','=','leave')->count();
    // $offday =Attendance::where('status','=','off day')->count();



    // // // return view('attendance.view-attendance',compact('attendances','present','absent','leave','offday'));

    // //     return view('attendance.view-all-attendance',compact('employees','present','absent','leave','offday'));

    // $employees = Employee::withCount(['presents','absents','leave','offday'])->get();

    $date1=date('Y-m');



    $atns=Attendance::select('employee_id','date','dateYM','status')->where('dateYM',$date1)->get();


  $employees = Employee::withCount(['presents','absents','leave','offday'])->get();

//  return view('attendance.view-all-attendance',compact('employees','atns','date1'));

    // return view('attendance.view-all-attendance');
    // }
     $pdf = PDF::loadView('pdf',compact('employees','atns','date1'));
    // $pdf = PDF::loadView('attendance.view-all-attendance');

    // return $pdf->download('new.pdf');
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
        // dd($atns);
        $pdf = PDF::loadView('downloadPdf',compact('employees','atns','date2nd'));
        return $pdf->stream('monthly.pdf');
    }

}
