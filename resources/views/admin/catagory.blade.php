<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style>
        #inputcat{
            color: rgb(255, 255, 255);
            margin-top:2px;
            
        }
        #sub{
            text-align: right;
            margin-top: 10px;
        }
        #h1{
            text-align: center;
            padding: 10px;
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

                <h1 id="h1">Add Product category</h1>

                <form action="{{url('/add_category')}}" method="POST">
                    @csrf
                    <div >
                        <input type="text" id="inputcat" class="form-control text-dark" style="background-color: aliceblue" placeholder="Add categorys" name="category" > 
                    </div>
                    <div id="sub">
                        <button type="submit"  class="btn waves-effect waves-light btn-info ">Add</button>
                    </div>

               
                </form>
                <table class="table" style="padding-top:100px" >

                    <h1>Product category list</h1>

                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">category Name</th>
                        <th style="text-align: right">Acton</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data) 
                        <tr>                                 
                        <th scope="row">{{$data->id}}</th>
                        <td>{{$data->catagory_name}}</td>
                        <td style="text-align: right">
                            <a href="{{url('edit_category',$data->id)}}" class="btn btn-primary">Edit</a>
                            <a onclick="return confirm('Are you sure want to delete this category')" href="{{url('delete_category',$data->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            
        </div>




<!-- content-wrapper ends -->
          
    @include('admin.script')
  </body>
</html>