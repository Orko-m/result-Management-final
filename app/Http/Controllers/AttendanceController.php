<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use mysql_xdevapi\Exception;
use Illuminate\Support\Facades\Auth;


class AttendanceController extends Controller
{
    public function attendance_index(){
       $employees=Employee::select('id','first_name','last_name')->get();

        return view('attendance.add-attendance',compact('employees'));
    }
    public function store(Request  $request)
    {


        foreach ($request->employee_id as $emp_id)
        { 
            // $validated = $request->validate([
            //     'date' => 'unique:attendances',
                
            // ]);
            try {
              $attendance= Attendance::create( [
                    "employee_id" => $emp_id,
                    "status" => $request->status[$emp_id],
                    "date" => $request->date,
                    "dateYM" => date('Y-m',strtotime($request->date)),
                
    
                ]);
                
                session()->flash('success','Attendance Success');

            } catch (Exception $e ) {
                session()->flash('error','something went! wrong please try again later');
            }
           
        }
        return redirect()->back();
    }

    // employee attendance view
    public function view_attendance()

    {
       $date=date('Y-m-d');

        $attendances = Attendance::join('employees', 'attendances.employee_id', '=', 'employees.id')
            ->get(['attendances.*', 'employees.first_name','employees.last_name']);

        $present=Attendance::where('status','=','present')->where('date', $date)->count();
        $absent =Attendance::where('status','=','absent')->where('date', $date)->count();
        $leave =Attendance::where('status','=','leave')->where('date', $date)->count();
        $offday =Attendance::where('status','=','off day')->where('date', $date)->count();



        return view('attendance.view-attendance',compact('attendances','present','absent','leave','offday','date'));
    } // end method
    public  function  edit_attendance($employee_id,$date)
    {

         $edit_employee_status = Attendance::select('employee_id','date','status')->where('employee_id','=',$employee_id)->where('date','=',$date)->first();

        return view('attendance.edit-attendance',compact('edit_employee_status'));
    }
    public function update_attendance(Request  $request,$empleoyee_id,$date)
    {



        $update_status = Attendance::all()->where('employee_id','=',$empleoyee_id)->where('date','=',$date)->first();
        $update_status->status= $request->status;
        $update_status->update();
        return Redirect::route('view');
    }
    // for view all attendance
    public function view_all_attendance(){
      
        $date1=date('Y-m');
       
    
    
       $atns=Attendance::select('employee_id','date','dateYM','status')->where('dateYM',$date1)->get();
    

     $employees = Employee::withCount(['presents','absents','leave','offday'])->get();  
  
    return view('attendance.view-all-attendance',compact('employees','atns','date1'));

    }

//  for previous report  
public function showPrevious(){

    return view('attendance.previousReport');

}

public function viewpreviousreport(Request $request){

    $date2nd=date('Y-m',strtotime($request->date));

    $atns=Attendance::select('employee_id','date','dateYM','status')->where('dateYM',$date2nd)->get();
    
    $employees= Employee::all();
    // dd($atns);

    return view('attendance.view-previous-attendance',compact('employees','atns','date2nd'));

    }
   
    public function view_employee_report(Request $request){
      

        $authEmail=Auth::user()->email;
        $userEmail=Employee::where('email',$authEmail)->first();
        $authEmplyeeId=$userEmail->id;
        
        $date2nd=date('Y-m',strtotime($request->date));
        
        $atns=Attendance::select('employee_id','date','dateYM','status')->where('employee_id',$authEmplyeeId)->where('dateYM',$date2nd)->get();
          
        $employees= Employee::select('id','first_name','last_name')->where('id',$authEmplyeeId)->get();
       
    
        return view('employee.view-employee-attendance-show',compact('employees','atns','date2nd'));
    
        }

}





