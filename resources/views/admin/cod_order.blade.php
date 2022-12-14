

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
     #tbl {
     max-height: auto;
     overflow: auto;
     display:inline-block;
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
              <h1 style="text-align: center; margin-bottom:20px">Cash On Delivery Orders</h1>

                @if(session()->has('message'))

                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}

                </div>               

                @endif
                <div>
                    <ul class="navbar-nav w-100">
                      <li class="nav-item w-100">
                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex" action="{{url('search')}}" method="get">
                          @csrf
                          <input type="text" class="form-control text-white"name="search" placeholder="Search Orders by Name, Number, Phone, Email">
                          <input style="margin-left: 10px" type="submit" class="btn btn-info" value="Search">
                        </form>
                      </li>
                    </ul> 
               </div>        

                <table class="table " id="tbl" >
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
                      <th scope="col">Delivery Status</th>
                      <th scope="col" style="text-align: center">Action</th>
                      <th scope="col">Invoice</th>
                      <th scope="col">Send Mail</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($cod_order as $cod_order)                         
         
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
                       <td scope="row">{{$cod_order->delivery_status}}</td>    
                       
                       
                       <td scope="row">
                            @if($cod_order->delivery_status=='Processing')
                              <a href="{{url('delivered',$cod_order->id)}}" onclick="return confirm('Are You Sure Make This Order As Delivered???')" class="btn btn-success">Delivered</a>   
                            @else
                              <p style="color: aquamarine">Delivered</p> 
                            @endif  
                                          
                       
                            {{-- @if($cod_order->delivery_status=='Processing') --}}
                              <a href="{{url('cancel',$cod_order->id)}}" class="btn btn-danger">Cancel</a>
                            {{-- @else
                              <p style="color: red">Canceled</p> 
                            @endif                                       --}}
                         
                              <a href="{{url('reset',$cod_order->id)}}" class="btn btn-danger">Reset</a>
                      </td>                                       
                       <td>
                              <a href="{{url('print_pdf',$cod_order->id)}}" class="btn btn-secondary">Invoice</a>
                       </td>                                       
                       <td>
                              <a href="{{url('send_mail',$cod_order->id)}}" class="btn btn-info">Send Mail</a>
                       </td>                                       
                                                             
                  </tr>
                  @empty
                  <tr>
                    <td colspan="20">
                        No Data Found 
                    </td>
                  </tr>
                    @endforelse
                       
                  </tbody>

                </table>
                
                

           </div>
        </div>

        
          
          
    @include('admin.script')
    
  </body>
</html>