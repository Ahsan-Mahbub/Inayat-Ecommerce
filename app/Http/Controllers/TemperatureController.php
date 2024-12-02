<?php

namespace App\Http\Controllers;

use App\Models\Temperature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TemperatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['all_data'] = Temperature::orderBy('id', 'desc')->get();
        return view('backend.file.temperature.list', $data);
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
        // dd($request->all());
        if($request->ajax()){
            $data = $request->all();
            $validator = Validator::make($request->all(),[
                'name' =>'required',
            ]);
            if($validator->passes()){
                $request['name'] = $request->name;
                Temperature::create($request->all());
                return response()->json([
                    'status' => 'success',
                    'message' => 'Product Temperature Created Successfully!',
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
        $data = Temperature::findOrFail($id);
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
                $request['name'] = $request->name;
                Temperature::findOrFail($data['id'])->update($request->all());
                return response()->json([
                    'status' => 'success',
                    'message' => 'Product Temperature Updated Successfully!',
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
        Temperature::FindOrFail($id)->delete();
        return response()->json(['status' => 200, 'message' => 'Product Temperature Deleted Successfully!']);
    }

    //  Product temperature Update Status
    public function updateStatus(Request $request){
        if ($request->status == 'active') {
            $s = 0;
            $message = 'Product Temperature inactive successfully!';
        } elseif ($request->status == 'inactive') {
            $s = 1;
            $message = 'Product Temperature active successfully!';
        } 
        Temperature::findOrFail($request->id)->update(['status' => $s]);
        return response()->json(['status' => $s, 'message' => $message]);
    }
}
