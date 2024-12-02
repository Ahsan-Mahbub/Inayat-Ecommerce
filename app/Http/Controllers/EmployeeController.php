<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\EmployeeDesignation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $all_data = Employee::orderBy('id','asc')->get();
        return view('backend.file.employee.employee-list', compact('all_data'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users,email',
        ],[
            'email.required' => 'The email field is required',
            'email.unique' => 'The email has already exists',
        ]);
        // dd($request->all());
        DB::beginTransaction();

        $user = new User();
        $user->role_id = 3;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->created_at = Carbon::now();
        $user->save();
        $user_id = $user->id;

        $employee = new Employee();
        $employee->user_id = $user_id;
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->password = $request->password;
        $employee->address = $request->address;
        $employee->created_at = Carbon::now();
        $save = $employee->save();

        DB::commit();

        if($save){
            return redirect()->route('employee.index')->with('message','Employee Added Successfully');
        }else{
            return back()->with('error','Employee Added Failed!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employee::findOrFail($id);
        return response()->json(['employees' => $employees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'email' => 'required|unique:users,email,'.$id,
        ],[
            'email.required' => 'The email field is required',
            'email.unique' => 'The email has already exists',
        ]);
       

        $id = $request->id;

        DB::beginTransaction();
        $employee = Employee::findOrFail($id);
        $employee->user_id = $request->user_id;
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->password = $request->password;
        $employee->address = $request->address;
        $employee->updated_at = Carbon::now();
        $updated = $employee->save();

        $user = User::where('id', $request->user_id)->first();
        $user->role_id = 3;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->updated_at = Carbon::now();
        $user->save();

        DB::commit();

        if($updated){
            return redirect()->route('employee.index')->with('message','Employee Updated Successfully');
        }else{
            return back()->with('error','Employee Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        $employee = Employee::where('id', $id)->first();
        User::where('id', $employee->user_id)->firstOrFail()->delete();
        $employee->delete();
        DB::commit();
        return back()->with('message','Employee Successfully Deleted');
    }
}
