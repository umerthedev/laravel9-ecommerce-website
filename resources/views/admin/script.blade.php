 <!-- container-scroller -->
    <!-- plugins:js -->
    <script type="text/javascript" src="{{ URL::asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    {{-- <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script> --}}
    
    
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script type="text/javascript" src="{{ URL::asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script type="text/javascript" src="{{ URL::asset('admin/assets/js/off-canvas.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/assets/js/misc.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/assets/js/settings.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/assets/js/todolist.js') }}"></script>
   <!-- endinject -->
    <!-- Custom js for this page -->
    <script type="text/javascript" src="{{ URL::asset('admin/assets/js/dashboard.js') }}"></script>
     <!-- End custom js for this page -->
     <script>$(document).ready(function () {
      $('#example').DataTable({
          scrollX: true,
                });
         });</script>