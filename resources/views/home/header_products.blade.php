<!DOCTYPE html>
<html>
   <head>
     @include('home.css')    
   </head>
   <body>

      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         <section class="product_section layout_padding">
            <div class="container">
               <div class="heading_container heading_center">
                  <h2>
                     Our <span>products</span>
                  </h2>
                  @if(session()->has('message'))

                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}

                </div>


                @endif
               </div>
               <div class="row">
                 @foreach ($product as $product)
                     
                 
                  <div class="col-sm-6 col-md-4 col-lg-4">
                     <div class="box">
                        <div class="option_container">
                           <div class="options">
                              <a href="{{url('product_details',$product->id)}}" class="option1" style="margin-bottom: 20px">
                             Details
                              </a>
                              <form action="{{url('add_cart',$product->id)}}" method="POST">
                                @csrf
                                <div class="row">
                                   <div class="col-md-12">
                                      <input type="number" name="quantity" value="1" min="1">
                                   </div>
                                   <div class="col-md-12">
                                      <input type="submit" value="Add To cart">
                                      {{-- style="border-radius: 30px;" --}}
                                   </div>
                               </div>
                              </form>
                           </div>
                        </div>
                        <div class="img-box">
                           <img src="product/{{$product->image}}" alt="">
                        </div>
                        <div class="detail-box">
                           <h5>
                             {{$product->title}}
                           </h5>
                           @if ($product->discount_price!=null)
                                                   
                           <h6 style="color: red">
                             TK{{$product->discount_price}}
                           </h6>
                           <h6 style="text-decoration: line-through; color: blue">
                             TK{{$product->price}}
                           </h6>
                           @else
                           <h6>
                             TK{{$product->price}}
                           </h6>
                           @endif
                          
                        </div>
                     </div>
                  </div>
                  @endforeach
                  {{-- <span style="padding-top: 20px">
                    {!!$product->WithQueryString()->links('pagination::bootstrap-5')!!}
                  </span> --}}
                  
            </div>
         </section>


      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->

      <div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By <a href="#">IsDB Students</a><br>
         
            Distributed By <a href="#" target="_blank">Umer</a>
         
         </p>
      </div>
      @include('home.script');
   </body>
</html>