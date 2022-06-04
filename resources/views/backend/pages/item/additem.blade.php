
@extends('backend.masterTemplate.template')
@section('contact')
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Item</h4>
        </div>
        <div class="ml-auto px-5">
          <a href="{{Route('dashboard')}}">Home</a> /
          <a href="{{Route('item.manage')}}">MAnageItem</a>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="row row-sm">
          <div class="col-sm-12">
            <div class="card p-3 shadow-base">
              <form action="{{ Route('item.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="item_code">item_code : </label>
                        <input type="text" value="{{old('item_code')}}" name="item_code" placeholder="enter Item Code" class="form-control" id="item_code">
                        <span class="text-danger">
                            @error('item_code')
                              {{$message}}
                            @enderror
                        </span>
                      </div>
                    <div class="form-group">
                        <label for="iname">item name : </label>
                        <input type="text" value="{{old('iname')}}" name="iname" placeholder="enter iname " class="form-control" id="iname">
                        <span class="text-danger">
                            @error('iname')
                              {{$message}}
                            @enderror
                        </span>
                      </div>
                      <div class="form-group">
                        <label for="idescription">Item Description : </label>
                        <textarea name="idescription"  id="idescription" cols="10" rows="4"placeholder="enter idescription" class="form-control">{{old('idescription')}}</textarea>
                        <span class="text-danger">
                            @error('idescription')
                              {{$message}}
                            @enderror
                        </span>
                      </div>
                      <div class="form-group">
                        <select name="icategory"  class="form-control">
                          <option value="">----ICategory----</option>
                        @foreach($category as $cat)
                          <option value="{{$cat->id}}">{{$cat->name}}}</option>
                          @endforeach
                        </select>
                         <span class="text-danger">
                            @error('icategory')
                              {{$message}}
                            @enderror
                        </span>
                      </div>
                      <div class="form-group">
                        <select name="istatus" class="form-control">
                          <option value="">----istatus----</option>
                          <option value="1">Active</option>
                          <option value="2">Inactive</option>
                         </select>
                        <span class="text-danger">
                            @error('istatus')
                              {{$message}}
                            @enderror
                        </span>
                      </div>
                  </div><div class="col-md-6">
                    <div class="form-group">
                          <label for="iimage">Item Image : </label>
                          <input type="file" name="iimage" class="form-control" id="iimage">
                           <span class="text-danger">
                            @error('iimage')
                              {{$message}}
                            @enderror
                        </span>
                     </div> 
                     <div class="form-group">
                          <label for="iGmage">Item GalleryImage : </label>
                          <input type="file" multiple  name="iGmage[]" placeholder="enter iGmage" class="form-control" id="iGmage">
                           <span class="text-danger">
                            @error('iGmage')
                              {{$message}}
                            @enderror
                        </span>
                     </div>
                     <div class="form-group">
                         <button class="btn btn-dark form-control">Add Item</button>
                     </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
