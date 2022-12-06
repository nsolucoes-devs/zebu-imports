<!doctype html>
<html class="no-js" lang="pt-br">
<head>
    <!-- meta descrição -->
    <title>Menezes Macedo</title>
    <meta name="title" content ="Menezes Macedo Advogados">
    <meta name="author" content="N Soluções Agência Digital - https://nsolucoes.digital/" />
    <meta name="description" content="Menezes Macedo Advogados, nossa equipe conta com advogados associados e parceiros selecionados de acordo com suas competetencias e know-how." />
    <meta name="keywords" content="advogados, advogado, processo, trabalhista, macedo, menezes, advocacia, oab, patrimonio, familia" />
    
    
    <!--===============================================================================================-->	
	    <link rel="icon" type="image/png" href="<?php echo base_url() ?>recursos/img/favicon.ico"/>
    <!--===============================================================================================-->
    	<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?> assets/fontawesome5/css/all.css">
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
        $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
        $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
        $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
        $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
        $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
        if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
            $mobile_view = 1;
        } else {
            $mobile_view = 0;
        }
        
        if($iphone){
            echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />';
        }else{
            echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        }
        
        if(isset($script)){
            print_r($script);
        }
        
    ?>
	
	
    
    <style>
        body {
          overflow: hidden; 
        }
        #preloader {
            position:fixed;
            top:0;
            left:0;
            right:0;
            bottom:0;
            background-color: black; /* cor do background que vai ocupar o body */
            z-index:999; /* z-index para jogar para frente e sobrepor tudo */
        }
        #preloader .inner {
            position: absolute;
            top: 50%; /* centralizar a parte interna do preload (onde fica a animação)*/
            left: 50%;
            transform: translate(-50%, -50%);  
        }
        .bolas > div {
            
          display: inline-block;
          background-color: #f9c716;
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
        .bolas > div:nth-child(1) {
            animation-duration:0.75s ;
            animation-delay: 0;
        }
        .bolas > div:nth-child(2) {
            animation-duration: 0.75s ;
            animation-delay: 0.12s;
        }
        .bolas > div:nth-child(3) {
            animation-duration: 0.75s  ;
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

    
        a:hover{text-decoration: none!important;}
        .slicknav_nav { background: linear-gradient(rgba(120, 0, 167, 1), rgba(120, 0, 167, 1)); float: right; margin-top: 11px; width: 50%; text-align: center; border-bottom: 0px solid transparent; }
        .menu-transparente { height: 120px; padding-top: 10px; background: black; }
        .header-sticky .sticky-bar { background: linear-gradient(rgba(117, 55, 10, 1), rgba(25, 23, 22, 1)); box-shadow: unset!important; }
        .mobile_menu .slicknav_menu .slicknav_nav { margin-top: -15px!important; z-index: 20; width: auto; }
        .slicknav_nav a { font-size: 14px; font-weight: 400; color: #ffffff; text-transform: capitalize; }
        .menu-a { padding: 20px 10px!important; cursor: pointer;}
        .menu-link { font-weight: bold!important; }
        .menu-link:hover { color: #f9c716!important; }
        .mobile_menu .slicknav_menu .slicknav_btn .slicknav_icon-bar { background-color: #ca8e02 !important; }
        .container { max-width: 100%; }
        .header-sticky.sticky-bar { background: #3a0b0c; }
        .search-icon-div{background-color: white;border-radius: 0;border-top-right-radius: 3px;border-bottom-right-radius: 0px;}
        .search-icon-i{background: white;cursor: text;border-radius: 0;border-top-right-radius: 10px;border-bottom-right-radius: 10px;}
        .btn-primary{font-weight: 700;color: black;background-color: #f5d216;border-color: #f5d216;box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;}
        .btn-primary:hover{background-color: white;border-color: #f5d21657;color: black;}
        .btn-primary:active{background-color: white!important;border-color: #f5d21657!important;color: #f5d216!important;}
        .mobile-logo{width: 150px;height: auto;z-index: 1;position: relative;left: 10%;top: 4px;}
        .menu-transparente{height: 85px;padding: 4px;}
        .main-header{padding: 0!important;}
        .menu-a{color: white!important;}
        .search-input{height: 30px!important;font-size: 12px;}
        .header-sticky.sticky-bar {background: black;}
        li{list-style: none;}

        /* XX-Small devices (300px and up) */
        @media ( min-width: 299px ) and ( max-width: 398px ) {
            .logo-img { width: 50px; }
            .mobile_menu .slicknav_menu .slicknav_nav { margin-top: -57px!important; margin-right: 55px; }
            .slicknav_menu .slicknav_icon { margin-top: 15px; }
            .menu-transparente{height: 135px!important;}
            #search_produto{border-radius: 10px;height: 45px!important;font-size: 16px;left: 5%;font-weight: 700;}
            #search_produto:focus{z-index: 0;}
            .mobile_menu .slicknav_menu .slicknav_btn{ top: -13px; }
            .container-fluid { height: 60px; }
            .menu-a { padding: 15px 10px!important; }
            .menu-user_name {left: 68px!important;}
        }
        
        /* X-Small devices (iPhone and others mobiles, 400px and up) */
        @media ( min-width: 399px ) and ( max-width: 574px ) {
            .logo-img { width: 50px; }
            .mobile_menu .slicknav_menu .slicknav_nav { margin-top: -57px!important; margin-right: 55px; }
            .slicknav_menu .slicknav_icon { margin-top: 15px; }
            .menu-transparente{height: 135px!important;}
            #search_produto{border-radius: 10px;height: 45px!important;font-size: 16px;left: 5%;}
            #search_produto:focus{z-index: 0;}
            .menu-user_name {left: 80px!important;}
            
        }
        
        /* Small devices (landscape phones, 576px and up) */
        @media ( min-width: 575px ) and ( max-width: 766px ) {
            .logo-img { width: 60px; }
            .mobile_menu .slicknav_menu .slicknav_nav { margin-top: -57px!important; margin-right: 55px; }
            .slicknav_menu .slicknav_icon { margin-top: 15px; }
            .menu-transparente{height: 135px!important;}
            #search_produto{border-radius: 10px;height: 45px!important;font-size: 16px;left: 5%;}
            #search_produto:focus{z-index: 0;}
        }
    
        /* Medium devices (tablets, 768px and up) */
        @media ( min-width: 767px ) and ( max-width: 990px ) {
            .logo-img { width: 70px; }
            .mobile-logo{left: -17%;}
            .mobile_menu .slicknav_menu .slicknav_nav { margin-top: -57px!important; margin-right: 55px; }
            .slicknav_menu .slicknav_icon { margin-top: 15px; }
            .menu-transparente{height: 135px!important;}
            #search_produto{border-radius: 10px;height: 45px!important;font-size: 16px;left: 0.5%;}
            #search_produto:focus{z-index: 0;}
            #buscador {position: relative; bottom: 38%;}
            .usuario-mobile{left: 14%!important; top: 10px!important;}
            .carrinho-mobile{left: 15%!important; top: 10px!important;}
            .menu-user_name{left: 193px!important;}
        }
    
        /* Large devices (desktops, 992px and up) */
        @media ( min-width: 991px ) and ( max-width: 1198px ) {
            .logo-img { width: 87px; }
            .mobile-logo{left: -27%;}
            .mobile_menu .slicknav_menu .slicknav_nav { margin-top: -57px!important; margin-right: 55px; }
            .slicknav_menu .slicknav_icon { margin-top: 15px; }
            .menu-transparente{height: 135px!important;}
            #search_produto{border-radius: 10px;height: 45px!important;font-size: 16px;left: 0%;}
            #search_produto:focus{z-index: 0;}
            #buscador {position: relative; bottom: 38%;}
            .usuario-mobile{left: 18%!important; top: 10px!important;}
            .carrinho-mobile{left: 19%!important; top: 10px!important;}
            .menu-user_name{left: 275px!important;}
        }
    
        /* X-Large devices (large desktops, 1200px and up) */
        @media ( min-width: 1199px ) and ( max-width: 1398px ) {
            .logo-img { width: 160px;margin-left: 35px;margin-bottom: 10px;}
        }
        
        /* XX-Large devices (larger desktops, 1400px and up) */
        @media ( min-width: 1399px ) {
            .logo-img { width: 180px; }
        }
    </style>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y2P1JNN26Y"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-Y2P1JNN26Y');
    </script>
    
</head>

<?php 
    if($this->session->userdata('cliente_nome')){
        $cliente_nome = $this->session->userdata('cliente_nome');
        $aux_nome = explode(' ', $cliente_nome);
        if(count($aux_nome) > 1){
            $cliente_nome = $aux_nome[0] . ' ' . $aux_nome[1];    
        } else {
            $cliente_nome = $aux_nome[0];
        }
         
    }
?>

<body>
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
    <div class="header-area header-transparent pt-20 menu-transparente" style="box-shadow: rgb(0 0 0 / 15%) 1.95px 1.95px 2.6px; z-index:99; position:fixed; width:100%;">
        <div class="header-sticky main-header" <?php if(!$mobile_view){ ?>style="height: 100%; padding: 10px 30px;"<?php } ?>>
            
            <div class="container-fluid">
                <div class="align-items-center row">
                <!-- div do menu -->
                    <?php if($mobile_view == 0){ ?>
                    <div class="col-md-2 text-center">
                        <a href="<?php echo base_url('') ?>">
                            <img class="logo-img" style="z-index: 1;"src="<?php echo base_url('imagens/site/logo.png') ?>"alt="logo" title="Menezes Macedo Advogados">
                        </a>
                    </div>
                    
                    <div class="col-md-10">
                        <div id="div_c8d955c8114c61c1bfc0a287c201d83f" class="justify-content-end align-items-center menu-main d-flex">
                            <div class="d-lg-block f-right main-menu d-none text-right" style="width: 100%">
                                <nav style="display: -webkit-box;">
                                    <ul class="nav-main-top mg-left" style="width: 50%">
                                        <li class="text-center" style="width: 100%;position: relative;top: 23%;">
                                            <form id="buscador" action="<?php echo base_url('servico/buscaServicos');?>" method="post">
                                                <input style="font-weight: 500; height: 45px;" name="busca" id="search_produto" type="text" class="form-control" placeholder="Busque seu Serviço" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                <i onclick="searchTrigger()" style="cursor: pointer;color: #f8c926bf;font-size: 25px;position: relative;top: -36px;right: -45%;" class="fa fa-search" aria-hidden="true"></i>
                                            </form>
                                        </li>
                                    </ul>
                                    
                                    
                                    <ul class="text-center" style="display: contents;">
                                        <?php if($this->session->userdata('cliente_logado')) { ?>
                                            <?php if($this->session->userdata('cliente_logado') == 1){ ?>
                                                <li class="menu-li" style="position: relative;top: 20px;left: 80px;">
                                                    <a class="menu-link menu-a" href="<?php echo base_url('2b1e190210df261675c4b801bc6e8989') ?>" <?php if ($idpag == 6) { echo 'style="color: #f9c716"'; } ?>>
                                                        <i style="font-size: 30px" class="fa fa-user-circle" aria-hidden="true"></i>
                                                        <span style="font-size: 15px; padding-left: 5px"><?php
                                                            $nm = explode(' ', $cliente_nome);
                                                            echo 'Olá, '.ucfirst(strtolower($nm[0]))."!";
                                                        ?></span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <!--<li class="menu-li" style="position: relative;top: 20px;left: 80px;">
                                                <a class="menu-link menu-a" href="<?php //echo base_url('2b1e190210df261675c4b801bc6e8989') ?>" <?php //if ($idpag == 6) { echo 'style="color: #f9c716"'; } ?>>
                                                    <i style="font-size: 30px" class="fa fa-user-circle" aria-hidden="true"></i>
                                                    <span style="font-size: 15px; padding-left: 5px">Login</span>
                                                </a>
                                            </li>-->
                                            <li class="menu-li" style="position: relative;top: 20px;left: 80px;">
                                                <a class="menu-link menu-a" href="<?php echo base_url('2b1e190210df261675c4b801bc6e8989') ?>" <?php if ($idpag == 6) { echo 'style="color: #f9c716"'; } ?>>
                                                    <i style="font-size: 30px" class="fa fa-user-circle" aria-hidden="true"></i>
                                                    <span style="font-size: 15px; padding-left: 5px">Login</span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                        <li class="menu-li" style="position: relative;top: 20px;left: 130px;">
                                            <a class="menu-link menu-a" <?php if ($idpag == 5) { echo 'style="color: #f9c716"'; } ?> href="<?php echo base_url('432b311230a5e558d6dfdd37aa7cb986');?>">
                                                <i <?php if(!$mobile_view){echo "id='span'";} ?> style="font-size: 30px" class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                <span style="font-size: 15px; padding-left: 5px">Serviços Selecionados</span>
                                                <?php if($this->session->userdata('quantidade_carrinho')) { ?>
                                                    <?php if($this->session->userdata('quantidade_carrinho') > 0) { ?>
                                                        <span style="background: #a75209; color: white; position: absolute;top: 19px; right: 101px; border-radius: 20px;" class="badge badge-pill badge-light"><?php echo $this->session->userdata('quantidade_carrinho') ?></span>
                                                    <?php } ?>
                                                <?php } ?>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <?php if($mobile_view == 1){ ?>
                    
                    <div class="col-12">
                        <div class="d-block mobile_menu">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <a href="<?php echo base_url('') ?>"><img class="mobile-logo" src="<?php echo base_url('imagens/site/logo.png') ?>" alt="logo" title="Menezes Macedo Advogados"></a>
                                </div>
                                
                                <div class="col-4 text-right usuario-mobile" style="position: relative;left: 8%; top: 16px;">
                                    <a class="menu-link menu-a" href="<?php echo base_url('2b1e190210df261675c4b801bc6e8989') ?>" <?php if ($idpag == 6) { echo 'style="color: #f9c716"'; } ?>>
                                        <i style="font-size: 30px" class="fa fa-user-circle" aria-hidden="true"></i>
                                        <?php if(isset($cliente_nome)){ ?>
                                            <span class="menu-user_name"style="position: absolute; font-size: 11px; left: 60px; top: 32px;"><?php
                                                $nm = explode(' ', $cliente_nome);
                                                echo ucfirst(strtolower($nm[0]));
                                            ?></span>
                                        <?php } ?>
                                    </a>
                                </div>
                                
                                <div class="col-3 text-left carrinho-mobile" style="position: relative;left: 8%;top: 16px;">
                                    <a href="<?php echo base_url('432b311230a5e558d6dfdd37aa7cb986');?>" class="menu-link menu-a" <?php if ($idpag == 5) { echo 'style="color: #f9c716"'; } ?>>
                                        <i style="font-size: 30px" class="fa fa-shopping-basket" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-md-12 search-div">
                                    <form id="buscador" action="<?php echo base_url('servico/buscaServicos');?>" method="post">
                                        <div class="text-left input-group" style="margin-top: 6%;">
                                            <input id="search_produto" name="busca" type="text" class="input-lg form-control search-input" placeholder="Busque seu Serviço" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div onclick="searchTrigger()" style="position: relative;left: -12px;border-radius: 10px;" class="input-group-append search-icon-div">
                                                <span style="background: #f5d216!important;border-radius: 10px;" class="input-group-text search-icon-i" id="basic-addon2">
                                                    <i style="color: black; font-size: 25px;" class="fa fa-search lupa" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</header>
    
    <main>
        
    <script>

        $(window).on('load', function () {
            $('#processamentoPagamento').hide();
            $('#preloader .inner').fadeOut();
            $('#preloader').delay(350).fadeOut('slow'); 
            $('body').delay(350).css({'overflow': 'visible'});
        })

    </script>
    
        
    <script>
        function searchTrigger(){
            if($('#search_produto').val() != "" && $('#search_produto').val() != " " && $('#search_produto').val() != null){
                $('#buscador').submit();
            }
        }
    </script>
    
    