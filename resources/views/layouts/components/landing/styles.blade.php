
        <!-- Bootstrap Css -->
        <link id="style" href="{{asset('build/assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Node Waves Css -->
        <link href="{{asset('build/assets/libs/node-waves/waves.min.css')}}" rel="stylesheet">

        <!-- SwiperJS Css -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/swiper/swiper-bundle.min.css')}}">

        <!-- Color Picker Css -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/flatpickr/flatpickr.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/assets/libs/@simonwep/pickr/themes/nano.min.css')}}">

        <!-- Choices Css -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/choices.js/public/assets/styles/choices.min.css')}}">

        <script>
                
                if (localStorage.udonlandingdarktheme) {
                document.querySelector("html").setAttribute("data-theme-mode", "dark")
                }
                if (localStorage.udonlandingrtl) {
                document.querySelector("html").setAttribute("dir", "rtl")
                document.querySelector("#style")?.setAttribute("href", "{{asset('build/assets/libs/bootstrap/css/bootstrap.rtl.min.css')}}");
                }

        </script>
