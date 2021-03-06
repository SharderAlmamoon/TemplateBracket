
@extends('backend.masterTemplate.template')
@section('contact')
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Dashboard</h4>
        </div>
        <div class="ml-auto px-5">
          <a href="{{Route('dashboard')}}">Home</a> /
          <a href="{{Route('manage')}}">allProduct</a>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="row row-sm">
          <div class="col-sm-12">
            <div class="card p-3 shadow-base">
              <form action="{{ Route('store') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="pname">Product name : </label>
                        <input type="text" value="{{old('pname')}}" name="pname" placeholder="enter Product name" class="form-control" id="pname">
                        <span class="text-danger">
                            @error('pname')
                              {{$message}}
                            @enderror
                        </span>
                      </div>
                      <div class="form-group">
                        <label for="pdescription">Product Description : </label>
                        <textarea name="pdescription"  id="pdescription" cols="10" rows="4"placeholder="enter Product Description" class="form-control">{{old('pdescription')}}</textarea>
                        <span class="text-danger">
                            @error('pdescription')
                              {{$message}}
                            @enderror
                        </span>
                      </div>
                      <div class="form-group">
                        <select name="pcategory"  class="form-control">
                          <option value="">----Category----</option>
                          <option value="Mans" {{old('pcategory') =='Mans' ? 'selected' : '' }}>Mans</option>
                          <option value="WoMan" {{old('pcategory') =='WoMan' ? 'selected' : '' }}>WoMan</option>
                          <option value="kids" {{old('pcategory') =='kids' ? 'selected' : '' }}>Kids</option>
                          <option value="ledis" {{old('pcategory') =='ledis' ? 'selected' : '' }}>Ledis</option>
                          <option value="jewelary" {{old('pcategory') =='jewelary' ? 'selected' : '' }}>jewelary</option>
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
                          <option value="Ss" {{old('psize') =='Ss' ? 'selected' : '' }} >SS</option>
                          <option value="S" {{old('psize') =='S' ? 'selected' : '' }} >S</option>
                          <option value="M" {{old('psize') =='M' ? 'selected' : '' }} >M</option> 
                          <option value="L" {{old('psize') =='L' ? 'selected' : '' }} >L</option>
                          <option value="XL"{{old('psize') =='XL' ? 'selected' : '' }} >XL</option>
                          <option value="XXL" {{old('psize') =='XXL' ? 'selected' : '' }} >XXL</option>
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
                          <input type="text" name="pcostprice" value="{{old('pcostprice')}}" placeholder="enter Product CostPrice" class="form-control" id="pcostprice">
                           <span class="text-danger">
                            @error('pcostprice')
                              {{$message}}
                            @enderror
                        </span>
                     </div> 
                     <div class="form-group">
                          <label for="psellprice">Product SellPrice : </label>
                          <input type="text" value="{{old('psellprice')}}" name="psellprice" placeholder="enter Product SellPrice" class="form-control" id="psellprice">
                           <span class="text-danger">
                            @error('psellprice')
                              {{$message}}
                            @enderror
                        </span>
                     </div>

                     <div class="form-group">
                          <label for="pquantity">Product Quantity : </label>
                          <input type="text" value="{{old('pquantity')}}" name="pquantity" placeholder="enter Product Quantity" class="form-control" id="pquantity">
                      <span class="text-danger">
                            @error('pquantity')
                              {{$message}}
                            @enderror
                        </span>
                     </div>
                    <div class="form-group">
                        <select name="pstatus"  class="form-control">
                          <option value="">----Status----</option>
                          <option value="1" {{old('pstatus') =='1' ? 'selected' : '' }}>Active</option>
                          <option value="2" {{old('pstatus') =='2' ? 'selected' : '' }}>Inactive</option>
                        </select>
                     <span class="text-danger">
                            @error('pstatus')
                              {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary form-control">Add Product</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
