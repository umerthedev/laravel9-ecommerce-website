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
                 
                <table class="table" style="padding-top:100px" >

                    <h1 id="h1">Product list</h1>

                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Descripntion</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Category</th>
                        <th style="text-align: right">Acton</th>
                      </tr>
                    </thead>
                    <tbody>
                            @foreach ($product as $product)                         
                 
                        <tr>                                 
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>
                            <img src="product/{{$product->image}}" alt="">
                        </td>

                        <td>{{$product->catagory}}</td>
                        <td style="text-align: right">
                            <a href="{{url('product_edit',$product->id)}}" class="btn btn-primary">Edit</a>
                            <a onclick="return confirm('Are you sure want to delete this category')" href="{{url('delete_product',$product->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>    
          </div>
     </div>




   <!-- content-wrapper ends -->
     @include('admin.script')
  </body>
</html>