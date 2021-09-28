<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){

        $role=auth()->user()->role;
        if($role==1 ||$role==2 || $role==3)
        {
             $date = date('Y-m-d');

            $present=Attendance::where('status','=','present')->where('date',$date)->count();
            $absent =Attendance::where('status','=','absent')->where('date',$date)->count();
            $leave =Attendance::where('status','=','leave')->where('date',$date)->count();
            $offday =Attendance::where('status','=','off day')->where('date',$date)->count();
            $totalEmployee=Employee::all()->count();
            
            return view('admin.dashboard',compact('date','present','absent','leave','offday','totalEmployee'));
        }else
            {
                $authEmail=Auth::user()->email;
                
                $date = date('Y-m');
                $userEmail=Employee::where('email',$authEmail)->first();
                $authEmplyeeId=$userEmail->id;
        
                $present=Attendance::where('status','=','present')->where('dateYM',$date)->where('employee_id', $authEmplyeeId)->count();
                $absent =Attendance::where('status','=','absent')->where('dateYM',$date)->where('employee_id', $authEmplyeeId)->count();
                $leave =Attendance::where('status','=','leave')->where('dateYM',$date)->where('employee_id', $authEmplyeeId)->count();
                $offday =Attendance::where('status','=','off day')->where('dateYM',$date)->where('employee_id', $authEmplyeeId)->count();
               return view('employee.dashboard',compact('date','present','absent','leave','offday'));
            }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
