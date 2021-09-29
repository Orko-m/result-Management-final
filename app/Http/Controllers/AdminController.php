<?php

namespace App\Http\Controllers;
use App\Models\User;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
//user user show
    public function user()
    {
        $users = User::all();


        return view('admin.user', compact('users'));
    }

//Add user  form
    public function addUserForm()
    {
        return view('admin.add-user');
    }
//Add user
//    public function storeUser(Request $request ){

//        $request->validate([
//            'name' =>'required|min:3|max:20',
//            'email' =>'required|min:3|max:20|unique:User',
//            'password' =>'required|min:8|max:20|,



//        ]);

//        return redirect()->back();
//    }
    public function StoreUser(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|max:20',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
    
        ]);

        $add_user = new User();
        $add_user->name = $request->name;
        $add_user->email = $request->email;
        $add_user->role = $request->role;
        $add_user->password = Hash::make($request->password);
        $add_user->save();

        $notification = array(
            'message' => 'User Data Inserted Successfuly',
            'alert-type' =>'info'
        );

        return redirect()->route('user')->with($notification);
    

    }

    public function EditUser($id)
    {
        $user = User::find($id)->role;
        $edit_user = User::find($id);
        return view('admin.edit-user', compact('edit_user', 'user'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
    
        ]);
        $add_user = User::find($id);
        $add_user->name = $request->name;
        $add_user->email = $request->email;
        $add_user->role = $request->role;
        $add_user->password = Hash::make($request->password);
        $add_user->update();
        $notification = array(
            'message' => 'User Data Updated Successfuly',
            'alert-type' =>'success'
        );


        return redirect()->route('user')->with($notification);
    }

    public function deleteUser($id)
    {
        $delete_user = User::destroy($id);
        $notification = array(
            'message' => 'User Deleted Successfuly',
            'alert-type' =>'warning'
        );
        return redirect()->back()->with($notification);
    
        
    }

    public function inactive($id)
    {
        User::where('id', $id)->update(['status' => 1]);
        return Redirect::back();
    }

    public function active($id)
    {
        User::where('id', $id)->update(['status' => 0]);
        return Redirect::back();
    }

    public function edit_profile()
    {
////     $user_id=auth()->user()->id;
//     $user_data=User::select('name','email')->where($user_id,'id')->get();
//     dd($user_data);
        if (auth()->user())
        {
            $user = User::find(auth()->user()->id);
            if ($user)
            {
                return view('user-profile.profile',compact('user'));
            }
        }

    }

    public function update_profile(Request $request)
    {
//       $user = auth()->user()->name;
//       dd($user);
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->update();Auth::user()->id
        $user = User::find(auth()->user()->id);
        if($user){
            $user->name = $request['name'];
            $user->email = $request['email'];


            $user->save();
            return Redirect()->back()->with('success','User Profile Is update Successfully');

        }else{
            return Redirect()->back();
        }

    }


    public function reset_password()
    {
        //dd(auth()->user()->id);

        return view('user-profile.reset-password');
    }

    public function update_password(Request $request)
    {
        {
            $request->validate([
                'current_password' => ['required'],
                'password' => ['required'],
                'confirm_password' => ['same:password'],
            ]);
             $hashedPassword = auth()->user()->getAuthPassword();
            if(Hash::check($request->current_password, $hashedPassword)) {
                User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);
                auth()->logout();
                return  Redirect::route('login');
            }else
                {
                    return redirect()->back();
                }
        }
    }
}
