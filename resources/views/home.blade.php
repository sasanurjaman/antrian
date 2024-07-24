<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Klinik dr. Agung Mas Agung P.S</title>
    {{-- <title>Grad School HTML5 Template</title> --}}

    <!-- Favicon icon -->
    {{--
    <link rel="icon" href="assets/images/favicon.svg" type="image/x-icon"> --}}

    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="/assets/css/owl.css">
    <link rel="stylesheet" href="/assets/css/lightbox.css">
    <!--
    
TemplateMo 557 Grad School

https://templatemo.com/tm-557-grad-school

-->
</head>

<body>


    <!--header-->
    <header class="main-header clearfix" role="header">
        <div class="logo">
            <a href="#"><em>Klinik</em> dr. Agung Mas Agung P.S</a>
        </div>
        <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
        <nav id="menu" class="main-nav" role="navigation">
            <ul class="main-menu">
                <li><a href="#section1">Home</a></li>
                <li><a href="#section2">About Us</a></li>
                @if (Route::has('login'))
                @auth
                <li><a href="{{ url('/dashboard') }}" class="external">Dasboard</a></li>
                @else
                <li><a href="{{ route('login') }}" class="external">Login</a></li>
                @if (Route::has('register'))
                <li><a href="{{ route('register') }}" class="external">Register</a></li>
                @endif
                @endauth
                @endif
            </ul>
        </nav>
    </header>

    <!-- ***** Main Banner Area Start ***** -->
    <section class="section coming-soon" data-section="section1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="continer centerIt">
                        <h4 class="text-center"><em>Antrian Pasien</em> Dr. Soeharto Heerdjan</h4>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <div class="counter">

                                    <div class="days">
                                        <div class="queue_count text-white"></div>
                                        <span>Jumlah Antrian</span>
                                    </div>

                                    <div class="hours">
                                        <div class="queue_latest text-white"></div>
                                        <span>Antrian Saat ini</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->

    <section class="section why-us" data-section="section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Sekilas Tentang RSJ Soeharto</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div id='tabs'>
                        <ul>
                            <li><a href='#tabs-1'>Sejarah Singkat</a></li>
                            <li><a href='#tabs-2'>Visi Misi</a></li>
                            <li><a href='#tabs-3'>Nilai/Value</a></li>
                        </ul>
                        <section class='tabs-content'>
                            <article id='tabs-1'>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="assets/images/choose-us-image-01.png" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Sejarah Singkat</h4>
                                        <p>Didirikan berdasarkan Keputusan Kerajaan Belanda (Koninklijkbesluit)
                                            tertanggal 30 Desember 1865 No.100. dan berdasarkan Keputusan Gubernur
                                            Jenderal (Gouverneur General) tertanggal 14 April 1867, namun pembangunannya
                                            baru dimulai pada tahun 1876.</p>
                                        <p>Tahun 1973 berubah nama jadi RSJ Jakarta, Tahun 1993 menjadi RSJ Pusat
                                            Jakarta, dan Tahun 2003 jadi RSJ Soeharto Heerdjan</p>
                                    </div>
                                </div>
                            </article>
                            <article id='tabs-2'>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="assets/images/choose-us-image-02.png" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="p-0 m-1">Visi</h4>
                                        <p>Masyarakat Sehat Yang Mandiri Dan Berkeadilan</p>
                                        <h4 class="p-0 m-1">Misi</h4>
                                        <p>Menyediakan kegiatan promotif, preventif, kuratif, dan rehabilitatif yang
                                            profesional dan bermutu berbasis layanan neuropsikiatri.</p>
                                        <p>Meningkatkan Kualitas Sumber Daya Manusia yang Kompeten dan Profesional.</p>
                                        <p>Meningkatkan sarana prasarana untuk mendukung terwujudnya layanan-layanan
                                            unggulan dan pusat rujukan layanan neuropsikiatri.</p>
                                        <p>Menyediakan Pendidikan Kesehatan Jiwa sesuai Standar RS Pendidikan.</p>
                                        <p>Menyediakan Penelitian dan pelatihan yang berbasis layanan neuropsikiatri.
                                        </p>
                                    </div>
                                </div>
                            </article>
                            <article id='tabs-3'>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="assets/images/choose-us-image-03.png" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Nilai/Value</h4>
                                        <p>Responsibility</p>
                                        <p>Sincerely</p>
                                        <p>Justice</p>
                                        <p>Social</p>
                                        <p>Humanity</p>
                                    </div>
                                </div>
                            </article>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><i class="fa fa-copyright"></i> Copyright {{ date('Y') }} {{ config('app.name', 'Laravel') }}

                        | Design: <a href="https://templatemo.com" rel="sponsored" target="_parent">TemplateMo</a><br>
                        Distributed By: <a href="https://themewagon.com" rel="sponsored" target="_blank">ThemeWagon</a>

                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/js/isotope.min.js"></script>
    <script src="/assets/js/owl-carousel.js"></script>
    <script src="/assets/js/lightbox.js"></script>
    <script src="/assets/js/tabs.js"></script>
    <script src="/assets/js/video.js"></script>
    <script src="/assets/js/slick-slider.js"></script>
    <script src="/assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
            direction = section.replace(/#/, ''),
            reqSection = $('.section').filter('[data-section="' + direction + '"]'),
            reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                scrollTop: reqSectionPos },
                800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function () {
                var
                $this = $(this),
                topEdge = $this.offset().top - 80,
                bottomEdge = topEdge + $this.height(),
                wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                var
                currentId = $this.data('section'),
                reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                reqLink.closest('li').addClass('active').
                siblings().removeClass('active');
                }
            });
            };

            $('.main-menu, .scroll-to-section').on('click', 'a', function (e) {
            if($(e.target).hasClass('external')) {
                return;
            }
            e.preventDefault();
            $('#menu').removeClass('active');
            showSection($(this).attr('href'), true);
            });

            $(window).scroll(function () {
            checkSection();
        });
    </script>

    <script>
        $(function() {
                queuelatest();
            })
        setInterval(queuelatest, 1000);
        
        function queuelatest() {
            $.get('/queuelatest', {}, function (data) {
                $('.queue_count').text(data.queue_count);
                $('.queue_latest').text(data.queue_latest);
            })
        }queuelatest
    </script>
</body>

</html>