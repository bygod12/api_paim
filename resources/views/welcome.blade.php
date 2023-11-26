@extends('layouts.base')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/temas/shopgrid/bootstrap.min.css') . (config('app.env') == "local" ? '?' . time() : '') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/temas/shopgrid/glightbox.min.css') . (config('app.env') == "local" ? '?' . time() : '') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/temas/shopgrid/main.css') . (config('app.env') == "local" ? '?' . time() : '') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app/owl.theme.default.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app/slicknav.min.css') }}" type="text/css">

@endpush

@php $sum = array_sum(session('carrinho', [0])) @endphp

@section('body')
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Preloader -->
    <!-- <div class="preloader">
         <div class="preloader-inner">
             <div class="preloader-icon">
                 <span></span>
                 <span></span>
             </div>
         </div>
     </div>-->
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        {{-- CABEÇALHO SUPERIOR --}}
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul class="d-flex">
                                <li >
                                    <i class="fa fa-envelope"></i>
                                    <a href="mailto:{{ loja()->email }}">{{loja()->email}}</a>
                                </li>
                                <li class="ms-1 me-1">
                                    |
                                </li>
                                <li>{!! loja()->slogan ?? '' !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Header TOP -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <x-loja.logo parent="text-center logo" />
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <form action="{{ route('loja.catalogo') }}" method="GET" novalidate class="search-bar__form">

                                <div class="navbar-search search-style-5">
                                    <div class="search-input">
                                        <input type="search" class="search__input" name="nome" placeholder="Do que voce precisa?"
                                               autocorret="off" autocomplete="off" autocapitalize="off" required aria-label="Nome do produto"
                                               aria-describedby="btn-search">

                                    </div>
                                    <div class="search-btn">
                                        <button type="submit"><i class="lni bi bi-search"></i></button>
                                    </div>
                                </div>
                            </form>

                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="bi bi-telephone-fill"></i>
                                <h3>SAC:
                                    @if(loja()->sac)
                                        {{ loja()->sac }}
                                    @endif
                                </h3>
                            </div>
                            <div class="navbar-cart">
                                <div class="cart-items">
                                    <button class="main-btn cart-toggle-button" id="cartToggler" data-bs-toggle="offcanvas" data-bs-target="#userCart" aria-controls="userCart">
                                        <i class="icon anm anm-bag-l" class="header__cart_action" ></i>
                                        <i class="bi bi-cart"></i>
                                        <span class="total-items cartTogglerQuantity">{{ $sum > 99 ? "99+" : $sum }}</span>
                                    </button>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End TOP Middle -->
        <!-- Start Header Bottom -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">
                        <!-- Start Mega Category Menu -->
                        <div class="mega-category-menu">
                            <span class="cat-button"><i class="fa fa-bars"></i>Todas categorias</span>
                            <ul class="sub-category dropdown">

                                <x-temas.shopgrid.categorias :categorias="loja()->categoria" />
                            </ul>

                        </div>
                        <!-- End Mega Category Menu -->
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg justify-content-start">
                            <button class="navbar-toggler mobile-menu-btn me-2" type="button" id="sub-menu-toggler">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">

                                    <x-temas.shopgrid.navegacao class="header__menu" />

                                </ul>

                            </div>
                            <div class="button">
                                <button class="ms-5 ms-1 p-2 btn btn-light cat-button-toggle" data-bs-toggle="offcanvas" data-bs-target="#categorias" aria-controls="offcanvasScrolling">
                                    <span class="cat-button ms-0"><i class="fa fa-bars ms-0"></i> Todas categorias</span>
                                </button>
                            </div>
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Nav Social -->
                    <div class="nav-social">
                        <x-temas.shopgrid.redes-sociais class="header__top__right__social" />
                    </div>
                    <!-- End Nav Social -->
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
    </header>
    <!-- End Header Area -->
    <!--
    @hasSection('breadcrumbs')
        <div class="container">
            <h2 class="page__title"><span class="page__title__text">@yield('breadcrumbs')</span></h2>
        </div>
    @endif
    -->
    <div id="main-content">
        @yield('content')
    </div>

    {{ $slot ?? ""}}

    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="footer-logo logo">
                                <x-loja.logo parent="humberger__menu__logo text-center " />

                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12 d-flex justify-content-center flex-column">
                            <div class="footer-newsletter">
                                <h4 class="title h4-newslatter">
                                    Faça parte da nossa newsletter
                                    <span>Receba e-mails promocionais, descontos e novidades da loja diretamente no seu e-mail.</span>
                                </h4>
                                <div class="newsletter-form-head">
                                    <livewire:temas.shopgrid.newslatter />

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3>Entre em contato conosco</h3>
                                @if(loja()->sac)

                                    <p class="phone">SAC: {{loja()->sac }}</p>
                                @endif

                                @if(loja()->televenda)

                                    <p class="phone">Televendas: {{loja()->televenda }}</p>
                                @endif

                                <div class="footer__widget">
                                    {{loja()->rua  . ", " . loja()->numero . (loja()->complemento ? " - " . loja()->complemento  : "" )}} <br/>
                                    {{loja()->bairro . ", " . loja()->cidade  . " - " . loja()->uf }} <br/>
                                    {{loja()->cep}}
                                </div>
                                <p class="mail">
                                    <a href="mailto:{{loja()->email }}">{{loja()->email }}</a>
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Veja também:</h3>
                                <ul>
                                    @foreach(session('documentos') as $documento)
                                        <li><a href="{{ route('loja.documento', $documento->url) }}">{{ $documento->titulo }}</a></li>
                                    @endforeach
                                    @foreach(loja()->pagina as $pagina)

                                        <li><a href="{{ route('loja.pagina', $pagina->uri) }}">{{ $pagina->nome }}</a></li>
                                    @endforeach

                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Veja também:</h3>
                                <ul>
                                    @foreach(session('documentos') as $documento)
                                        <li><a href="{{ route('loja.documento', $documento->url) }}">{{ $documento->titulo }}</a></li>
                                    @endforeach
                                    @foreach(loja()->pagina as $pagina)

                                        <li><a href="{{ route('loja.pagina', $pagina->uri) }}">{{ $pagina->nome }}</a></li>
                                    @endforeach

                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        @if(loja()->exibir_parceiros && loja()->parceiro->isNotEmpty())
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="single-footer f-link">

                                    <h3>Parceiros:</h3>

                                    <div class="d-flex">
                                        @foreach(loja()->parceiro as $parceiro)
                                            <a href="{{ $parceiro->url }}" target="_blank">
                                                <img src="{{ asset($parceiro->logo) }}" alt="" class="parceiros-footer">
                                            </a>


                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">

                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="copyright a">
                                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="categorias">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Categorias</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <x-temas.shopgrid.navegacao-categorias :categorias="loja()->categoria" />
        </div>
    </div>
    {{-- SACOLA DE COMPRAS --}}
    @if(!in_array(Route::getCurrentRoute()->getName(), ['loja.carrinho.index', 'loja.pedidos.details', 'loja.pedidos.charge', 'loja.pedidos.payment', 'loja.pedidos.success']))
        <div class="offcanvas offcanvas-end" tabindex="-1" id="userCart" aria-labelledby="cartLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="cartLabel">Carrinho</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <livewire:loja.cart.user-cart template="modal-user-cart" />
            </div>
        </div>
    @endif
    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="bi bi-arrow-up"></i>
    </a>
@endsection


@push('scripts')
    <script src="{{ asset('js/app/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/app/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/app/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/loja/detalhes-compra.js') }}"></script>

    <script src="{{ asset('js/app/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/temas/shopgrid/main.js') }}"></script>
    <script src="{{ asset('js/app/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/temas/shopgrid/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/temas/shopgrid/glightbox.min.js') }}"></script>
    <script>
            // Verificar se é um dispositivo móvel
            var isMobile = window.matchMedia('(max-width: 767px)').matches;

            // Remover elementos se for um dispositivo móvel
            if (isMobile) {
                var buttonMobile = document.getElementById('button_cart_mobile');

                // Usar o método removeChild em vez de remove para maior compatibilidade

                if (buttonMobile) {
                    buttonMobile.parentNode.removeChild(buttonMobile);
                }
            }
        /*------------------
    Preloader
--------------------*/
        $(window).on('load', function() {
            $(".loader").fadeOut();
            $("#preloder").delay(200).fadeOut("slow");
        });
        /*-----------------------
            Categories Slider
        ------------------------*/
        $(".categories__slider").owlCarousel({
            loop: false,
            margin: 0,
            items: 4,
            dots: false,
            nav: true,
            navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            smartSpeed: 1200,
            autoHeight: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1,
                },

                480: {
                    items: 2,
                },

                768: {
                    items: 3,
                },

                992: {
                    items: 4,
                }
            }
        });


        $('.categories-toggler').on('click', function() {
            $('.categories-departments').slideToggle(400);
        });
        $('.categories-toggler').blur(function() {
            $('.categories-departments').slideToggle(400);
        })
        /*---------------------------------
            Product Details Pic Slider
        ----------------------------------*/
        $(".product__details__pic__slider").owlCarousel({
            loop: false,
            margin: 20,
            responsive: {
                0: {
                    items: 2,
                },
                992: {
                    items: 4,
                }
            },
        });
        /*------------------
Single Product
--------------------*/
        $(document).on('click', '.product__details__pic__slider img', function() {
            var imgurl = $(this).data('imgbigurl');
            var bigImg = $('.product__details__pic__item--large').attr('src');
            if (imgurl != bigImg) {
                $('.product__details__pic__item--large').attr({
                    src: imgurl
                });
            }
        })

    </script>
    <script>
        $(document).ready(function() {
            // Hide the spinner initially
            $(".spinner-border.text-app-primary.spinner-sm.me-2[wire\\:loading]").hide();
        });
        $('.owl-carousel').owlCarousel({
            margin: 15,
            responsive: {0: { items: 1 }, 480: { items: 2 }, 768: { items: 4 }, 992: { items: 8 }}
        });
        $(".has-subcategorias").on('mouseout', function(){
            $(".categories-details").hide();
        });
        $(".has-subcategorias").on('mouseover', function(){
            $(`.categories-details[data-ref="${$(this).data('target')}"]`).show();
        });
        Livewire.on('productAddedToCart', function(){
            toastr.success(`Produto adicionado ao carrinho <br/>
                            <a href="{{ route("loja.carrinho.index") }}" class="text-decoration-underline"><strong>Ver carrinho</strong></a>
            `);
        })
        const cartTogglerQuantity = $(".cartTogglerQuantity");
        $(function(){
            //Atualiza a quantidade de produtos no cabeçalho quando ocorre alguma operação no carrinho
            Livewire.hook('message.processed', (message, component) => {
                if(component.name == "loja.cart.user-cart") {
                    cartTogglerQuantity.text($("#cartQuantity").length ? $("#cartQuantity").text() : 0);
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $("#sub-menu-toggler").click(function() {
                $("#navbarSupportedContent").toggleClass("show");
            });
        });
    </script>

    <script>
        function checkWindowSize() {
            if ($(window).width() <= 768) { // Adjust the breakpoint as needed
                $("#nome-input, #email-input").removeClass("input-nesletter");
                $(".cat-button-toggle").show();
            } else {
                $("#nome-input, #email-input").addClass("input-nesletter");
                $(".cat-button-toggle").hide();

            }
        }

        $(document).ready(function() {
            checkWindowSize();

            $(window).resize(function() {
                checkWindowSize();
            });
        });
    </script>

@endpush
