<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\CustomerLoginRequest;
use App\Http\Requests\CustomerRegistrationRequest;
use App\Http\Requests\CustomerProfileRequest;
use Illuminate\Http\Request;
use DB;
use Hash;
use Str;
use Auth;
use File;
use Cart;

class AuthController extends Controller
{
    public function login(){
        if(Auth::guard('customers')->user())
        {
            return redirect()->back();
        }else{
            return view('frontend.file.auth.login');
        }
    }
    public function register(){
        if(Auth::guard('customers')->user())
        {
            return redirect()->back();
        }else{
            return view('frontend.file.auth.register');
        }
    }

    public function customer(CustomerRegistrationRequest $request){
        $customer = new Customer();
        $requested_data = $request->all();
        $requested_data['password'] = Hash::make($request->password);

        $save = $customer->fill($requested_data)->save();
        if($save){
            return redirect()->route('customer-login')->with('message','Customer Create Successfully.');
        }else{
            return back()->with('error','Customer Added Failed!!');
        }
    }

    public function logincheck(CustomerLoginRequest $request){
        if (Auth::guard('customers')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Cart::content()->count() > 0){
                return redirect('/cart')->with('message','Login Successfully');
            }else{
                return redirect('/customer/dashboard')->with('message','Login Successfully');
            }
        }else{
            return back()->with('error','Login Failed!!');
        }
    }

    public function logout(Request $request)
    {   
        Auth::guard('customers')->logout();
        return redirect('/')->with('message',"You're Successfully Logout");;
    }

    public function profile(){
        return view('frontend.file.customer.profile');
    }

    public function profileUpdate(CustomerProfileRequest $request){
        if ($request->password) {
            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $name = 'image' . Str::random(5) . '.' . $extension;
                $path = "asset/backend_asset/assets/images/customer/profile/";
                $request->file('image')->move($path, $name);
                $data1 = $formData['image'] = $path . $name;
            }else{
                $data1 = Auth::guard('customers')->user()->image;
            }

            $data = [
                'name'   => $request->name,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'image'  =>$data1,
                'address' =>$request->address,
                'password'=> Hash::make($request->password),
            ];
        }else{
            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $name = 'image' . Str::random(5) . '.' . $extension;
                $path = "asset/backend_asset/assets/images/customer/profile/";
                $request->file('image')->move($path, $name);
                $data1 = $formData['image'] = $path . $name;
            }
            else{
                $data1 = Auth::guard('customers')->user()->image;
            }
            $data = [
                'name'   => $request->name,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'image'  =>$data1,
                'address' =>$request->address,
                'password' => Auth::guard('customers')->user()->password,
            ];   
        }
        Customer::where('id', Auth::guard('customers')->user()->id)->update($data);
        return back()->with('message','Profile Updated Successfully');
    }
}
