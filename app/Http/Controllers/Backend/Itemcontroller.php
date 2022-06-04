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
            Image::make($image)->resize(200,200)->save($imagepath);

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
        $item = ItemModel::find($id);
        $category = Category::all();
        $galleryImage = itemGallery::where('item_code',$item->item_code)->get();
        return view('backend.pages.item.itemedit',compact('item','category','galleryImage'));
    }
    // ITEM GALLERY DELETE 
    public function delete($id){
        $deleteGallery = itemGallery::find($id);
        if(File::exists('backend/itemimage/itemimagegallery/'.$deleteGallery->iGmage)){
            File::delete('backend/itemimage/itemimagegallery/'.$deleteGallery->iGmage);
        }
        $deleteGallery->delete();
        return back();
    }
// UPDATE method 
    public function update(Request $request,$id){
        $request->validate([
            'iname'=>'required',
            'idescription'=>'required',
            'icategory'=>'required',
            'istatus'=>'required',
        ]);

         $allitem =ItemModel::find($id);

         $allitem->iname = $request->iname;
         $allitem->idescription = $request->idescription;
         $allitem->icategory = $request->icategory;
         $allitem->istatus = $request->istatus;

        if($request->iimage){
            if(File::exists('backend/itemimage/'.$allitem->iimage)){
                File::delete('backend/itemimage/'.$allitem->iimage);
            }
            $upimage = $request->file('iimage');
            $imageCustomName =md5(time().rand(00000,99999)).'.'.$upimage->getClientOriginalExtension();
            $imagepath = public_path('backend/itemimage/'.$imageCustomName);
            Image::make($upimage)->resize(200,200)->save($imagepath);
            $allitem->iimage = $imageCustomName;
        }

        $allitem->update();

        if($request->iGmage){
            $upimageGallery = $request->File('iGmage');
            foreach($upimageGallery as $upimageGall){
                $imageGCustomNameuuu =md5(time().rand(00000,99999)).'.'.$upimageGall->getClientOriginalExtension();
                $imagepath = public_path('backend/itemimage/itemimagegallery/'.$imageGCustomNameuuu);
                Image::make($upimageGall)->save($imagepath);

                $itemGInsert =new itemGallery();
                $itemGInsert->item_code = $request->item_code;
                $itemGInsert->iGmage = $imageGCustomNameuuu;
                $itemGInsert->save();
            }
        }
        return redirect()->route('item.manage');
    }
// DELETE METHOD
    public function destroy($id){
        $deleteItem = ItemModel::find($id);
        if(File::exists('backend/itemimage/'.$deleteItem->iimage)){
            File::delete('backend/itemimage/'.$deleteItem->iimage);
        }
        $galleryImageDelete = itemGallery::where('item_code',$deleteItem->item_code)->get();
        
        foreach($galleryImageDelete as $gadelete){
            if(File::exists('backend/itemimage/itemimagegallery/'.$gadelete->iGmage)){
                File::delete('backend/itemimage/itemimagegallery/'.$gadelete->iGmage);}

                $gdid = itemGallery::find($gadelete->id);
                $gdid->delete();
        }
        $deleteItem->delete();
        return redirect()->route('item.manage');
    }
}
