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
                $date = date('Y-m');
                $userEmail=User::select('email')->where()->first();


                $present=Attendance::where('status','=','present')->where('dateYM',$date)->count();
                $absent =Attendance::where('status','=','absent')->where('dateYM',$date)->count();
                $leave =Attendance::where('status','=','leave')->where('dateYM',$date)->count();
                $offday =Attendance::where('status','=','off day')->where('dateYM',$date)->count();
               return view('employee.dashboard',compact('date','present','absent','leave','offday'));
            }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
