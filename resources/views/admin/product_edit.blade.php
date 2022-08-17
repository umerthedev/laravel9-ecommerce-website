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
                    <h6 id="h1" class="mb-0 text-uppercase">Edit Product</h6>
                     <hr>
                    <form class="row g-3" action="{{url('/update_product',$product->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="col-12">
                        <label class="form-label">Title</label>
                        <input id="inputcat" type="text" class="form-control text-dark" name="title" required style="background-color: aliceblue" value="{{$product->title}}">
                      </div>
                      <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea id="inputcat" class="form-control text-dark" style="background-color: aliceblue" name="description" value="{{$product->description}}"></textarea>
                      </div>                                          
                      <div class="col-6">
                        <label class="form-label">Price</label>
                        <input id="inputcat" type="text" class="form-control text-dark" name="price" required style="background-color: aliceblue" value="{{$product->price}}">
                      </div>
                      <div class="col-6">
                        <label class="form-label">Discount Price</label>
                        <input id="inputcat" type="text" class="form-control text-dark" name="disprice" style="background-color: aliceblue" value="{{$product->discount_price}}">
                      </div>
                      <div class="col-6">
                        <label class="form-label">Quantity</label>
                        <input id="inputcat" type="text" class="form-control text-dark" required name="quantity" style="background-color: aliceblue" value="{{$product->quantity}}">
                      </div>
                      <div class="col-6">
                        <label class="form-label">Current Product image</label>
                        <img height="100px" width="100px" src="{{url('product/'. $product->image)}}" alt="">
                      </div>
                      <div class="col-12">
                        <label class="form-label">Change Product image</label>
                        <input  type="file" class="form-control" name="image">
                        {{-- <label class="form-label">Select Category</label> --}}
                      </div>
                      <div class="col-6">
                        <select class="form-select" required  name="catagory" >
                          <option value="{{$product->catagory}}" selected>{{$product->catagory}}</option>
                          @foreach ($catagory as $catagory)
                          <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                          @endforeach
                        </select>
                      </div>                                   
                         <div class="col-12" id="sub">
                        <button type="submit"  class="btn waves-effect waves-light btn-info ">Update Product</button>
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