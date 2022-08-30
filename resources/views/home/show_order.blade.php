<!DOCTYPE html>
<html>
   <head>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     @include('home.css')  
     <style>
             .param {
                 margin-bottom: 7px;
                 line-height: 1.4;
             }
             .param-inline dt {
                 display: inline-block;
             }
             .param dt {
                 margin: 0;
                 margin-right: 7px;
                 font-weight: 600;
             }
             .param-inline dd {
                 vertical-align: baseline;
                 display: inline-block;
             }
             
             .param dd {
                 margin: 0;
                 vertical-align: baseline;
             } 
             
             .shopping-cart-wrap .price {
                 color: #007bff;
                 font-size: 18px;
                 font-weight: bold;
                 margin-right: 5px;
                 display: block;
             }
             var {
                 font-style: normal;
             }
             
             .media img {
                 margin-right: 1rem;
             }
             .img-sm {
                 width: 90px;
                 max-height: 75px;
                 object-fit: cover;
             }
      </style>  
   </head>
   <body>

      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->   
                
         
         
       <div class="card">
         <div class="card-header px-2 py-2" style="text-align: center">
            <h3 class="text-muted mb-0">Thanks for your Order, <span style="color: #ff2d6c;">{{Auth::user()->name}}</span>!</h3>
          </div>
          
           @if(session()->has('message'))

                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}

                </div>


                @endif
         
      <table class="table table-hover shopping-cart-wrap">
         <thead class="text-muted">
         <tr>
           <th scope="col">Product</th>
           <th scope="col" width="120">Quantity</th>
           <th scope="col" width="120">Price</th>
           <th scope="col" width="150">Payment Status</th>
           <th scope="col" width="150">Dalivery Status</th>
           <th scope="col" width="200" class="text-right">Action</th>
         </tr>
         </thead>
         <tbody>
            @foreach($cod_order as $cod_order)
            
         <tr>
            <td>
         <figure class="media">
            <div class="img-wrap"><img src="{{url('product/'. $cod_order->image)}}" class="img-thumbnail img-sm"></div>
            <figcaption class="media-body">
               <h6 class="title text-truncate">{{$cod_order->product_title}}</h6>
               <dl class="param param-inline small">
                 <dt>Size: </dt>
                 <dd>XXL</dd>
               </dl>
               <dl class="param param-inline small">
                 <dt>Color: </dt>
                 <dd>Orange color</dd>
               </dl>
            </figcaption>
         </figure> 
            </td>
            <td> 
               <select class="form-control" disabled>
                  <option>{{$cod_order->quantity}}</option>                  
               </select> 
            </td>
            <td> 
               <div class="price-wrap"> 
                  <var class="price">{{$cod_order->price}}</var>                   
               </div> <!-- price-wrap .// -->
            </td>
            <td> 
               {{$cod_order->payment_status}}
            </td>
            <td> 
               {{$cod_order->delivery_status}}
            </td>
            <td class="text-right"> 

               @if($cod_order->delivery_status=='Processing')
            {{-- <a title="" href="" class="btn btn-outline-success" data-toggle="tooltip" data-original-title="Save to Wishlist"> <i class="fa fa-heart"></i></a>  --}}
            <a href="{{url('cancel_order',$cod_order->id)}}"  onclick="confirmation(event)"  class="btn btn-outline-danger"> × Cancel Order</a>
            @else
            <p class="btn btn-danger" disabled>Not Allow</p>
            @endif
            </td>
         </tr>
         @endforeach
        
         </tbody>
      </table>
         </div> <!-- card.// -->
         
         </div> 
         <!--container end.//-->      
            
         <br>
         <br>
         <br>
      </div>

      <div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By <a href="#">IsDB Students</a><br>
         
            Distributed By <a href="#" target="_blank">Umer</a>
         
         </p>
      </div>

      @include('home.script');
      <script>

         function confirmation(ev) {
   
           ev.preventDefault();
   
           var urlToRedirect = ev.currentTarget.getAttribute('href');  
   
           console.log(urlToRedirect); 
   
           swal({
   
               title: "Are you sure to cancel this Order",
   
               text: "You will not be able to revert this!",
   
               icon: "warning",
   
               buttons: true,
   
               dangerMode: true,
   
           })
   
           .then((willCancel) => {
   
               if (willCancel) {                           
   
                   window.location.href = urlToRedirect;
                    
                 }  
          
           });                  
       }
   
   </script>
   </body>
</html>