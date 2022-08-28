<!DOCTYPE html>
<html>
   <head>
     @include('home.css')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>

      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>

      <!-- why section -->
      @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.newarraival')
      <!-- end arrival section -->
     
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->

      <!-- Comments and replies section Start -->
      
   <div style="text-align: center;padding-bottom:30px">
         <h1 style="font-size:30px; text-align:center; padding-top:20px; padding-bottom:20px">Comments</h1>
      <form action="">
         <textarea style="height:150px; width:600px; text-align:center;" name="" placeholder="Your comments here"></textarea>
         <br>
        <button  style="pa" class="btn btn-primary text-dark" type="submit" name="submit" value="Submit">Submit</button>
      </form>
   </div>
   <div style="padding-left:20%">
      <h1 style="font-size:30px;padding-bottom:30px">All Comments</h1>
      <div style="margin-top:10px">
         <b>Umer</b>
         <p>This is my first comment</p>
         <a href="javascript:void(0)"oneclick="reply(this);">Reply</a>
      </div>
      <div style="margin-top:10px">
         <b>Umer</b>
         <p>This is my first comment</p>
         <a href="javascript:void(0);" oneclick="reply(this);">Reply</a>
      </div>
      <div style="margin-top:10px">
         <b>Umer</b>
         <p>This is my first comment</p>
         <a href="javascript:void(0);" oneclick="reply(this);">Reply</a>
         
      </div>
      <div style="display:none" class="replyDiv">
         <textarea name="" style="height: 100px; width: 500px" placeholder="Write Your Comments Here"></textarea> <br>
         <a href="" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 10px;">Reply</a>
      </div>
   </div>
  










      <!-- Comments and replies section End -->










      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->

      <!-- client section -->
      @include('home.client')
      <!-- end client section -->

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->

      <div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By <a href="#">IsDB Students</a><br>
         
            Distributed By <a href="#" target="_blank">Umer</a>
         
         </p>
      </div>
      <script>
         function reply(caller) {
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
         }
      </script>
      @include('home.script');
      
   </body>
</html>