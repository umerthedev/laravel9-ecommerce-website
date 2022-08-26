<div class="main-panel">
  <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card corona-gradient-card">
                <div class="card-body py-0 px-0 px-sm-3">
                  <div class="row align-items-center">
                    <div class="col-4 col-sm-3 col-xl-2">
                      <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                    </div>
                    <div class="col-12 col-sm-7 col-xl-8 p-0">
                      <h4 class="">Manage All Your Sales & purchase</h4>
                      
                    </div>
                    <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                      <span>
                        <a href="" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Totall Revenue</a>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h6 class="text-muted font-weight-normal" style="margin-top: 10px">Total Product</h6>                       
                       </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success ">
                        <h3 class="mb-0">{{$total_product}}</h3>
                      </div>
                    </div>
                  </div>                 
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h6 class="text-muted font-weight-normal" style="margin-top: 10px">Total COD Orders</h6>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success">
                        <h3 class="mb-0">{{$total_Codorder}}</h3>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h6 class="text-muted font-weight-normal" style="margin-top: 10px">Total Paid Orders</h6>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success">
                        <h3 class="mb-0">{{$OnlinePayOrder}}</h3>  
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h6 class="text-muted font-weight-normal"style="margin-top: 10px">Total Customers</h6>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success">   
                        <h3 class="mb-0">{{$total_user}}</h3>                       
                      </div>
                    </div>
                  </div>                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-0">Tk {{$total_revenue}}</h3>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success ">
                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Total Revenue</h6>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h6 class="text-muted font-weight-normal" style="margin-top: 10px">Order Delivered</h6>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success ">
                        <h3 class="mb-0">{{$total_delivery}}</h3>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h6 class="text-muted font-weight-normal" style="margin-top: 10px">Order Processing</h6>        
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success ">
                        <h3 class="mb-0">{{$total_processing}}</h3>  
                      </div>
                    </div>
                  </div>                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h6 class="text-muted font-weight-normal" style="margin-top: 10px">Total Customers</h6>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success">
                        <h3 class="mb-0">{{$total_category}}</h3> 
                      </div>
                    </div>
                  </div>                 
                </div>
              </div>
            </div>
          </div>   
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © IsDb Students 2022</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="#" target="_blank"></a> </span>
    </div>
  </footer>
  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>