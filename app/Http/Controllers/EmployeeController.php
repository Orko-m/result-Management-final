<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
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
        return view('employee.add-employee');
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'password' => 'required',
            'employee_image' => 'required|mimes:jpg,jpeg,png',
            'present_address'=>'required',
            'parmanent_address'=>'required',
        ],
    [
        'first_name.required' => 'Please Input First Name',
        'last_name.required' => 'Please Input Last Name',
        'email.required' => 'Please Input Your Valide Email',
        'dob.required' => 'Please Input Your Date of Birth',
        'password.required' => 'Inter Your Password',
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
        'password' => Hash::make($request->password),
        'present_address' =>$request->present_address,
        'parmanent_address' =>$request->parmanent_address,
        'employee_img' =>$last_img,
        'created_at' => Carbon::now()
    ]);


    return Redirect()->back()->with('success', 'Employee Data Inserted Successfuly');

    }

    public function edit($id)
    {
        $edit_employee = Employee::find($id);
        return view('employee.edit-employee',compact('edit_employee'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'present_address'=>'required',
            'parmanent_address'=>'required',
        ],
        [
            'first_name.required' => 'Please Input First Name',
            'last_name.required' => 'Please Input Last Name',
            'email.required' => 'Please Input Your Valide Email',
            'dob.required' => 'Please Input Your Date of Birth',
            'password.required' => 'Inter Your Password',
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
        'email' =>$request->email,
        'dob' =>$request->dob,
        'password' => Hash::make($request->password),
        'present_address' =>$request->present_address,
        'parmanent_address' =>$request->parmanent_address,
        'employee_img' =>$last_img,
        'created_at' => Carbon::now()
    ]);


    return Redirect()->back()->with('success', 'Employee Data Update Successfuly');

    }

    public function destroy($id)
    {
        $delete_employee = Employee::destroy($id);
        return Redirect::back();
    }
//    view just employee attendance view
    public function view_employee_attendance()
    {
        $attendances = Attendance::join('employees', 'attendances.employee_id', '=', 'employees.id')
            ->get(['attendances.*', 'employees.first_name','employees.last_name']);
//

        return view('employee.view-employee-attendance',compact('attendances'));
    }
}
