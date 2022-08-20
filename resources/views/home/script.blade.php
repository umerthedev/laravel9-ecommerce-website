<!-- jQery -->
<script src="{{ URL::asset('home/js/jquery-3.4.1.min.js') }}"></script>
<!-- popper js -->
<script src="{{ URL::asset('home/js/popper.min.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ URL::asset('home/js/bootstrap.js') }}"></script>
<!-- custom js -->
<script src="{{ URL::asset('home/js/custom.js') }}"></script>

<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
