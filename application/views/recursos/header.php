<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <!-- meta descrição -->
    <title>Datacom Notebook e Informática</title>
    <meta name="title" content="Datacom Notebook e Informática">
    <meta name="author" content="N Soluções Agência Digital - https://nsolucoes.digital/" />
    <meta name="description" content="DataCom Notebook e Informática" />
    <meta name="keywords" content="DataCom, informatica, notebook, celular, reparo, loja" />


    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>recursos/img/favicon.png" />
    <!--===============================================================================================-->
    <link href="<?php echo base_url("recursos/lib/bootstrap/bootstrap.min.css") ?>" rel="stylesheet" type="text/css">
    <!--===============================================================================================-->
    <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/assets/css/all.css">-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/areauser/fonts/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/areauser/vendor/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/areauser/vendor/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/areauser/vendor/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/areauser/vendor/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/areauser/vendor/daterangepicker.css">
    <!--===============================================================================================-->

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>

    <!-- SweetAlert2 -->
    <link href="<?php echo base_url('recursos/lib/sweetalert2/dist/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css">

    <!-- fontawesome & themify-icons -->
    <link media rel="stylesheet" href="<?php echo base_url('recursos/lib/'); ?>fonts/fontawesome-all.min.css">
    <link media rel="stylesheet" href="<?php echo base_url('recursos/lib/'); ?>fonts/fa/css/font-awesome.css">
    <link media rel="stylesheet" href="<?php echo base_url('recursos/lib/'); ?>themify/themify-icons.css">

    <!-- slicknav & slick(carousel) -->
    <link media rel="stylesheet" href="<?php echo base_url('recursos/lib/'); ?>slick/slick.css">
    <link media rel="stylesheet" href="<?php echo base_url('recursos/lib/'); ?>slicknav/slicknav.css">
    <link media rel="stylesheet" href="<?php echo base_url('recursos/lib/'); ?>slick/slick/slick.css">
    <link media rel="stylesheet" href="<?php echo base_url('recursos/lib/'); ?>slick/slick/slick-theme.css">

    <!-- select2 -->
    <link media rel="stylesheet" href="<?php echo base_url('recursos/lib/'); ?>select2/dist/css/select2.min.css">
    <link media rel="stylesheet" href="<?php echo base_url('recursos/lib/'); ?>select2/dist/css/select2-bootstrap.min.css">

    <!-- jquery -->
    <script src="<?php echo base_url('recursos/'); ?>js/jquery-1.12.4.min.js"></script>



    <!-- meta viewport (previnir autozoom em iphone) -->
    <?php
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
    $ipad = strpos($_SERVER['HTTP_USER_AGENT'], "iPad");
    $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
    $palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");
    $berry = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
    $ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");
    $symbian =  strpos($_SERVER['HTTP_USER_AGENT'], "Symbian");
    if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
        $mobile_view = 1;
    } else {
        $mobile_view = 0;
    }

    if ($iphone) {
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />';
    } else {
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    }

    if (isset($script)) {
        print_r($script);
    }

    ?>
    <!--STYLE IMPORTADO NATAL-->
    <style>

        :root {
            /* Variable para o tamanho do header exemple: padding-top: var(--header-height) */
            --header-height: 3.8rem;

            /* colors */
            --hue: 32;
            --hue2: 272;

            /* HSL color mode */
            
            --base-color: hsl(var(--hue) 87% 60%);

            --base-color-alt: hsl(var(--hue) 50% 55%);
            --base-color-active: hsl(var(--hue) 50% 65%);
            --title-color: hsl(var(--hue) 41% 50%);
            
            --base-color-second: hsl(var(--hue2) 97% 12%);
            
            --text-color: hsl(0 0% 46%);
            --text-color-light: hsl(0 0% 98%);
            --body-color: hsl(0 0% 98%);    
        }

        .header-area .credit-main-menu {
            background-color: #221f47;
            
        }

        .header-area .credit-main-menu::after {
            background: #221f47;
        }

        .header-area .credit-main-menu .classy-navbar .contact {
            padding-left: 50px;
            padding-right: 25px;
        }

        .header-area .credit-main-menu .classy-navbar .contact::before {
            background-color: #221f47;
            transform: rotate(24deg);
        }

        .header-area .credit-main-menu .classy-navbar .contact::after {
            background-color: #221f47;
        }

        .header-area .credit-main-menu .classy-navbar .classynav ul li ul li a {
            color: #1f217d !important;
        }

        .header-area .credit-main-menu .classy-navbar .classynav ul li ul li a:hover {
            color: var(--base-color-second) !important;
        }

        .classynav ul li {
            margin-right: -10px !important;
        }

        .classynav li a:hover {
            color: var(--base-color-second) !important;
        }

        #busca:focus {
            box-shadow: none;
            border: 0;
        }

        .a-color {
            color: rgb(255, 110, 228) !important;
        }

        .tooltip-inner {
            background: #1f217d;
        }

        li a:hover {
            color: var(--base-color-second) !important;
        }

        .botao-voltar {
            cursor: pointer;
            color: white;
            font-size: 13px;
            padding: 10px 15px;
            border-radius: 5px;
            background: #1f217d;
        }

        #carrinho-qtd {
            position: absolute;
            top: 60%;
            right: 52%;
            background: #1f217d;
            border-radius: 50px;
            color: white;
            padding: 2px 5px;
            font-size: 10px;
        }

        #busca-icone {
            color: #1f217d;
            font-size: 20px;
            position: absolute;
            top: 33px;
            right: 42%;
        }

        .classy-navbar-toggler .navbarToggler span {
            background-color: #ffffff;
        }

        .breakpoint-on .classynav>ul>li>a {
            background-color: #ffffff;
        }

        .classynav ul li.megamenu-item>a:after,
        .classynav ul li.has-down>a:after {
            padding-right: 20%;
        }

        .header-area .credit-main-menu .classy-navbar .classynav ul li a:hover,
        .header-area .credit-main-menu .classy-navbar .classynav ul li a:focus {
            color: var(--base-color-second) !important;
        }

        .a-sub {
            color: black !important;
        }

        .header-area .credit-main-menu .classy-nav-container {
            background-color: #221f47 !important;
        }

        .header-area .credit-main-menu .classy-navbar .classynav ul li a {
            display: grid;
        }

        .header-area .credit-main-menu .classy-navbar .classynav ul li.megamenu-item>a::after,
        .header-area .credit-main-menu .classy-navbar .classynav ul li.has-down>a::after {
            display: contents;
        }


        @media only screen and (max-width: 1200px) {
            .classy-navbar {
                padding-left: 1% !important;
            }

            .classynav ul li {
                margin-left: 25px !important;
            }
        }

        @media only screen and (max-width: 767px) {
            .header-area .credit-main-menu .classy-navbar .classynav ul li a {
                color: #5e47ff;
            }
        }

        @media only screen and (max-width: 600px) {
            #busca {
                margin-top: -13px !important;
            }

            #busca-icone {
                top: 35% !important;
                right: 10% !important;
            }
        }

        .flx {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Scroll 1 */
        .sc1::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .sc1::-webkit-scrollbar-track {
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 10px;
        }

        .sc1::-webkit-scrollbar-thumb {
            background-color: #dfdfdf;
            border-radius: 10px;
        }

        .h500 {
            height: 500px;
        }
    </style>
    <!--FIM DO STYLE IMPORTADO DO NATAL-->

    <style>
        body {
            overflow: hidden;
        }

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: var(--base-color-second);
            /* cor do background que vai ocupar o body */
            z-index: 999;
            /* z-index para jogar para frente e sobrepor tudo */
        }

        #preloader .inner {
            position: absolute;
            top: 50%;
            /* centralizar a parte interna do preload (onde fica a animação)*/
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .bolas>div {

            display: inline-block;
            background-color: var(--base-color);
            width: 15px;
            height: 15px;
            border-radius: 100%;
            margin: 3px;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            animation-name: animarBola;
            animation-timing-function: linear;
            animation-iteration-count: infinite;

        }

        .bolas>div:nth-child(1) {
            animation-duration: 0.75s;
            animation-delay: 0;
        }

        .bolas>div:nth-child(2) {
            animation-duration: 0.75s;
            animation-delay: 0.12s;
        }

        .bolas>div:nth-child(3) {
            animation-duration: 0.75s;
            animation-delay: 0.24s;
        }

        @keyframes animarBola {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1;
            }

            16% {
                -webkit-transform: scale(0.1);
                transform: scale(0.1);
                opacity: 0.7;
            }

            33% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1;
            }
        }


        a:hover {
            text-decoration: none !important;
        }

        .slicknav_nav {
            background: linear-gradient(rgba(120, 0, 167, 1), rgba(120, 0, 167, 1));
            float: right;
            margin-top: 11px;
            width: 50%;
            text-align: center;
            border-bottom: 0px solid transparent;
        }

        .menu-transparente {
            height: 120px;
            padding-top: 10px;
            background: var(--base-color-second);
        }

        .header-sticky .sticky-bar {
            background: linear-gradient(rgba(117, 55, 10, 1), rgba(25, 23, 22, 1));
            box-shadow: unset !important;
        }

        .mobile_menu .slicknav_menu .slicknav_nav {
            margin-top: -15px !important;
            z-index: 20;
            width: auto;
        }

        .slicknav_nav a {
            font-size: 14px;
            font-weight: 400;
            color: #ffffff;
            text-transform: capitalize;
        }

        .menu-a {
            padding: 20px 10px !important;
            cursor: pointer;
        }

        .menu-link {
            font-weight: bold !important;
        }

        .menu-link:hover {
            color: var(--base-color-second) !important;
        }

        .mobile_menu .slicknav_menu .slicknav_btn .slicknav_icon-bar {
            background-color: #ca8e02 !important;
        }

        .container {
            max-width: 100%;
        }

        /*.header-sticky.sticky-bar { background: #3a0b0c; }*/
        .search-icon-div {
            background-color: white;
            border-radius: 0;
            border-top-right-radius: 3px;
            border-bottom-right-radius: 0px;
        }

        .search-icon-i {
            background: white;
            cursor: text;
            border-radius: 0;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .btn-primary {
            font-weight: 700;
            color: white;
            background-color: var(--base-color);
            border-color: var(--base-color);
            box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
        }

        .btn-primary:hover {
            background-color: var(--base-color-alt);
            border-color: var(--base-color-alt);
            color: black;
        }

        .btn-primary:active {
            background-color: white !important;
            border-color: var(--base-color) !important;
            color: var(--base-color) !important;
        }

        .mobile-logo {
            width: 150px;
            height: auto;
            z-index: 1;
            margin: 10% 10% 15%;
        }

        .menu-transparente {
            height: 85px;
            padding: 4px;
        }

        .main-header {
            padding: 0 !important;
        }

        .menu-a {
            color: white !important;
        }

        .search-input {
            height: 30px !important;
            font-size: 12px;
        }

        /*.header-sticky.sticky-bar {background: var(--base-color-second);}*/
        li {
            list-style: none;
        }

        .dropdown-item {
            color: black !important;
        }

        .nav-item {
            color: white !important;
            font-weight: bold;
            font-size: 17px;
        }

        .nav-item:hover {
            color: var(--base-color-second) !important;
            font-weight: bold;
            font-size: 17px;
        }

        #navbarSupportedContent li a:hover {
            color: #147E96;
        }

        #navbarSupportedContent a {
            color: #ffffff;
            text-decoration: none;
            background-color: transparent;
            font-size: 14px;
        }

        .dropdown-item:hover {
            color: var(--base-color-second)
        }

        .dropdown-divider {
            background-color: var(--base-color-second);
        }

        .dropdown:hover>.dropdown-menu {
            display: block;
        }

        .dropdown>.dropdown-toggle:active {
            /*Without this, clicking will make it sticky*/
            pointer-events: none;
        }

        .dropdown-menu {
            top: 85%;
        }

        #navMobile a {
            color: white;
            font-weight: 400 !important;
        }

        #navMobile a:hover {
            color: var(--base-color-second);
        }


        /* XX-Small devices (300px and up) */
        @media (min-width: 299px) and (max-width: 398px) {
            .logo-img {
                width: 50px;
            }

            .mobile_menu .slicknav_menu .slicknav_nav {
                margin-top: -57px !important;
                margin-right: 55px;
            }

            .slicknav_menu .slicknav_icon {
                margin-top: 15px;
            }

            .menu-transparente {
                height: 135px !important;
            }

            #search_produto {
                border-radius: 10px;
                font-size: 15px;
                left: 5%;
                font-weight: 400;
            }

            #search_produto:focus {
                z-index: 0;
            }

            .mobile_menu .slicknav_menu .slicknav_btn {
                top: -13px;
            }

            .container-fluid {
                height: 60px;
            }

            .menu-a {
                padding: 15px 10px !important;
            }

            .menu-user_name {
                left: 46px !important;
            }
        }

        /* X-Small devices (iPhone and others mobiles, 400px and up) */
        @media (min-width: 399px) and (max-width: 574px) {
            .logo-img {
                width: 50px;
            }

            .mobile_menu .slicknav_menu .slicknav_nav {
                margin-top: -57px !important;
                margin-right: 55px;
            }

            .slicknav_menu .slicknav_icon {
                margin-top: 15px;
            }

            .menu-transparente {
                height: 135px !important;
            }

            #search_produto {
                border-radius: 10px;
                height: 35px !important;
                font-size: 16px;
                left: 5%;
            }

            #search_produto:focus {
                z-index: 0;
            }

            .menu-user_name {
                left: 80px !important;
            }

            #buscador {
                margin-top: -4%;
            }

            .navbar-toggler {
                margin-top: 50% !important;
            }

        }

        /* Small devices (landscape phones, 576px and up) */
        @media (min-width: 575px) and (max-width: 766px) {
            .logo-img {
                width: 60px;
            }

            .mobile_menu .slicknav_menu .slicknav_nav {
                margin-top: -57px !important;
                margin-right: 55px;
            }

            .slicknav_menu .slicknav_icon {
                margin-top: 15px;
            }

            .menu-transparente {
                height: 135px !important;
            }

            #search_produto {
                border-radius: 10px;
                height: 35px !important;
                font-size: 16px;
                left: 5%;
            }

            #search_produto:focus {
                z-index: 0;
            }

            .menu-user_name {
                left: 80px !important;
            }

            #buscador {
                margin-top: -4%;
            }

            .navbar-toggler {
                margin-top: 50% !important;
            }
        }

        /* Medium devices (tablets, 768px and up) */
        @media (min-width: 767px) and (max-width: 990px) {
            .logo-img {
                width: 70px;
            }

            .mobile-logo {
                position: relative;
                top: 13%;
                left: 0%;
                width: 50% !important;
                margin: 3% 10% 16% !important;
            }

            .mobile-link-logo-pos {
                position: relative;
                top: -12%;
            }

            .mobile_menu .slicknav_menu .slicknav_nav {
                margin-top: -57px !important;
                margin-right: 55px;
            }

            .slicknav_menu .slicknav_icon {
                margin-top: 15px;
            }

            .menu-transparente {
                height: 70px !important;
                padding: 0 !important;
            }

            .mobile_menu {
                top: 0;
                left: 0;
                right: 0 !important;
                width: 100% !important;
            }

            #search_produto {
                border-radius: 10px;
                height: 35px !important;
                font-size: 16px;
                left: 0.5%;
            }

            #search_produto:focus {
                z-index: 0;
            }

            #buscador {
                position: relative;
                max-width: 40%;
                left: 28%;
            }

            .usuario-mobile {
                left: 0 !important;
                top: 0 !important;
                padding: 0 !important;
            }

            .carrinho-mobile {
                left: 15% !important;
                top: 10px !important;
            }

            .search-div {
                position: relative;
                bottom: 60px;
            }

            .menu-user_name {
                left: 80px !important;
            }

            #buscador {
                margin-top: -4%;
            }

            .navbar-toggler {
                margin-top: 0% !important;
                height: 100% !important;
                width: 45% !important;
                position: relative;
                top: -56px;
            }

            #navMobile {
                top: 68px !important;
            }

            .user-icon-pos {
                position: relative;
                top: 16%;
            }

            .cart-icon-pos {
                position: relative;
                top: 15%;
                left: -3%;
            }

            #navMobile a {
                font-size: 20px;
            }
        }

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 991px) and (max-width: 1198px) {
            .logo-img {
                width: 87px;
            }

            .mobile-logo {
                left: -27%;
            }

            .mobile_menu .slicknav_menu .slicknav_nav {
                margin-top: -57px !important;
                margin-right: 55px;
            }

            .slicknav_menu .slicknav_icon {
                margin-top: 15px;
            }

            .menu-transparente {
                height: 135px !important;
            }

            #search_produto {
                border-radius: 10px;
                height: 35px !important;
                font-size: 16px;
                left: 0%;
            }

            #search_produto:focus {
                z-index: 0;
            }

            #buscador {
                position: relative;
                bottom: 38%;
            }

            .usuario-mobile {
                left: 18% !important;
                top: 10px !important;
            }

            .carrinho-mobile {
                left: 19% !important;
                top: 10px !important;
            }

            .menu-user_name {
                left: 275px !important;
            }

            #buscador {
                margin-top: -4%;
            }

            .navbar-toggler {
                margin-top: 0% !important;
                height: 100% !important;
                width: 45% !important;
                position: relative;
                top: -56px;
            }

            #navMobile {
                top: 68px !important;
            }

            .user-icon-pos {
                position: relative;
                top: 16%;
            }

            .cart-icon-pos {
                position: relative;
                top: 15%;
                left: -3%;
            }

            #navMobile a {
                font-size: 20px;
            }
        }

        /*X-Large devices (large desktops, 1200px and up) */
        /*Tela notebook*/
        @media (min-width: 1199px) and (max-width: 1398px) {
            .logo-img {
                width: 225px;
                position: relative;
                top: 24px;
                margin-left: 35px;
            }
        }

        /* XX-Large devices (larger desktops, 1400px and up) */
        @media (min-width: 1399px) {
            .logo-img {
                width: 225px;
                position: relative;
                top: 24px;
                margin-left: 35px;
            }

            .position-logado {
                margin-left: 5%;
            }

            .lupa-bt {
                left: 47% !important;
            }
        }

        #navMobile .dropdown-menu {
            padding: 0;
            font-size: 1rem;
            color: #ffff;
            border: 0 solid rgba(0, 0, 0, .15);
            border-radius: 0;
            background-color: transparent;
            color: white !important;
            margin: 0;
        }

        #navMobile .nav-item {
            font-size: 20px;
        }

        #navMobile a {
            color: white;
        }

        #navMobile .dropdown-item {
            color: white !important;
        }
    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y2P1JNN26Y"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Y2P1JNN26Y');
    </script>

</head>

<?php

if ($this->session->userdata('cliente_nome')) {
    $cliente_nome = $this->session->userdata('cliente_nome');
    $aux_nome = explode(' ', $cliente_nome);
    if (count($aux_nome) > 1) {
        $cliente_nome = $aux_nome[0] . ' ' . $aux_nome[1];
    } else {
        $cliente_nome = $aux_nome[0];
    }
}
?>

<?php if (isset($boleto)) { ?>
    <body onload="window.open('<?php echo $boleto; ?>', '_blank');">
<?php } else { ?>
    <body>
<?php } ?>

        <div id="loader"></div>
        <!-- Inicio de Configurações do Header das Páginas -->

        <!-- início do preloader -->
        <div id="preloader">
            <div class="inner">
                <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->

                <div class="bolas" style="text-align: center;">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <p id="processamentoPagamento" style="font-weight: 700;position: absolute;font-size: 15px;color: white;width: 100%!important;text-align: center;display: none;">
                    Processando Pagamento Aguarde...
                </p>
            </div>
        </div>
        <!-- fim do preloader -->

        <header>

            <?php if ($mobile_view == 0) { ?>
                <div class="header-area header-transparent pt-20 menu-transparente" style="z-index:99; position:fixed; width:100%; ">
                    <!--background: -webkit-linear-gradient(bottom, #0a1e3c, #261b2d, #3c1c23, #4e3721);-->
                    <!--box-shadow: rgb(0 0 0 / 15%) 1.95px 1.95px 2.6px; -->
                    <div class="header-sticky main-header" <?php if (!$mobile_view) { ?>style="height: 100%; padding: 10px 30px;" <?php } ?>>

                        <div class="container-fluid" style="">
                            <div class="align-items-center row">
                                <!-- div do menu -->
                                <div class="col-md-2 text-center">
                                    <a href="<?php echo base_url('') ?>">
                                        <img class="logo-img img-fluid" style="z-index: 40;" src="<?php echo base_url('imagens/site/logo.png') ?>" alt="logo" title="DataCom Notebook e Informática">
                                    </a>
                                </div>

                                <div class="col-md-10">
                                    <div id="div_c8d955c8114c61c1bfc0a287c201d83f" class="justify-content-end align-items-center menu-main d-flex">
                                        <div class="d-lg-block f-right main-menu d-none text-right" style="width: 100%">
                                            <nav style="display: -webkit-box;">
                                                <ul class="nav-main-top mg-left" style="width: 57%; margin-left: 11%; margin-right: -6%;">
                                                    <li class="text-center" style="width: 100%;position: relative;top: 23%;">
                                                        <form id="buscador" action="<?php echo base_url('servico/buscaServicos'); ?>" method="post">
                                                            <input type="hidden" name="busca" value="<?= $_POST['search_produto'] ? $_POST['search_produto'] : '' ?>">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control btn-search search-input3" id="search-desk" placeholder="Pesquise aqui" aria-label="Pesquise aqui" aria-describedby="button-addon2" value="<?= $_POST['search_produto'] ? $_POST['search_produto'] : '' ?>">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-primary button-search-mobile" type="submit">
                                                                        <i class="fa fa-search"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </li>
                                                </ul>


                                                <ul class="text-center" style="display: contents;">
                                                    <?php if ($this->session->userdata('cliente_logado')) { ?>
                                                        <?php if ($this->session->userdata('cliente_logado') == 1) { ?>
                                                            <li class="menu-li position-logado" style="position: relative;top: 20px;left: 80px;">
                                                                <a class="menu-link menu-a" href="<?php if (isset($_SESSION) && $_SESSION['perfil'] == 'afiliado') {
                                                                                                        echo base_url('painelAfiliado');
                                                                                                    } else {
                                                                                                        echo base_url('2b1e190210df261675c4b801bc6e8989');
                                                                                                    } ?>" <?php if ($idpag == 6) {
                                                                                                                echo 'style="color: #f9c716"';
                                                                                                            } ?>>
                                                                    <i style="font-size: 30px" class="fa fa-user-circle" aria-hidden="true"></i>
                                                                    <span style="font-size: 15px; padding-left: 5px; position: relative; bottom: 7%;"><?php
                                                                                                                                                        $nm = explode(' ', $cliente_nome);
                                                                                                                                                        echo 'Olá, ' . ucfirst(strtolower($nm[0])) . "!";
                                                                                                                                                        ?></span>
                                                                </a>
                                                            </li>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <!--<li class="menu-li" style="position: relative;top: 20px;left: 80px;">
                                                <a class="menu-link menu-a" href="<?php //echo base_url('2b1e190210df261675c4b801bc6e8989') 
                                                                                    ?>" <?php //if ($idpag == 6) { echo 'style="color: #f9c716"'; } 
                                                                                        ?>>
                                                    <i style="font-size: 30px" class="fa fa-user-circle" aria-hidden="true"></i>
                                                    <span style="font-size: 15px; padding-left: 5px">Login</span>
                                                </a>
                                            </li>-->
                                                        <li class="menu-li" style="position: relative;top: 20px;left: 80px; margin-left: 30px;">
                                                            <span class="menu-a" href="#">
                                                                <span style="font-size: 15px;"><i style="font-size: 30px; color: var(--base-color-second);" class="fa fa-user-circle"></i><span>&nbsp Faça <a style="font-weight: 500; color:white;" href="<?php echo base_url('2b1e190210df261675c4b801bc6e8989') ?>">Login</a> ou <br>
                                                                        <ul style="padding-left: 67px;">crie seu <a style="font-weight: 500; color:white;" href="<?php echo base_url('2b1e190210df261675c4b801bc6e8989') ?>">Cadastro</a>
                                                                    </span>
                                                </ul></span>
                                                </span>
                                                </li>
                                            <?php } ?>
                                            <?php if (isset($_SESSION['perfil']) && isset($_SESSION) && $_SESSION['perfil'] != 'afiliado') { ?>
                                                <li class="menu-li" style="position: relative;top: 20px;left: 110px;">
                                                    <a class="menu-link menu-a" <?php if ($idpag == 5) {
                                                                                    echo 'style="color: #f9c716"';
                                                                                } ?> href="<?php echo base_url('432b311230a5e558d6dfdd37aa7cb986'); ?>">
                                                        <i <?php if (!$mobile_view) {
                                                                echo "id='span'";
                                                            } ?> style="font-size: 30px; color: var(--base-color-second);" class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                        <!--<span style="font-size: 15px; padding-left: 5px"></span>-->
                                                        <?php if ($this->session->userdata('quantidade_carrinho')) { ?>
                                                            <?php if ($this->session->userdata('quantidade_carrinho') > 0) { ?>
                                                                <span style="background: #a75209; color: white; position: absolute;top: 19px; right: 101px; border-radius: 20px;" class="badge badge-pill badge-light"><?php echo $this->session->userdata('quantidade_carrinho') ?></span>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                            </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($mobile_view == 1) { ?>
                <div class="header-area header-transparent pt-20 menu-transparente" tyle="z-index:99; position:fixed; width:100%; background: -webkit-linear-gradient(bottom, #082b3d, var(--base-color-second));">
                    <!-- background: -webkit-linear-gradient(bottom, #082b3d, var(--base-color-second), #361c25, #4c201c); box-shadow: rgb(0 0 0 / 15%) 1.95px 1.95px 2.6px; -->
                    <div class="header-sticky main-header" <?php if (!$mobile_view) { ?>style="height: 100%; padding: 10px 30px;" <?php } ?>>

                        <div class="container-fluid" style="">
                            <!--background: -webkit-linear-gradient(bottom, #082b3d, var(--base-color-second), #4c1d1c, #4e3721);-->
                            <div class="align-items-center row">
                                <div class="col-12">
                                    <div class="d-block mobile_menu">
                                        <div class="row" style="margin-bottom: -5%;">
                                            <div class="col-6 text-center">
                                                <a class="mobile-link-logo-pos" href="<?php echo base_url('') ?>"><img class="mobile-logo" src="<?php echo base_url('imagens/site/logo.png') ?>" alt="logo" title="DataCom Notebook e Informática"></a>
                                            </div>

                                            <div class="col-6 text-right usuario-mobile" style="position: relative; right: 0; top: 0; padding: 5% 10%;">
                                                <a class="menu-link menu-a user-icon-pos" href="<?php echo base_url('2b1e190210df261675c4b801bc6e8989') ?>" style="<?php if ($idpag == 6) {
                                                                                                                                                                        echo 'color: #f9c716;';
                                                                                                                                                                    } ?>">
                                                    <i style="color: var(--base-color-second); font-size: 30px" class="fa fa-user-circle" aria-hidden="true"></i>
                                                </a>
                                                <?php if (isset($_SESSION['perfil']) && isset($_SESSION) && $_SESSION['perfil'] != 'afiliado') { ?>
                                                    <a href="<?php echo base_url('432b311230a5e558d6dfdd37aa7cb986'); ?>" class="menu-link menu-a cart-icon-pos" style="<?php if ($idpag == 5) {
                                                                                                                                                                            echo 'color: #f9c716;';
                                                                                                                                                                        } ?>">
                                                        <i style="color: var(--base-color-second); font-size: 25px" class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-2 botaoNav">
                                                <button class="navbar-toggler d-block" style="width: 60%; height: 50%; margin-top: 80%; margin-left: 30%;" type="button" id="navToggleMobile">
                                                    <i class="fas fa-bars" onclick="mySideBar()" style="color: var(--base-color-second); position: relative; left: -9px;"></i>
                                                </button>
                                            </div>
                                            <div class="col-10 search-div">
                                                <form id="buscador" action="<?php echo base_url('servico/buscaServicos'); ?>" method="post">
                                                    <div class="text-left input-group" style="margin-top: 9%; position: relative; left: -2%;">
                                                        <input id="search_produto" name="busca" type="text" class="input-lg form-control search-input" placeholder="Busque aqui" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                        <div onclick="searchTrigger()" style="position: relative;left: -12px;border-radius: 10px;" class="input-group-append search-icon-div">
                                                            <!-- <span style="background-color: var(--base-color-second); border-color: var(--base-color-second); border-radius: 10px;" class="input-group-text search-icon-i" id="basic-addon2">
                                                    <i style="color: black; font-size: 16px;" class="fa fa-search lupa" aria-hidden="true"></i>
                                                </span> -->
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- Navbar Area -->
            <?php if ($mobile_view == 0) { ?>
                <nav class="navbar navbar-expand-lg" id="mobile" style="position: fixed; top: 80px; z-index: 98; width: 100%; background: var(--base-color-second); ">
                    <!--background: -webkit-linear-gradient(bottom, #082a3c, #0b1d3b, #0c1d3a, #0b1d3b);-->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="position: relative; top: 0;">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <?php foreach ($header as $dep) {  ?>
                                <?php if (array_key_exists('subs', $dep)) { ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="<?php echo base_url('servico/buscaDepartamento/') . $dep['departamento_id'] ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?= $dep['departamento'] ?>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <?php foreach ($dep['subs'] as $sub) { ?>
                                                <a class="dropdown-item" href="<?php echo base_url('servico/buscaDepartamento/') . $sub['id'] ?>"><?= $sub['nome'] ?></a>

                                            <?php } ?>
                                        </div>
                                    <?php } else { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('servico/buscaDepartamento/') . $dep['departamento_id'] ?>"><?= $dep['departamento'] ?></a>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
            <?php } else { ?>
                <nav id="navMobile" class="navbar navbar-expand-lg fixed-top shadow navbar-offcanvas" style="max-width: 55%; background-color: #082A3C; top: 124px; z-index: 100; display: none; height: 100%; overflow-y: scroll;">
                    <div class="navbar-collapse offcanvas-collapse">
                        <div class="my-2">
                            <?php if ($this->session->userdata('cliente_logado')) { ?>
                                <?php if ($this->session->userdata('cliente_logado') == 1) { ?>
                                    <li class="menu-li">
                                        <a class="menu-link menu-a" href="<?php echo base_url('2b1e190210df261675c4b801bc6e8989') ?>" <?php if ($idpag == 6) {
                                                                                                                                            echo 'style="color: #f9c716"';
                                                                                                                                        } ?>>
                                            <span style="font-size: 15px;"><?php
                                                                            $nm = explode(' ', $cliente_nome);
                                                                            echo 'Olá, ' . ucfirst(strtolower($nm[0])) . "!";
                                                                            ?></span>
                                        </a>
                                        <?php if ($this->session->userdata('cliente_logado') == 1) { ?>
                                            <a href="<?php echo base_url('c8b39540f80ad8d4952cf79d651aec77'); ?>" class="menu-link menu-a" style="margin: 5%;<?php if ($idpag == 5) {
                                                                                                                                                                    echo 'color: #f9c716;';
                                                                                                                                                                } ?> margin-left: 8%;">
                                                <i style="color: var(--base-color-second); font-size: 20px" class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                            </a>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                            <?php } else { ?>
                                <!--<li class="menu-li" style="position: relative;top: 20px;left: 80px;">
                            <a class="menu-link menu-a" href="<?php //echo base_url('2b1e190210df261675c4b801bc6e8989') 
                                                                ?>" <?php //if ($idpag == 6) { echo 'style="color: #f9c716"'; } 
                                                                    ?>>
                                <i style="font-size: 30px" class="fa fa-user-circle" aria-hidden="true"></i>
                                <span style="font-size: 15px; padding-left: 5px">Login</span>
                            </a>
                        </li>-->
                                <li class="menu-li">
                                    <span class="menu-a" href="#">
                                        <span style="font-size: 12px !important;">&nbsp Faça <a style="font-weight: 500; color:white;" href="<?php echo base_url('2b1e190210df261675c4b801bc6e8989') ?>">Login</a> ou <a style="font-weight: 500; color:white;" href="<?php echo base_url('2b1e190210df261675c4b801bc6e8989') ?>">Cadastro</a></span>
                                    </span>
                                </li>
                            <?php } ?>
                        </div>

                        <li class="nav-item" style="margin-top: 10%; margin-bottom: 8%;">
                            <!--<a href="<?php echo base_url('432b311230a5e558d6dfdd37aa7cb986'); ?>" class="menu-link menu-a" style="margin: 5%;<?php if ($idpag == 5) {
                                                                                                                                                        echo 'color: #f9c716;';
                                                                                                                                                    } ?>">-->
                            <!--    <i style="color: var(--base-color-second); font-size: 20px" class="fa fa-shopping-cart" aria-hidden="true"></i>-->
                            <!--</a>-->
                        </li>

                        <ul class="navbar-nav mr-auto demoScroll sc1">
                            <div class='h500'>
                                <li class="nav-item active">
                                    <a class="nav-link p-2" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <!--<li class="nav-item">-->
                                <!--  <a class="nav-link" href="#">Link</a>-->
                                <!--</li>-->
                                <?php foreach ($header as $key => $dep) {  ?>
                                    <!-- <?php if (array_key_exists('subs', $dep)) { ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="<?php echo base_url('servico/buscaDepartamento/') . $dep['departamento_id'] ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?= $dep['departamento'] ?>
                                        </a>
                                            
                                        <?php foreach ($dep['subs'] as $sub) { ?>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="<?php echo base_url('servico/buscaDepartamento/') . $sub['id'] ?>"><?= $sub['nome'] ?></a>
                                            </div>
                                <?php } ?>
                            <?php } else { ?>
                                        <li class="nav-item">
                                             <a class="nav-link" href="<?php echo base_url('servico/buscaDepartamento/') . $dep['departamento_id'] ?>"><?= $dep['departamento'] ?></a>
                                        </li>
                            <?php } ?> -->

                                    <li class="text-left p-2">
                                        <strong><a style="font-size: 18px; font-weight:700" href="<?php echo base_url('servico/buscaDepartamento/') . $dep['departamento_id'] ?>"><?php echo $dep['departamento']; ?></a></strong>
                                        <?php if (array_key_exists('subs', $dep)) : ?>
                                            <i class="fa fa-angle-down" style="font-size: 22px; color: var(--light); transform: translateY(4px);" id="trigger_<?= $key ?>" aria-hidden="true"></i>
                                        <?php endif ?>
                                        <?php if (array_key_exists('subs', $dep)) { ?>
                                            <ul class="d-none pt-2" id="triggered_<?= $key ?>">
                                                <?php foreach ($dep['subs'] as $sub) { ?>
                                                    <li><a class="mt-2" style="margin-left: 8px;" href="<?php echo base_url('servico/buscaDepartamento/') . $sub['id'] ?>"><?php echo $sub['nome']; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                    <script>
                                        $("#trigger_<?= $key ?>").click(function() {
                                            $("#triggered_<?= $key ?>").toggleClass("d-none");
                                        });
                                    </script>

                                <?php } ?>
                            </div>
                        </ul>
                        <!--<div class="row" style="">-->
                        <!--    <div>-->
                        <!--        <a href="<?php echo base_url('432b311230a5e558d6dfdd37aa7cb986'); ?>" class="menu-link menu-a" style="margin: 5%;<?php if ($idpag == 5) {
                                                                                                                                                            echo 'color: #f9c716;';
                                                                                                                                                        } ?>">-->
                        <!--            <i style="color: var(--base-color-second); font-size: 20px" class="fa fa-shopping-cart" aria-hidden="true"></i>-->
                        <!--        </a>-->
                        <!--    </div>-->
                        <!--    <div>-->
                        <!--        <a href="<?php echo base_url('c8b39540f80ad8d4952cf79d651aec77'); ?>" class="menu-link menu-a" style="margin: 5%;<?php if ($idpag == 5) {
                                                                                                                                                            echo 'color: #f9c716;';
                                                                                                                                                        } ?>">-->
                        <!--            <i style="color: var(--base-color-second); font-size: 20px" class="fas fa-sign-out-alt" aria-hidden="true"></i>-->
                        <!--        </a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    </div>
                </nav>
            <?php } ?>

        </header>

        <main>

            <div style="<?php if ($mobile_view == 0) {
                            echo 'padding-top: 4%';
                        } ?>"></div>

            <script>
                function mySideBar() {
                    var x = document.getElementById("navMobile");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                }

                function Submit2(departamento) {
                    var form = document.createElement("form");
                    form.method = "GET";
                    form.action = "<?php echo base_url('servico/buscaDepartamentos'); ?>";

                    var element1 = document.createElement("input");
                    element1.value = departamento;
                    element1.name = "busca";
                    form.appendChild(element1);

                    document.body.appendChild(form);

                    form.submit();
                }
            </script>

            <script>
                function searchTrigger() {
                    if ($("input[name=search_produto]").val() != "" && $('input[name=search_produto]').val() != " " && $('input[name=search_produto]').val() != null) {
                        $('#buscador').submit();
                    }
                }
                
                $( document ).ready(function() {
                    $( ".search-input3" ).keyup(function() {
                        $('input[name=busca]').val($(this).val());
                    });
                });
            </script>

            <script>
                $(window).on('load', function() {
                    $('#processamentoPagamento').hide();
                    $('#preloader .inner').fadeOut();
                    $('#preloader').delay(350).fadeOut('slow');
                    $('body').delay(350).css({
                        'overflow': 'visible'
                    });
                })
            </script>


            <script>
                function searchTrigger() {
                    if ($('#search_produto').val() != "" && $('#search_produto').val() != " " && $('#search_produto').val() != null) {
                        $('#buscador').submit();
                    }
                }
            </script>

            <script>
                // $(document).ready(function(){
                //     $('[data-toggle="offcanvas"], #navToggleMobile').on('click', function(0{
                //         $('.offcanvas-collapse').toggleClass('open')
                //     }))
                // })
            </script>