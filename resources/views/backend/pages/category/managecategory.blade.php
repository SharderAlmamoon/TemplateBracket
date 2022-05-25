
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

      <!-- ADD CATEGORYMODAL -->
      <!-- Modal -->
      <div class="modal fade" id="AddCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <!-- CategoryName -->
             <div class="form-group">
                <label for="">Category Name : </label>
                <input type="text" class="form-control name" id="" placeholder="ENTEG CATEGORY NAME">
                <span class="text-danger nameError"></span>
              </div>
             <!-- CategoryName END -->
             <!-- description -->
             <div class="form-group">
               <label for="">Category description : </label>
               <textarea class="description form-control" id="" placeholder="ENTEG CATEGORY DESCRIPTION" cols="8" rows="2"></textarea>
                <span class="text-danger descriptionError"></span>
             </div>
             <!-- description END -->
            <!-- CATEGORY tag -->
              <div class="form-group">
                <label for="">Category Tag : </label>
                <input type="text" class="form-control tag" id="" placeholder="ENTEG CATEGORY tag">
                <span class="text-danger tagError">
              </div>
             <!-- CATEGORY tag  END -->

            <!-- CATEGORY tag -->
              <div class="form-group">
                <label for="">Category Status : </label>
               <select class="form-control status" id="">
                 <option value="">--select--</option>
                 <option value="1">Active</option>
                 <option value="2">Inactive</option>
               </select>
                <span class="text-danger statusError"></span>
              </div>
             <!-- CATEGORY tag  END -->
            </div>
            <div class="modal-footer">
              <button  type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-sm btn-primary addCategory">Add Category</button>
            </div>
          </div>
        </div>
      </div>
      <!-- ADD CATEGORYMODAL END -->

      <!--EDIT CATEGORYMODAL -->
      <!-- Modal -->
      <div class="modal fade" id="EditCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <!-- CategoryName -->
             <div class="form-group">
                <label for="">Category Name : </label>
                <input type="text" class="form-control" id="name" placeholder="ENTEG CATEGORY NAME">
                <span class="text-danger nameError"></span>
              </div>
             <!-- CategoryName END -->
             <!-- description -->
             <div class="form-group">
               <label for="">Category description : </label>
               <textarea class=" form-control" id="description" placeholder="ENTEG CATEGORY DESCRIPTION" cols="8" rows="2"></textarea>
                <span class="text-danger descriptionError"></span>
             </div>
             <input type="hidden" id="id" class="form-control">
             <!-- description END -->
            <!-- CATEGORY tag -->
              <div class="form-group">
                <label for="">Category Tag : </label>
                <input type="text" class="form-control " id="tag" placeholder="ENTEG CATEGORY tag">
                <span class="text-danger tagError">
              </div>
             <!-- CATEGORY tag  END -->

            <!-- CATEGORY tag -->
              <div class="form-group">
                <label for="">Category Status : </label>
               <select class="form-control " id="status">
                 <option value="">--select--</option>
                 <option value="1">Active</option>
                 <option value="2">Inactive</option>
               </select>
                <span class="text-danger statusError"></span>
              </div>
             <!-- CATEGORY tag  END -->
            </div>
            <div class="modal-footer">
              <button  type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-sm btn-primary UpdateCategory">Update Category</button>
            </div>
          </div>
        </div>
      </div>
      <!--EDIT CATEGORYMODAL END -->

      <!--DELETE CATEGORYMODAL -->
      <!-- Modal -->
      <div class="modal fade" id="DELETEcategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title ml-5" id="exampleModalLongTitle">DELLETE CATEGORY </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pl-3">
              <div class="text-warning font-weight-bold display-4">ARE YOU SURE WANT TO DELETE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Category&#128557;</div>
            <input type="hidden" id="iddddddd">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">close</button>
              <button type="button" class="btn btn-sm btn-danger Dcategory">Delete Category</button>
            </div>
          </div>
        </div>
      </div>
      <!--DELETE CATEGORYMODAL END -->

      <div class="br-pagebody">
      <div class="msg"></div>
        <div class="row row-sm">
          <div class="col-sm-12">
            <div class="card p-3 shadow-base">
              <div class="ml-auto pr-5 pb-2">
                <button data-target="#AddCategory" data-toggle="modal" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> &nbsp;Add Category</button>
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Categoryname</th>
                    <th>description</th>
                    <th>Tag</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                  <tbody class="tbody">
                     <!-- <tr>
                       <td>1</td>
                       <td>BLOG</td>
                       <td>FORM CANAGA</td>
                       <td>HUDAI</td>
                       <td>ACTIVE</td>
                       <td>
                         <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit"></i></a>
                         <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ProductModal"><i class="fa fa-trash"></i></button>
                       </td>
                     </tr> -->
                     </tbody>
              </table>
  	
          </div>
        </div>
      </div>
     </div><!-- row -->
@endsection
