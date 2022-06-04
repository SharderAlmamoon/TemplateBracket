
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
                    <th>item_code</th>
                    <th>iname</th>
                    <th>idescription</th>
                    <th>icategory</th>
                    <th>istatus</th>
                    <th>iimage</th>
                    <th>Action</th>
                  </tr>
                </thead>
                  <tbody>
                    @php $sl=1; @endphp
                     @foreach($itemall as $itema)
                     <tr>
                       <td>{{$sl}}</td>
                       <td>{{$itema->item_code}}</td>
                       <td>{{$itema->iname}}</td>
                       <td>{{$itema->idescription}}</td>
                       <td>{{$itema->category->name}}</td>
                       <td>
                         @if($itema->istatus==1)
                         <span class="badge badge-info">Active</span>
                         @else
                         <span class="badge badge-warning">Inactive</span>
                         @endif
                       </td>
                       <td>
                         <img height="80" src="{{asset('backend/itemimage/'.$itema->iimage)}}" alt="">
                      </td>
                       <td>
                         <a class="btn btn-sm btn-success" href="{{Route('item.edit',$itema->id)}}"><i class="fa fa-edit"></i></a>
                         <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ProductModal{{$itema->id}}"><i class="fa fa-trash"></i></button>
                       </td>
                     </tr>
                     <!-- MODAL -->
                     <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="ProductModal{{$itema->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a href="{{ Route('item.delete',$itema->id) }}" class="btn btn-danger">Confirm</a>
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
