

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

                <h1 style="text-align: center; margin-bottom:40px">Paid Orders</h1>


                <table class="table" style="padding-top:100px">
                  <thead>
                    <tr>
                      
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Address</th>
                      <th scope="col">Phone</th>                                          
                      <th scope="col">Amount</th>
                      <th scope="col">Status</th>
                      <th scope="col">Transaction_id</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($op_order as $op_order)                         
         
                    <tr>                                 
                       <td scope="row">{{$op_order->name}}</td>                                           
                       <td scope="row">{{$op_order->email}}</td>                                           
                       <td scope="row">{{$op_order->address}}</td>                                           
                       <td scope="row">{{$op_order->phone}}</td>                                           
                       <td scope="row">{{$op_order->amount}}</td>                                           
                       <td scope="row">{{$op_order->status}}</td>                                           
                       <td scope="row">{{$op_order->transaction_id}}</td>                                           
                                                               
                  </tr>
                    @endforeach
                       
                  </tbody>

                </table>
                
                

           </div>
        </div>

        
          
          
    @include('admin.script')
  </body>
</html>