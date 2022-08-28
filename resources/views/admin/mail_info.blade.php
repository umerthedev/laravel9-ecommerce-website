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
                                
                <div class="card" >
                  <div class="card-body">
                    <div class="border p-3 rounded">
                    <h6 id="h1" class="mb-0 text-uppercase">Sanding mail To {{$cod_order->name.' & Mail ID Is : ' . $cod_order->email}}</h6>
                     <hr>
                    <form class="row g-3" action="{{url('send_user_email',$cod_order->id)}}" method="POST" >
                      @csrf
                        <div class="col-12">
                             <label class="form-label">Email greeting</label>
                             <input id="inputcat" type="text" class="form-control text-dark" name="greeting" required style="background-color:       aliceblue">
                       </div>
                       <div class="col-12">
                             <label class="form-label">Email  Firstline</label>
                             <input id="inputcat" type="text" class="form-control text-dark" name="firstline" required style="background-color: aliceblue">
                             
                      </div>                                          
                      <div class="col-12">
                             <label class="form-label">Email  Description</label>
                             <textarea id="inputcat" class="form-control text-dark" style="background-color: aliceblue" name="body"  ></textarea>                             
                      </div>
                      
                      <div class="col-12">
                            <label class="form-label">Email Button</label>
                            <input id="inputcat" type="text" class="form-control text-dark" required name="ebutton" style="background-color:     aliceblue">
                      </div>                 
                      <div class="col-12">
                            <label class="form-label">Email Url</label>
                            <input id="inputcat" type="text" class="form-control text-dark" required name="url" style="background-color:     aliceblue">
                      </div>                 
                      <div class="col-12">
                            <label class="form-label">Email Last Line</label>
                            <input id="inputcat" type="text" class="form-control text-dark" required name="lastline" style="background-color:     aliceblue">
                      </div>                 
                                            
                      <div class="col-1" id="sub">
                        <button type="submit" value="Send Mail" class="btn waves-effect waves-light btn-primary ">Send </button>
                     </div>
                    </div>
                 </form>
               </div>
            </div>
         </div> 
               
    </div>
 </div>




   <!-- content-wrapper ends -->
     @include('admin.script')
  </body>
</html>