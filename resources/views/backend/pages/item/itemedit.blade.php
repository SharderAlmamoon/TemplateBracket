
@extends('backend.masterTemplate.template')
@section('contact')
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Product EDIT</h4>
        </div>
        <div class="ml-auto px-5">
          <a href="{{Route('dashboard')}}">Home</a>/
          <a href="{{Route('manage')}}">ManageProduct</a>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="row row-sm">
          <div class="col-sm-12">
            <div class="card p-3 shadow-base">
              <form action="{{Route('update',$product->id)}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="pname">Product name : </label>
                        <input type="text" value="{{old('pname',$product->pname)}}" name="pname" placeholder="enter Product name" class="form-control" id="pname">
                        <span class="text-danger">
                            @error('pname')
                              {{$message}}
                            @enderror
                        </span>
                      </div>
                      <div class="form-group">
                        <label for="pdescription">Product Description : </label>
                        <textarea name="pdescription"  id="pdescription" cols="10" rows="4"placeholder="enter Product Description" class="form-control">{{old('pdescription',$product->pdescription)}}</textarea>
                        <span class="text-danger">
                            @error('pdescription')
                              {{$message}}
                            @enderror
                        </span>
                      </div>
                      <div class="form-group">
                        <select name="pcategory"  class="form-control">
                          <option value="">----Category----</option>

                          <option value="Mans" @if($product->pcategory == 'Mans') selected @endif>Mans</option>

                          <option value="WoMan" @if($product->pcategory == 'WoMan') selected @endif>WoMan</option>

                          <option value="kids" @if($product->pcategory == 'kids') selected @endif>Kids</option>

                          <option value="ledis" @if($product->pcategory == 'ledis') selected @endif>Ledis</option>

                          <option value="jewelary" @if($product->pcategory == 'jewelary') selected @endif>jewelary</option>
                        </select>
                         <span class="text-danger">
                            @error('pcategory')
                              {{$message}}
                            @enderror
                        </span>
                      </div>
                      <div class="form-group">
                        <select name="psize" class="form-control">
                          <option value="">----Size----</option>
                          <option value="Ss" @if($product->psize == 'Ss') selected @endif>SS</option>
                          <option value="S" @if($product->psize == 'S') selected @endif>S</option>
                          <option value="M" @if($product->psize == 'M') selected @endif>M</option> 
                          <option value="L" @if($product->psize == 'L') selected @endif>L</option>
                          <option value="XL" @if($product->psize == 'XL') selected @endif>XL</option>
                          <option value="XXL" @if($product->psize == 'XXL') selected @endif>XXL</option>
                        <span class="text-danger">
                            @error('psize')
                              {{$message}}
                            @enderror
                        </span>
                       </select>
                      </div>
                  </div><div class="col-md-6">
                    <div class="form-group">
                          <label for="pcostprice">Product CostPrice : </label>
                          <input type="text" name="pcostprice" value="{{old('pcostprice',$product->pcostprice)}}" placeholder="enter Product CostPrice" class="form-control" id="pcostprice">
                           <span class="text-danger">
                            @error('pcostprice')
                              {{$message}}
                            @enderror
                        </span>
                     </div> 
                     <div class="form-group">
                          <label for="psellprice">Product SellPrice : </label>
                          <input type="text" value="{{old('psellprice',$product->psellprice)}}" name="psellprice" placeholder="enter Product SellPrice" class="form-control" id="psellprice">
                           <span class="text-danger">
                            @error('psellprice')
                              {{$message}}
                            @enderror
                        </span>
                     </div>

                     <div class="form-group">
                          <label for="pquantity">Product Quantity : </label>
                          <input type="text" value="{{old('pquantity',$product->pquantity)}}" name="pquantity" placeholder="enter Product Quantity" class="form-control" id="pquantity">
                      <span class="text-danger">
                            @error('pquantity')
                              {{$message}}
                            @enderror
                        </span>
                     </div>
                    <div class="form-group">
                        <select name="pstatus"  class="form-control">
                          <option value="">----Status----</option>
                          <option value="1" @if($product->pstatus == '1') selected @endif>Active</option>
                          <option value="2" @if($product->pstatus == '2') selected @endif>Inactive</option>
                        </select>
                     <span class="text-danger">
                            @error('pstatus')
                              {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-dark form-control">Update Product</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
