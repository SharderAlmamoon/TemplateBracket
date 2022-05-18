
@extends('backend.masterTemplate.template')
@section('contact')
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Dashboard</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
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
                        <input type="text" name="pname" placeholder="enter Product name" class="form-control" id="pname">
                      </div>
                      <div class="form-group">
                        <label for="pdescription">Product Description : </label>
                        <textarea name="pdescription" id="pdescription" cols="10" rows="4"placeholder="enter Product Description" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                        <select name="pcategory"  class="form-control">
                          <option value="">----Category----</option>
                          <option value="Mans">Mans</option>
                          <option value="WoMan">WoMan</option>
                          <option value="kids">Kids</option>
                          <option value="ledis">Ledis</option>
                          <option value="jewelary">jewelary</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <select name="psize" class="form-control">
                          <option value="">----Size----</option>
                          <option value="Ss">SS</option>
                          <option value="S">S</option>
                          <option value="M">M</option>
                          <option value="L">L</option>
                          <option value="XL">XL</option>
                          <option value="XXL">XXL</option>
                        </select>
                      </div>
                  </div><div class="col-md-6">
                    <div class="form-group">
                          <label for="pcostprice">Product CostPrice : </label>
                          <input type="text" name="pcostprice" placeholder="enter Product CostPrice" class="form-control" id="pcostprice">
                     </div> 
                     <div class="form-group">
                          <label for="psellprice">Product SellPrice : </label>
                          <input type="text" name="psellprice" placeholder="enter Product SellPrice" class="form-control" id="psellprice">
                     </div>

                     <div class="form-group">
                          <label for="pquantity">Product Quantity : </label>
                          <input type="text" name="pquantity" placeholder="enter Product Quantity" class="form-control" id="pquantity">
                     </div>
                    <div class="form-group">
                        <select name="pstatus"  class="form-control">
                          <option value="">----Status----</option>
                          <option value="1">Active</option>
                          <option value="2">Inactive</option>
                        </select>
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
