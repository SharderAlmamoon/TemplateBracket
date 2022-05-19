<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('id','asc')->get();
        return view('backend.pages.product.manage',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.product.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pname'=>'required|unique:products',
            'pdescription'=>'required',
            'pcategory'=>'required',
            'psize'=>'required',
            'pcostprice'=>'required|numeric',
            'psellprice'=>'required|numeric',
            'pquantity'=>'required|numeric',
            'pstatus'=>'required'
        ]);
        $product=new Product();
        $product->pname = $request->pname;
        $product->pdescription = $request->pdescription;
        $product->pcategory = $request->pcategory;
        $product->psize = $request->psize;
        $product->pcostprice = $request->pcostprice;
        $product->psellprice =$request->psellprice; 
        $product->pquantity =$request->pquantity; 
        $product->pstatus = $request->pstatus;
        // dd($product);
        $product->save();
        return redirect()->route('manage');

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
        $product = Product::find($id);
        return view('backend.pages.product.productedit',compact('product'));
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
            'pname'=>'required',
            'pdescription'=>'required',
            'pcategory'=>'required',
            'psize'=>'required',
            'pcostprice'=>'required|numeric',
            'psellprice'=>'required|numeric',
            'pquantity'=>'required|numeric',
            'pstatus'=>'required'
        ]);
        $product=Product::find($id);
        $product->pname = $request->pname;
        $product->pdescription = $request->pdescription;
        $product->pcategory = $request->pcategory;
        $product->psize = $request->psize;
        $product->pcostprice = $request->pcostprice;
        $product->psellprice =$request->psellprice; 
        $product->pquantity =$request->pquantity; 
        $product->pstatus = $request->pstatus;
        // dd($product);
        $product->update();
        return redirect()->route('manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('manage');
    }
}
