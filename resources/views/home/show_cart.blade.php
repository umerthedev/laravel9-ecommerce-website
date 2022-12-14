<!DOCTYPE html>
<html>
   <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     @include('home.css')
     <style>
        .payment-info {
  background: rgb(48, 45, 44);
  padding: 10px;
  border-radius: 6px;
  color: #fff;
  font-weight: bold;
}

.product-details {
  padding: 10px;
}

body {
  background: #eee;
}

.cart {
  background: #fff;
}

.p-about {
  font-size: 12px;
}

.table-shadow {
  -webkit-box-shadow: 5px 5px 15px -2px rgba(0,0,0,0.42);
  box-shadow: 5px 5px 15px -2px rgba(0,0,0,0.42);
}

.type {
  font-weight: 400;
  font-size: 10px;
}

label.radio {
  cursor: pointer;
}

label.radio input {
  position: absolute;
  top: 0;
  left: 0;
  visibility: hidden;
  pointer-events: none;
}

label.radio span {
  padding: 1px 12px;
  border: 2px solid #f84d4d;
  display: inline-block;
  color: #fa4d4d;
  border-radius: 3px;
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 300;
}

label.radio input:checked + span {
  border-color: #fff;
  background-color: rgb(252, 173, 170);
  color: #fff;
}

.credit-inputs {
  background: rgb(247, 74, 68);
  /* color: #fff !important; */
  border-color: rgb(250, 104, 104);
}

.credit-inputs::placeholder {
  color: rgb(255, 81, 96);
  font-size: 13px;
}

.credit-card-label {
  font-size: 9px;
  font-weight: 300;
}

.form-control.credit-inputs:focus {
  /* background: rgb(255, 255, 255); */
  border: rgb(25, 25, 32);
}

.line {
  border-bottom: 1px solid rgb(102,102,221);
}

.information span {
  font-size: 12px;
  font-weight: 500;
}

.information {
  margin-bottom: 5px;
}

.items {
  -webkit-box-shadow: 5px 5px 4px -1px rgba(0,0,0,0.25);
  box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.08);
}

.spec {
  font-size: 11px;
}
     </style>
   </head>
   <body>

      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

        {{-- SHow Cart strat --}}

        <div class="container mt-5 p-3 rounded cart">
            <div class="row no-gutters">

              @if(session()->has('message'))

                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}

                </div>


                @endif
                <div class="col-md-8">
                    <div class="product-details mr-2">
                        <div class="d-flex flex-row align-items-center"><i class="fa fa-long-arrow-left"></i><span class="ml-2">Continue Shopping</span></div>
                        <hr>
                        <h6 class="mb-0">Shopping cart</h6>
                        <div class="d-flex justify-content-between"><span>Here is your all products</span>
                            <div class="d-flex flex-row align-items-center"><span class="text-black-50">Sort by:</span>
                                <div class="price ml-2"><span class="mr-1">price</span><i class="fa fa-angle-down"></i></div>
                            </div>
                        </div>
                        <table class="table">
                          <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col"> Product Title</th>
                            <th scope="col">Product Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Actionn</th>
                          </tr>
                        </thead>

                        <tbody>
                          @php 
                          $totalprice= 0;
                          @endphp
                          @foreach ($cart as $c)
                              
                           <tr>
                            <th scope="row">1</th>
                            <td><div class="ml-2"><span class="font-weight-bold d-block">{{$c->product_title}}</span></div></td>
                            <td>{{$c->quantity}}</td>
                            <td>{{$c->price}} tk</td>
                            <td><div class="d-flex flex-row"><img class="rounded" src="{{url('product/' . $c->image)}}" width="40"></td>
                            <td><a class="btn btn-danger text-dark" onclick="confirmation(event)" href="{{url('/remove_cart',$c->id)}}">Remove</a></td>
                          </tr>

                          <?php $totalprice=$totalprice + $c->price?>
                          @endforeach

                         

                          
                        </tbody>
                        </table>

                        <?php $deliverycharge=50;?>

                        {{-- <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                            <div class="d-flex flex-row"><img class="rounded" src="https://i.imgur.com/QRwjbm5.jpg" width="40">
                                <div class="ml-2"><span class="font-weight-bold d-block">Iphone 11 pro</span><span class="spec">256GB, Navy Blue</span></div>
                            </div>
                            <div class="d-flex flex-row align-items-center"><span class="d-block">2</span><span class="d-block ml-5 font-weight-bold">$900</span><i class="fa fa-trash-o ml-3 text-black-50"></i></div>
                        </div> --}}
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="payment-info">
                        <div class="d-flex justify-content-between align-items-center"><span>Card details</span><img class="rounded" src="https://i.imgur.com/WU501C8.jpg" width="30"></div>
                        <span class="type d-block mt-3 mb-1">Card type</span><label class="radio"> <input type="radio" name="card" value="payment" checked> <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png"/></span> </label>
    
                        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/visa.png"/></span> </label>
    
                        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="images/bkash.png"/></span> </label>
    
    
                        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="images/nagad.png"/></span> </label>

                        {{-- <label class="radio"> <input  type="radio" name="card" value="payment"> <span><img width="48" src="images/cod.jpg"/></span> </label> --}}
                        
                        {{-- <div><label class="credit-card-label text-dark">Name on card</label><input type="text" class="form-control credit-inputs" placeholder="Name"></div>
                        <div><label class="credit-card-label">Card number</label><input type="text" class="form-control credit-inputs" placeholder="0000 0000 0000 0000"></div>
                        <div class="row">
                            <div class="col-md-6"><label class="credit-card-label">Date</label><input type="text" class="form-control credit-inputs" placeholder="12/24"></div>
                            <div class="col-md-6"><label class="credit-card-label">CVV</label><input type="text" class="form-control credit-inputs" placeholder="342"></div>
                        </div> --}}
                        <hr class="line">
                        <div class="d-flex justify-content-between information"><span>Subtotal</span><span> {{$totalprice}} tk</span></div>
                        <div class="d-flex justify-content-between information"><span>Delivery Charge</span><span>{{$deliverycharge}} tk</span></div>
                        <div class="d-flex justify-content-between information"><span>Total(Incl. taxes)</span><span>{{$totalprice+$deliverycharge}} tk</span></div><button class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="button"><span>{{$totalprice+$deliverycharge}} tk</span><span><a href="{{url('checkout')}}">Online Payment</a><i class="fa fa-long-arrow-right ml-1"></i></span></button>
                        <button class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="button"><span>{{$totalprice+$deliverycharge}} tk</span><span><a href="{{url('cash_order')}}"> Cash On Delivery</a><i class="fa fa-long-arrow-right ml-1"></i></span></button></div>
                        
                </div>
            </div>
        </div>

        {{-- Show Cart End --}}



      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->

      <div class="cpy_">
         <p class="mx-auto">?? 2022 All Rights Reserved By <a href="#">IsDB Students</a><br>
         
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
  
              title: "Are you sure to cancel this product",
  
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