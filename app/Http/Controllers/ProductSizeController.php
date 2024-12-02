<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = ProductSize::orderBy('id', 'desc')->get();
        return view('backend.file.size.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.file.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required|unique:product_sizes,name',
        ],[
            'name.required' => 'The product watt name is required',
            'name.unique' => 'The product watt name is already exists',
        ]);         
        $request['name'] = strtolower($request->name);
        ProductSize::create($request->all());
        return redirect()->route('product-watt.index')->with('message','Product watt inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $size = ProductSize::findOrFail($id);
        $status = $size->status;
        if ($status == 1) {
            $status = 0;
        }
        else{
            $status = 1;
        }
        $size->status = $status;
        $size->updated_at = Carbon::now();
        $size->save();
        return redirect()->back()->with('message', 'Product Watt Status Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size = ProductSize::findOrFail($id);
        return view('backend.file.size.create', compact('id', 'size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:product_sizes,name,'.$id,
        ],[
            'name.required' => 'The product watt name is required',
            'name.unique' => 'The product watt name is already exists',
        ]);
        $request['name'] = strtolower($request->name);
        ProductSize::findOrFail($id)->update($request->all());
        return redirect()->route('product-watt.index')->with('message','Product watt updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductSize::findOrFail($id)->delete();
        return redirect()->back()->with('message','Product watt deleted Successfully');
    }
}
