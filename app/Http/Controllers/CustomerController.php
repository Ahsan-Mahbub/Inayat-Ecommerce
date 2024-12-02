<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRegistrationRequest;
use Auth;
use Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_customer = Customer::orderBy('id','desc')->get();
        return view('backend.file.customer.list', compact('all_customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.file.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRegistrationRequest $request)
    {
        $customer = new Customer();
        $requested_data = $request->all();
        $requested_data['password'] = Hash::make($request->password);

        $save = $customer->fill($requested_data)->save();
        if($save){
            return redirect()->route('customer.index')->with('message','Customer Create Successfully.');
        }else{
            return back()->with('error','Customer Added Failed!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('backend.file.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'email' => 'required|unique:customers,'.$id,
        //     'name' => 'required|string',
        //     'email' => "required|regex:/(01)[0-9]{9}/|unique:customers,$id",
        // ]);

        $customer = Customer::findOrFail($id);

        if ($request->password) {
            $data = [
                'name'   => $request->name,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'address' =>$request->address,
                'password'=> Hash::make($request->password),
            ];
        }else{
            $data = [
                'name'   => $request->name,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'address' =>$request->address,
                'password' => $customer->password,
            ];   
        }
        Customer::where('id', $id)->update($data);
        return back()->with('message','Customer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Customer::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Customer Successfully Deleted');
    }
}
