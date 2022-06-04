<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Models\Backend\ItemModel;
use App\Models\Backend\itemGallery;
use Image;
use File;

class Itemcontroller extends Controller
{
    // item index
    public function index()
    {
        $itemall = ItemModel::all();
        return view('backend.pages.item.manageitem',compact('itemall'));
    }
    // item Create
    public function create()
    {
        $category = Category::all();
        return view('backend.pages.item.additem',compact('category'));
    }
    // item Store

    public function store(Request $request)
    {
        $request->validate([
            'item_code'=>'required',
            'iname'=>'required',
            'idescription'=>'required',
            'icategory'=>'required',
            'istatus'=>'required',
        ]);

        if($request->iimage){
            $image = $request->File('iimage');
            $imageCustomName =md5(time().rand(00000,99999)).'.'.$image->getClientOriginalExtension();
            $imagepath = public_path('backend/itemimage/'.$imageCustomName);
            Image::make($image)->resize(320,240)->save($imagepath);

            $itemInsert =new ItemModel();
            $itemInsert->item_code = $request->item_code;
            $itemInsert->iname = $request->iname;
            $itemInsert->idescription = $request->idescription;
            $itemInsert->icategory = $request->icategory;
            $itemInsert->istatus = $request->istatus;
            $itemInsert->iimage = $imageCustomName;
            $itemInsert->save();
        }
        if($request->iGmage){
            $imagess = $request->File('iGmage');
            foreach($imagess as $img){
                $imageCustomNameuuu =md5(time().rand(00000,99999)).'.'.$img->getClientOriginalExtension();
                $imagepath = public_path('backend/itemimage/itemimagegallery/'.$imageCustomNameuuu);
                Image::make($img)->save($imagepath);

                $itemGInsert =new itemGallery();
                $itemGInsert->item_code = $request->item_code;
                $itemGInsert->iGmage = $imageCustomNameuuu;
                $itemGInsert->save();
            }
            
        }
        return redirect()->route('item.manage');
    }
    // product Edit
    public function edit($id){

    }
}
