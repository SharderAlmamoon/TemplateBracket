<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('backend.pages.category.managecategory');
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
        $validator = Validator::make($request->all(),[
            
            'name'=>'required',
            'description'=>'required',
            'tag'=>'required',
            'status'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'faild'=>'404',
                'errors'=> $validator->messages()
            ]);
        }
        else{
            $category = new Category();
            $category->name=$request->name;
            $category->description=$request->description;
            $category->tag=$request->tag;
            $category->status=$request->status;
            $category->save();
            return response()->json([
                'message'=>'SUCCESSFULLY CATEGORY INSERTED'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $category = Category::all();
        return response()->json([
            'data' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $alldata=Category::find($id);
      return response()->json([
        'data'=>$alldata
      ]);
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
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required',
            'tag'=>'required',
            'status'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'error'=>$validator->messages()
            ]);
        }
        else{
            $category = Category::find($id);
            $category->name = $request->name;
            $category->description = $request->description;
            $category->tag = $request->tag;
            $category->status = $request->status;
            $category->update();
            return response()->json([
                'message'=> 'CATEGORY UPDATED SUCCESSFULLY'
            ]);
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
        $allCategory = Category::find($id);
        $allCategory->delete();
        return response()->json([
            'message'=>'SUCCESSFULLY CATEGORY DELETED'
        ]);
    }
}
