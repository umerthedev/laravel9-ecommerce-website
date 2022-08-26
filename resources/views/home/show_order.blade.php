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

        {{-- SHow Cart strat --}}

        

        {{-- Show Cart End --}}



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