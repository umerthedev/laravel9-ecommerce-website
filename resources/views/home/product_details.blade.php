<!DOCTYPE html>
<html>
   <head>
     @include('home.css');

       @include('partial.pro_details ')
       
   </head>
   <body>

      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header');
         <!-- end header section -->
         
         <div class="super_container">            
            <div class="single_product">
                <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
                    <div class="row">
                        <div class="col-lg-2 order-lg-1 order-2">
                            <ul class="image_list">
                                <li data-image="https://i.imgur.com/21EYMGD.jpg"><img src="{{url('product/'. $product->image)}}" alt=""></li>
                                <li data-image="https://i.imgur.com/DPWSNWd.jpg"><img src="{{url('product/'. $product->image)}}" alt=""></li>
                                <li data-image="https://i.imgur.com/HkEiXfn.jpg"><img src="{{url('product/'. $product->image)}}" alt=""></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 order-lg-2 order-1">
                            <div class="image_selected"><img src="{{url('product/'. $product->image)}}" alt=""></div>
                        </div>
                        <div class="col-lg-6 order-3">
                            <div class="product_description">
                                
                                <div class="product_name">
                                    <h3>
                                    {{$product->title}}
                                    </h3>
                                </div>
                                
                                @if ($product->discount_price!=null)
                                <div> <span class="product_price">TK{{$product->discount_price}}</span> <strike class="product_discount"> <span style='color:black'>
                                    TK{{$product->price}} <span> </strike> </div>
                                
                                    @else
                                    <h6>
                                     TK{{$product->price}}
                                     </h6>
                                    @endif
                                    
                                    
                                    <hr class="singleline">
                                    <h1 style="text-align: center; margin:20px">Product description</h1>
                                    <div >
                                        <p>
                                            {{$product->description}}
                                        </p>
                                    </div>
                              
                                    <hr class="singleline">

                                    <div >
                                        <p>
                                           Product Category : {{$product->catagory}}
                                        </p>
                                    </div>
                                    <hr class="singleline">

                                    <div >
                                        <p>
                                           Product Quantity : {{$product->quantity}}
                                        </p>
                                    </div>

                                    <hr class="singleline">
                                    <br>

                                
                               
                                <div class="row">
                                    <div class="col-xs-6" style="margin-left: 13px;">
                                        <form action="{{url('add_cart',$product->id)}}" method="POST">
                                            @csrf
                                            <div class="row">
                                               <div class="col-md-12">
                                                  <input type="number" name="quantity" value="1" min="1" >
                                               </div>
                                               <div class="col-md-12">
                                                  <input  type="submit" value="Add To cart">
                                               </div>
                                               <div class="col-md-12" style="margin-top: 20px;">
                                                <input  type="submit" value="  Buy Now    ">
                                               </div>
                                           </div>
                                          </form>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     

      <!-- footer start -->
      @include('home.footer');
      <!-- footer end -->

      <div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By <a href="#">IsDB Students</a><br>
         
            Distributed By <a href="#" target="_blank">Umer</a>
         
         </p>
      </div>
      @include('home.script');
   </body>
</html>