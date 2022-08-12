<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style>
        #inputcat{
            color: rgb(255, 255, 255);
            
        }
        #sub{
            text-align: right;
            margin-top: 10px;
        }
        #h1{
            text-align: center;
            padding: 10px;
        }
        #catdata{
          background-color: aliceblue;
          
        }
        #catdata{
          color: black;
        }
    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
       
        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))

                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}

                </div>


                @endif
                
               <div class="card" >
                  <div class="card-body">
                    <div class="border p-3 rounded">
                    <h6 id="h1" class="mb-0 text-uppercase">Add Product</h6>
                     <hr>
                    <form class="row g-3" action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="col-12">
                        <label class="form-label">Title</label>
                        <input id="inputcat" type="text" class="form-control text-dark" required>
                      </div>
                      <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea id="inputcat" class="form-control " rows="2" cols="2" ></textarea>
                      </div>                                          
                      <div class="col-6">
                        <label class="form-label">Price</label>
                        <input id="inputcat" type="text" class="form-control text-dark" required>
                      </div>
                      <div class="col-6">
                        <label class="form-label">Discount Price</label>
                        <input id="inputcat" type="text" class="form-control text-dark">
                      </div>
                      <div class="col-6">
                        <label class="form-label">Quantity</label>
                        <input id="inputcat" type="text" class="form-control text-dark" required>
                      </div>
                      <div class="col-12">
                        <label class="form-label">Product image</label>
                        <input  type="file" class="form-control" required>
                        {{-- <label class="form-label">Select Category</label> --}}
                      </div>
                      <div class="col-6">
                        <select class="form-select" required >
                          <option selected>Select Category</option>
                           @foreach ($catagory as $catagory)
                          <option value="3">{{$catagory->catagory_name}}</option>
                          @endforeach
                        </select>
                      </div>
                      
                      
                      
                      <div class="col-12" id="sub">
                        <button type="submit"  class="btn waves-effect waves-light btn-info ">Submit</button>
                     </div>
                    </div>
                 </form>
               </div>
            </div>
         </div> 
       </div>
    </div>




   <!-- content-wrapper ends -->
     @include('admin.script')
  </body>
</html>