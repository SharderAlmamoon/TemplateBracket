
@extends('backend.masterTemplate.template')
@section('contact')

      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Manage Product</h4>
        </div>
        <div class="ml-auto px-5">
          <a href="{{Route('dashboard')}}">Home</a>
          
        </div>
      </div>

      <div class="br-pagebody">
        <div class="row row-sm">
          <div class="col-sm-12">
            <div class="card p-3 shadow-base">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>description</th>
                    <th>category</th>
                    <th>size</th>
                    <th>CostPrice</th>
                    <th>SellPrice</th>
                    <th>Quantity</th>
                    <th>status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                  <tbody>
                    @php $sl=1; @endphp
                     @foreach($products as $product)
                     <tr>
                       <td>{{$sl}}</td>
                       <td>{{$product->pname}}</td>
                       <td>{{$product->pdescription}}</td>
                       <td>{{$product->pcategory}}</td>
                       <td>{{$product->psize}}</td>
                       <td>{{$product->pcostprice}}</td>
                       <td>{{$product->psellprice}}</td>
                       <td>{{$product->pquantity}}</td>
                       <td>
                         @if($product->pstatus==1)
                         <span class="badge badge-info">Active</span>
                         @else
                         <span class="badge badge-warning">Inactive</span>
                         @endif
                       </td>
                       <td>
                         <a class="btn btn-sm btn-success" href="{{Route('edit',$product->id)}}"><i class="fa fa-edit"></i></a>
                         <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ProductModal{{$product->id}}"><i class="fa fa-trash"></i></button>
                       </td>
                     </tr>
                     <!-- MODAL -->
                     <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="ProductModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Has Been Deleted</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are You Sure Want To Delete
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <a href="{{ Route('delete',$product->id) }}" class="btn btn-danger">Confirm</a>
      </div>
    </div>
  </div>
</div>



                     <!-- MODAL END -->
                     @php $sl++; @endphp
                     @endforeach
                  </tbody>
              </table>
  	
          </div>
        </div>
      </div>
     </div><!-- row -->
@endsection
