<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    public function index()
    {
        $all_employee = Employee::all();
        return  view('employee.manage-employee',compact('all_employee'));
    }
    public function create()
    {
        $userEmail=User::select('email')->where('role',0)->orderBy('id', 'DESC')->get();

        return view('employee.add-employee',compact('userEmail'));
    }
    public function store(Request $request)
    {
       
        
        
       $forValidate = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:employees',
            'dob' => 'required',
            'employee_image' => 'required|mimes:jpg,jpeg,png',
            'present_address'=>'required',
         
        ],
        
    [
        'first_name.required' => 'Please Input First Name',
        'last_name.required' => 'Please Input Last Name',
        'email.required' => 'Please Input Your Valide Email',
        'email.unique' => 'This email is already used',
        'dob.required' => 'Please Input Your Date of Birth',
        'present_address.required' => 'Employee present address is required',
        'parmanent_address.required' => 'Employee parmanent address is required',

    ]);
   

 

    $employee_img = $request->file('employee_image');
    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($employee_img->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$img_ext;
    $up_location = 'image/';
    $last_img = $up_location.$img_name;
    $employee_img->move($up_location,$img_name);
   
     
    Employee::insert([
        'first_name' =>$request->first_name,
        'last_name' =>$request->last_name,
        'email' =>$request->email,
        'dob' =>$request->dob,
        'present_address' =>$request->present_address,
        'parmanent_address' =>$request->parmanent_address,
        'employee_img' =>$last_img,
        'created_at' => Carbon::now()
    ]);
     
// for toster notification
$notification = array(
    'message' => 'Employee Data Inserted Successfuly',
    'alert-type' =>'info'
);
// end toster notification code

    return Redirect()->route('employee')->with($notification);

    
    }

    public function edit($id)
    {
        $edit_employee = Employee::find($id);
        return view('employee.edit-employee',compact('edit_employee'));
    }

    public function update(Request $request, $id)
    {
        
           
        $forValidate = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required', 
            'dob' => 'required',
            'present_address'=>'required',
         
        ],
        
    [
        'first_name.required' => 'Please Input First Name',
        'last_name.required' => 'Please Input Last Name',
        'dob.required' => 'Please Input Your Date of Birth',
        'present_address.required' => 'Employee present address is required',
        'parmanent_address.required' => 'Employee parmanent address is required',

    ]);

    if($request->employee_image){
    $old_img = $request->old_image;
    $employee_img = $request->file('employee_image');
    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($employee_img->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$img_ext;
    $up_location = 'image/';
    $last_img = $up_location.$img_name;
    $employee_img->move($up_location,$img_name);

    unlink($old_img);
    }else{
        $employee = Employee::find($id);
        $last_img = $employee->employee_img;
    }
    Employee::find($id)->update([
        'first_name' =>$request->first_name,
        'last_name' =>$request->last_name,
       
        'dob' =>$request->dob,
        'present_address' =>$request->present_address,
        'parmanent_address' =>$request->parmanent_address,
        'employee_img' =>$last_img,
        'created_at' => Carbon::now()
    ]);

// for toster notification
$notification = array(
    'message' => 'Employee Data Updated Successfuly',
    'alert-type' =>'success'
);
// end toster notification code

    return Redirect()->back()->with($notification);

    

    }

    public function destroy($id)
    {
        $delete_employee = Employee::destroy($id);
    // for toster notification
    $notification = array(
        'message' => 'Employee Deleted Successfuly',
        'alert-type' =>'warning'
    );
    // end toster notification code
            return Redirect::back()->with($notification);
        
    }
//    view just employee attendance view
    public function view_employee_attendance()
    {
        

        return view('employee.view-employee-attendance');
    }
}
