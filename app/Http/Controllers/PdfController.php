<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;



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

}
