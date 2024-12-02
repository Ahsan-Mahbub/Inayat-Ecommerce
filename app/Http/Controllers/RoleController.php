<?php

namespace App\Http\Controllers;

use Validator;
use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['all_data'] = Role::get();
        return view('backend.file.role.role-list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $validator = Validator::make($request->all(),[
                'name' =>'required',                
            ]);
            if($validator->passes()){                
                Role::create([
                    'name' => $data['name'],                   
                    'created_at' => Carbon::now(),
                ]);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Role Created Successfully!',
                ]); 
            }
            else{
                return response()->json(['status'=>'error', 'errors'=>$validator->messages()]);
            }             
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Role::findOrFail($id);
        return response()->json(['status' => 200, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $validator = Validator::make($request->all(),[
                'name' =>'required',
            ]);
            if($validator->passes()){               
                Role::findOrFail($data['id'])->update([
                    'name' => $data['name'],                   
                    'updated_at' => Carbon::now(),
                ]);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Role Updated Successfully!',
                ]); 
            }
            else{
                return response()->json(['status'=>'error', 'errors'=>$validator->messages()]);
            }
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return response()->json(['status' => 200, 'message' => 'Role Deleted Successfully!']);
    }

    //  update status
    public function updateStatus(Request $request){
        if ($request->status == 'active') {
            $s = 0;
            $message = 'Role inactive successfully!';
        } elseif ($request->status == 'inactive') {
            $s = 1;
            $message = 'Role active successfully!';
        } 
        Role::findOrFail($request->id)->update(['status' => $s]);
        return response()->json(['status' => $s, 'message' => $message]);
    }
}
