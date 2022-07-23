<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('client.layouts.style')
    @yield('style')
</head>

<body>


    <div class="wrapper">
        <div class="header-wrapper">
            @include('client.layouts.header')
        </div>
        <div class="main-wrapper">
            @yield('content')
        </div>
        <div class="footer-wrapper">
            @include('client.layouts.footer')
        </div>
    </div>
    @include('client.layouts.script')

    <script>
        $(document).ready(function() {
            let toggle = $('#toggle');
            toggle.click(function(e) {
                e.preventDefault();
                let menu = $('.menu');
                menu.toggleClass('menuResponsive');
                toggle.toggleClass('toggleblock');
            });
            let search_toggle = $('#search_toggle');
            search_toggle.click(function(e) {
                console.log(search_toggle);
                e.preventDefault();
                let search = $('.block_search');
                search.toggleClass("searchBlock");
            })
            let shopping_cart = $('#shopping_cart');
            shopping_cart.click(function(e) {
                e.preventDefault();
                let cart_details = $('.cart_header');
                cart_details.toggleClass("carttoggle")
                $(".closeCart").css('display', 'block');

            });
            let close_cart = $('#close_cart');
            close_cart.click(function(e) {
                e.preventDefault();
                let cart_details = $('.cart_header');
                cart_details.toggleClass("closeCart");
                $(".closeCart").css('display', 'none');

            })
        });
    </script>
    @yield('script')
</body>

</html>
