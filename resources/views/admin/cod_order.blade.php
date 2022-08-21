

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
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

                <h1 style="text-align: center; margin-bottom:40px">Cash On Delivery Orders</h1>


                <table class="table" style="padding-top:100px">
                  <thead>
                    <tr>
                      
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Address</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Product title</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Price</th>
                      <th scope="col">Image</th>
                      <th scope="col">Payment Status</th>
                      {{-- <th scope="col">Delivery Status</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cod_order as $cod_order)                         
         
                    <tr>                                 
                       <td scope="row">{{$cod_order->name}}</td>                                           
                       <td scope="row">{{$cod_order->email}}</td>                                           
                       <td scope="row">{{$cod_order->address}}</td>                                           
                       <td scope="row">{{$cod_order->phone}}</td>                                           
                       <td scope="row">{{$cod_order->product_title}}</td>                                           
                       <td scope="row">{{$cod_order->quantity}}</td>                                           
                       <td scope="row">{{$cod_order->price}}</td>                                           
                       <td scope="row"><img src="{{url('product/'. $cod_order->image)}}" alt=""></td>                                           
                       <td scope="row">{{$cod_order->payment_status}}</td>                                           
                       {{-- <td scope="row">{{$cod_order->delivery_status}}</td>                                            --}}
                  </tr>
                    @endforeach
                       
                  </tbody>

                </table>
                
                

           </div>
        </div>

        
          
          
    @include('admin.script')
  </body>
</html>