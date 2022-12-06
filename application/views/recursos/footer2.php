    <?php
        $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
        $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
        $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
        $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
        $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
        if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
            $mobile_view = true;
        } else {
            $mobile_view = false;
        }
    ?>
    
    <link rel="stylesheet" href="assets/fontawesome5/css/all.css">
    
    <style>
    
    
    
        .footer{background-color: black; z-index: 99;}
        .f-white{color: white; font-size: 11px; line-height: 13px; margin-bottom: 5px;}
        .f-white b{color: white; font-size: 11px; line-height: 13px; margin-bottom: 5px; font-weight: bold;}
        .cookie-pc { width: 100%; display: block; padding: 10px 20px; }
        .cookie-mob { width: 100%; display: none; }
        #div_cookies { z-index: 1000; position: fixed; bottom: 10px; width: 80%; margin-left: 10%; margin-right: 10%; background-color: white; -webkit-box-shadow: 0 0 10px grey; box-shadow: 0 0 10px grey; }
        .cookie-10 { flex: 0 0 83.33%; max-width: 83.33%; width: 83.33%; float: left; padding: 10px 20px; }
        .cookie-2 { flex: 0 0 16.66%; max-width: 16.66%; width: 16.66%; height: 100%; float: left; position: relative; }
        .frase { font-size: 12px; color: black; font-weight: bold; margin-bottom: 10px; text-align: justify; line-height: 20px; margin-bottom: 0; }
        #acc_cookies, #acc_cookies2 { color: white; border-radius: 0; padding: 15px 20px 15px 20px; font-size: 14px; width: 100%; height: 100%; background-color: #7800a7; border-color: #7800a7; }
        #acc_cookies2 { display: none; }
        #footer-mob{display: none;}
        .large-modal{width: 70%; max-width: 70%;}
        .espacamento-icone{margin-right: 15%;}
        
        /* XX-Small devices (300px and up) */ 
        @media ( min-width: 299px ) and ( max-width: 398px ){
            #footer-pc{display: none;}
            #footer-mob{display: block;}
            .large-modal{width: 95%; max-width: 95%;}
            footer{
                font-size: 40px!important;
            }
            .cookie-pc { display: none; }
            .cookie-mob { display: block; padding: 10px 20px; }
            .cookie-12 { flex: 0 0 100%; max-width: 100%; float: left; position: relative; }
            .frase { line-height: 13px; }
            .cookie-10 { flex: 0 0 70%; max-width: 70%; float: left; padding: 10px 20px; }
            .cookie-2 { flex: 0 0 30%; max-width: 30%; float: left; position: relative; }
            #acc_cookies { display: none; }
            #acc_cookies2 { display: block; text-align: center; margin-top: 10px; font-size: 12px; line-height: 0px; }
        }
        /* X-Small devices (iPhone and others mobiles, 400px and up) */ 
        @media ( min-width: 399px ) and ( max-width: 574px ){
            #footer-pc{display: none;}
            #footer-mob{display: block;}
            .large-modal{width: 95%; max-width: 95%;}
            footer{
                font-size: 40px!important;
            }
            .cookie-pc { display: none; }
            .cookie-mob { display: block; padding: 10px 20px; }
            .cookie-12 { flex: 0 0 100%; max-width: 100%; float: left; position: relative; }
            .frase { line-height: 13px; }
            .cookie-10 { flex: 0 0 70%; max-width: 70%; float: left; padding: 10px 20px; }
            .cookie-2 { flex: 0 0 30%; max-width: 30%; float: left; position: relative; }
            #acc_cookies { display: none; }
            #acc_cookies2 { display: block; text-align: center; margin-top: 10px; font-size: 12px; line-height: 0px; }
            .espacamento-icone{margin-right: 15%;}
        }
        /* Small devices (landscape phones, 576px and up) */ 
        @media ( min-width: 575px ) and ( max-width: 766px ){
            #footer-pc{display: none;}
            #footer-mob{display: block;}
            .large-modal{width: 95%; max-width: 95%;}
            footer{
                font-size: 40px!important;
            }
            .cookie-pc { display: none; }
            .cookie-mob { display: block; }
            .cookie-12 { flex: 0 0 100%; max-width: 100%; float: left; position: relative; }
            .frase { line-height: 13px; }
            .cookie-10 { flex: 0 0 70%; max-width: 70%; float: left; padding: 10px 20px; }
            .cookie-2 { flex: 0 0 30%; max-width: 30%; float: left; position: relative; }
            #acc_cookies { display: none; }
            #acc_cookies2 { display: block; text-align: center; margin-top: 10px; font-size: 12px; line-height: 0px; }
        }
        /* Medium devices (tablets, 768px and up) */ 
        @media ( min-width: 767px ) and ( max-width: 990px ){
            #footer-pc{display: none;}
            #footer-mob{display: block;}
            .large-modal{width: 95%; max-width: 95%;}
            footer{
                font-size: 40px!important;
            }
            .cookie-pc { display: none; }
            .cookie-mob { display: block; padding: 10px 20px; }
            .cookie-12 { flex: 0 0 100%; max-width: 100%; float: left; position: relative; }
            .frase { line-height: 13px; }
            .cookie-10 { flex: 0 0 70%; max-width: 70%; float: left; padding: 10px 20px; }
            .cookie-2 { flex: 0 0 30%; max-width: 30%; float: left; position: relative; }
            #acc_cookies { display: none; }
            #acc_cookies2 { display: block; text-align: center; margin-top: 10px; font-size: 12px; line-height: 0px; }
        }
        /* Large devices (desktops, 992px and up) */ 
        @media ( min-width: 991px ) and ( max-width: 1198px ){
            #footer-pc{display: none;}
            #footer-mob{display: block;}
            .large-modal{width: 95%; max-width: 95%;}
            footer{
                font-size: 40px!important;
            }
            .cookie-pc { display: none; }
            .cookie-mob { display: block; padding: 10px 20px; }
            .cookie-12 { flex: 0 0 100%; max-width: 100%; float: left; position: relative; }
            .frase { line-height: 13px; }
            .cookie-10 { flex: 0 0 70%; max-width: 70%; float: left; padding: 10px 20px; }
            .cookie-2 { flex: 0 0 30%; max-width: 30%; float: left; position: relative; }
            #acc_cookies { display: none; }
            #acc_cookies2 { display: block; text-align: center; margin-top: 10px; font-size: 12px; line-height: 0px; }
        }
        /* X-Large devices (large desktops, 1200px and up) */ 
        @media ( min-width: 1199px ) and ( max-width: 1398px ){
        }
        /* XX-Large devices (larger desktops, 1400px and up) */ 
        @media ( min-width: 1399px ){
        }
        #back-top{left: 15px; right: unset; bottom: 52px; background-color: grey; border-color: grey; opacity: 0.7; box-shadow: unset; z-index: 999; display: none;}
        .link-footer{cursor: pointer;}
        .p-footer{color: #a7a7a7;; margin: 0; padding: 0; font-size: 12px; line-height: 18px; cursor: pointer;}
        .p-footer:hover{color: white;}
        
        footer {
          width: 100%;
          font-size: 100px;
          background: black;
        }
        
        .social-footer{
            font-size: 25px;
            position: absolute;
            color: #f9c717;
        }
        
        .social-footer:hover{
            color: white;
        }
        
        .fa-arrow-up{
            color: black;
        }
        
        #back-top{
            background: #f5d216;
            color: black;
            left: unset;
            right: 20px;
            position: fixed;
            border-radius: 100%;
            padding: 5px 15px;
        }
        
        .new-cookie{
            visibility: hidden;
        }
        #new-cookie{
            z-index: 1000;
            position: fixed;
            width: 100%;
            margin-left: 0;
            margin-right: 0;
            background-color: white;
            bottom: 0;
            visibility: visible;
            box-shadow: 0px 0 10px rgba(0, 0, 0, 0.8);
        }
        .new-cookie-btn{
            font-size: 11px;
            margin-top: -4px;
            color: white;
            border: 2px solid #3a0b0c;
            background-color: #3a0b0c;
        }
        
        <?php if($mobile_view){ ?>
        #back-top{
            float: right;
        }
        <?php } ?>
    </style>
    
    
    <!--<div class="row" id="div_cookies" style="display: none">-->
    <!--    <div class="cookie-pc">-->
    <!--        <div class="cookie-10">-->
    <!--            <p class="frase">Usamos cookies para melhorar a sua experiência em nossa plataforma. Ao continuar navegando, você concorda com a nossa <a style="color: red; cursor: pointer" onclick="showPrivacidade()">Política de Privacidade</a>.</p>-->
    <!--        </div>-->
    <!--        <div class="cookie-2">-->
    <!--            <button type="button" id="acc_cookies" class="btn header-btn">Continuar e Fechar</button>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="cookie-mob">-->
    <!--        <div class="cookie-12">-->
    <!--            <p class="frase">Usamos cookies para melhorar a sua experiência em nossa plataforma. Ao continuar navegando, você concorda com a nossa <a style="color: red; cursor: pointer" onclick="showPrivacidade()">Política de Privacidade</a>.</p>-->
    <!--            <button type="button" id="acc_cookies2" class="btn header-btn">Continuar</button>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <div class="row new-cookie" id="new-cookie" style="display: none">
        <div class="cookie-pc col-md-12">
            <div class="row">
                <div class="col-md-10">
                    <p class="frase" style="margin-top: 5px;">Ao clicar em "Aceitar e Fechar", você concorda com o armazenamento de cookies em seu dispositivo. Para mais detalhes, leia nossa <span data-toggle="modal" data-target="#privacidade" style="color: red; cursor: pointer">Política de Privacidade</span>.</p>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" onclick="acceptCookie()" style="height: auto; padding: 4px;">Aceitar e Fechar</button>
                </div>
            </div>
        </div>
        
        <div class="cookie-mob col-md-12">
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 30px">
                    <p class="frase text-center" style="margin-top: 5px;">Nós usamos cookies para aprimorar seu acesso.<br> Ver <a style="color: red" data-toggle="modal" data-target="#privacidade">Política de Privacidade</a>.</p>
                </div>
                <div class="col-md-12 text-center" style="margin-bottom: 10px">
                    <button type="button" class="btn btn-primary" onclick="acceptCookie()" style="height: auto; padding: 4px;">Aceitar e Fechar</button>
                </div>
            </div>
        </div>
    </div>
    
    
    </main>
    
    <footer <?php if($mobile_view == 1){ ?>style="margin-bottom: -5%;"<?php } ?>>
        <!-- Footer Start-->
        <div class="row" id="footer-pc" style="background: black; padding-bottom: 3%; width: 100%;">
            <div class="col-md-4 text-center">
                <div class="row">
                    <a href="<?php echo base_url() ?>">
                        <img src="<?php echo base_url('imagens/site/logo.png') ?>" style="width: 60%; margin-bottom: 15px">
                    </a>
                </div>
                <div class="row" style="margin-left: 8%;">
                    <div class="col-md-2">
                        <?php if(isset($facebook)){ ?>
                            <a href="<?php echo $facebook ?>" target="_blank">
                                <i class="social-footer fab fa-facebook-square" aria-hidden="true"></i>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="col-md-2">
                        <?php if(isset($instagram)){ ?>
                            <a href="<?php echo $instagram ?>" target="_blank">
                                <i class="social-footer fab fa-instagram" aria-hidden="true"></i>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="col-md-2">
                        <?php if(isset($linkedin)){ ?>
                            <a href="<?php echo $linkedin ?>" target="_blank">
                                <i class="social-footer fab fa-linkedin" aria-hidden="true"></i>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="col-md-2">
                        <a href="https://www.youtube.com/channel/UCRTfUsc8f7q0mVTyDLdQqhg" target="_blank">
                            <i class="social-footer fab fa-youtube" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="https://www.tiktok.com/@menezesmacedoadv?lang=pt-BR" target="_blank">
                            <i class="social-footer fab fa-tiktok" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="endereco-ipad" style="position: relative;top: 45%;left: 12%;">
                    <p class="f-white link-footer"><b>Escritório</b></p>
                    <?php if(isset($endereco)){ ?>
                        <p class="p-footer"><?php echo $endereco ?></p></a>
                    <?php } ?>
                    <?php if(isset($email)){ ?>
                        <p class="p-footer"><?php echo $email ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4">
                <img src="<?php echo base_url('imagens/logo-footer.png') ?>" style="width: 25%;position: relative;left: 36%;top: -3%;margin-bottom: 15px">
                <a href="https://nsolucoes.digital/" target="_blank">
                    <p style="color: white; font-weight: 900; font-size: 13px; position: relative; left: 25%; width: 50%;" class="f-white">Desenvolvido por N Soluções</p>
                </a>
            </div>
        </div>
        <!-- Footer mobile -->
        <div class="row w-100" id="footer-mob" style="background: black;">
            <div class="text-center form-group" style="position: relative; left: 6%; padding-top: 10%; width: 98%;">
                <a href="<?php echo base_url() ?>">
                    <img src="<?php echo base_url('imagens/site/logo.png') ?>" style="width: 50%; margin-bottom: 15px">
                </a>
            </div>
            <div class="text-center form-group" style="position: relative; left: 15%; width: 88%;">
                <?php if(isset($facebook)){ ?>
                    <a href="<?php echo $facebook ?>" class="espacamento-icone" target="_blank">
                        <i class="social-footer fab fa-facebook-square" aria-hidden="true"></i>
                    </a>
                <?php } ?>
                <?php if(isset($instagram)){ ?>
                    <a href="<?php echo $instagram ?>" class="espacamento-icone" target="_blank">
                        <i class="social-footer fab fa-instagram" aria-hidden="true"></i>
                    </a>
                <?php } ?>
                <?php if(isset($linkedin)){ ?>
                    <a href="<?php echo $linkedin ?>" class="espacamento-icone" target="_blank">
                        <i class="social-footer fab fa-linkedin" aria-hidden="true"></i>
                    </a>
                <?php } ?>
                    <a href="https://www.youtube.com/channel/UCRTfUsc8f7q0mVTyDLdQqhg" class="espacamento-icone" target="_blank">
                        <i class="social-footer fab fa-youtube" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.tiktok.com/@menezesmacedoadv?lang=pt-BR" class="espacamento-icone" target="_blank">
                        <i class="social-footer fab fa-tiktok" aria-hidden="true"></i>
                    </a>
            </div>
            <div class=" text-center form-group" style="position: relative; left: 10%; width: 88%;">
                <p class="f-white link-footer"><b>Escritório de Vendas</b></p>
                <?php if(isset($endereco)){ ?>
                    <p class="p-footer" style="font-size: 10px;"><?php echo $endereco ?></p></a>
                <?php } ?>
                <?php if(isset($email)){ ?>
                    <p class="p-footer"><?php echo $email ?></p>
                <?php } ?>
            </div>
            <div class="text-center form-group" style="position: relative; left: 10%; width: 88%;">
                <img src="<?php echo base_url('imagens/logo-footer.png') ?>" style="width: 25%; padding-top: 2%;">
                <p style="color: white; font-weight: 900; font-size: 13px; padding-top: 5%; padding-bottom: 10%;" class="f-white">Desenvolvido por N Soluções</p>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    
    <div class="modal" tabindex="-1" role="dialog" id="sobre">
        <div class="modal-dialog modal-dialog-centered large-modal" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0; padding: 10px 20px;">
                    <h5 class="modal-title" style="color: black; font-weight: bold; font-size: 16px;">Sobre a Loja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(isset($sobre_loja)) { ?>
                                <?php echo $sobre_loja ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 0; padding: 10px 20px;">
                    <div style="width: 100px">
                        <button type="button" class="btn-main" data-dismiss="modal" style="font-size: 14px">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" tabindex="-1" role="dialog" id="entrega">
        <div class="modal-dialog modal-dialog-centered large-modal" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0; padding: 10px 20px;">
                    <h5 class="modal-title" style="color: black; font-weight: bold; font-size: 16px;">Política de Entrega</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(isset($politica_entrega)) { ?>
                                <?php echo $politica_entrega ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 0; padding: 10px 20px;">
                    <div style="width: 100px">
                        <button type="button" class="btn-main" data-dismiss="modal" style="font-size: 14px">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" tabindex="-1" role="dialog" id="privacidade">
        <div class="modal-dialog modal-dialog-centered large-modal" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0; padding: 10px 20px;">
                    <h5 class="modal-title" style="color: black; font-weight: bold; font-size: 16px;">Política de privacidade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(isset($politica_privacidade)) { ?>
                                <?php echo $politica_privacidade ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 0; padding: 10px 20px;">
                    <div style="width: 100px">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" style="font-size: 14px">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" tabindex="-1" role="dialog" id="termos">
        <div class="modal-dialog modal-dialog-centered large-modal" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0; padding: 10px 20px;">
                    <h5 class="modal-title" style="color: black; font-weight: bold; font-size: 16px;">Termos e condições</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(isset($termos)) { ?>
                                <?php echo $termos ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 0; padding: 10px 20px;">
                    <div style="width: 100px">
                        <button type="button" class="btn-main" data-dismiss="modal" style="font-size: 14px">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <style>
        .form-control.x{border: 1px solid #999999; border-radius: 5px; color: black; width: 100%; height: 34px; font-size: 15px;}.btn-file{font-size: 15px; padding: .375rem .85rem; line-height: 1.5; color: white; border-radius: 5px; width: 50%; height: 34px; background-color: #7800a7; border: 1px solid #7800a7; cursor: pointer;}.input-file{display: none;}.msg-file{margin-left: 10px; font-size: 12px;}#reembolsoModal .form-group{margin-bottom: 15px;}.ree_h3{font-family: "Poppins",sans-serif; color: black; font-size: 12px; font-weight: bold; margin-bottom: 0px;}.ree_hr{margin-top: 15px; border: 0; height: 1px; border-bottom: 1px solid #e9ecef;}.ree_alert{font-size: 12px; color: red;}.select2{width: 100%!important;}
    </style>
    
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"><i class="fa fa-arrow-up" style="line-height: 43px; font-size: 23px;"></i></a>
    </div>
<div class="modal fade" id="logarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACESSAR A CONTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-login" action="<?php echo base_url('d41d8cd98f00b204e9800998ecf8427e') ?>" method="post">
          <div class="modal-body">
            <label class="custom-label">
                <b style="color: #444;">CPF:</b>
            </label>
            <input type="text" class="form-control cpf" id="cpf_modal" name="login" placeholder="Digite seu CPF" autocomplete="new-password" required>
            
            
            <label class="custom-label" style="margin-top: 5%!important;">
                <b style="color: #444;">Senha:</b>
            </label>
            <input type="password" class="form-control" id="senha_modal" name="pass" placeholder="Digite sua senha" autocomplete="new-password" required>
            
            <a style="position: relative;top: 6px;left: calc(100% - 110px);font-size: 13px; color: #444; cursor: pointer;" href="#" data-toggle="modal" data-target="#esqueciSenhaModal" onclick="esqueciSenha()">Esqueci a senha</a>
          </div>
          <div class="modal-footer">
            <button onclick="abrirmodalcadastro($('#login_usuario').val())" style="width: 120px;margin-right: auto;" type="button" class="btn btn-primary">Cadastrar</button>
            <button style="width: 120px;" type="submit" class="btn btn-primary">Logar</button>
          </div>
      </form>
    </div>
  </div>
</div>
    
    <script src="<?php echo base_url('recursos/js/'); ?>slick.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>popper.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.slicknav.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>wow.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.magnific-popup.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.counterup.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.countdown.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>contact.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.validate.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>plugins.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.mask.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery-migrate-1-2-1.js"></script>
    <!-- sweetalert2 -->
    <script src="<?php echo base_url('recursos/lib/sweetalert2/dist/sweetalert2.min.js') ?>"></script>
    
    <script>
        $(document).ready(function(){
            verificaCookie();
            
            var SPMaskBehavior = function (val) {
              return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
              onKeyPress: function(val, e, field, options) {
                  field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };
            
            $('.telefone').mask(SPMaskBehavior, spOptions);
            $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
            
            
            
            $('.js-example-basic-multiple').select2({theme: "bootstrap"});
            //reembolsoModal();
            $('.select-footer').select2({theme: "bootstrap"});
            $('#ree_cpf').mask('000.000.000-00', {reverse: true});
            $('#ree_cep').mask('00000-000');
            $('#ree_numero').mask('0#');
            $('#ree_uf').mask('XX', {'translation': {'X': {pattern: /[A-Za-z]/}}});
            $('#ree_telefone').mask('(00) 0000-0000');
            $('#ree_quantidade').mask('0#');
            $('#ree_valor_total').mask("#.##0,00", {reverse: true});
            var SPMaskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };
            $('#ree_celular').mask(SPMaskBehavior, spOptions);
        });
        function privacidade(){
            $('#privacidadeModal').modal('show');
        }
        function termo(){
            $('#termosModal').modal('show');
        }
        function quemsomos(){
            $('#quemsomosModal').modal('show');
        }
        function reembolsoModal(){
            $('#termosModal').modal('hide');
            $('#reembolsoModal').modal('show');
        }
        $('.btn-file').on('click', function(){
            $('#'+$(this).data('input')).click();
        });
        $('.input-file').on('change', function(){
            var sp = $(this).val().split('\\');
            if(sp[sp.length - 1].length > 20){
                var fim = parseInt(sp[sp.length - 1].length) - 10;
                var one = sp[sp.length - 1].substr(0, 6);
                var two = sp[sp.length - 1].substr(fim);
                var last = one+"..."+two;
            }else{
                var last = sp[sp.length - 1];
            }
            $('#'+$(this).data('msg')).html(last);
        });
    </script>
    
    <script>
        function inicio(){
            location.replace('<?php echo base_url();?>');
        }
    </script>
    
    <script>
        function acceptCookie(){
            sessionStorage.setItem('aceitouCookie', 1);
            
            $('#new-cookie').hide();
        }
        
        function verificaCookie(){
            var data = sessionStorage.getItem('aceitouCookie');
            
            if(data == 1){
                $('#new-cookie').hide();
            } else {
                $('#new-cookie').show();
            }
        }
    </script>

    
    
    <!--  -->
    <script src="<?php echo base_url('recursos/js/'); ?>vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>owl.carousel.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>animated.headline.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>gijgo.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>waypoints.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>hover-direction-snake.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.form.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>main.js"></script>
    <script src="<?php echo base_url('recursos/js/'); ?>select2/select2.min.js"></script>
    
    <script>
        function alertlogin(){
            $('#logarModal').modal('show');
        }
    
        function alerterrado(){
            Swal.fire({
               type: 'error',
               text: 'Usuário ou senha errado(s)!',
            });
        }
        
        function alertsucesso(){
            Swal.fire({
               type: 'success',
               text: 'Cadastro realizado com sucesso!',
            });
        }
    
        function alertcpf(){
            Swal.fire({
               type: 'error',
               text: 'CPF já cadastrado, tente novamente!',
            });
        }
    
        function alertname(){
            Swal.fire({
               type: 'error',
               text: 'Digite um nome, tente novamente!',
            });
        }
    
        function alertsenha(){
            Swal.fire({
               type: 'error',
               text: 'A senha deve ter mais de seis caracteres, tente novamente!',
            });
        }
    
        function alertpagamento(){
            Swal.fire({
               type: 'error',
               text: 'Selecione uma forma de pagamento, para continuar a compra!',
            });
        }
        
        function alertsenhadif(){
            Swal.fire({
               type: 'error',
               text: 'As senhas são diferentes, tente novamente!',
            });
        }
</script>
    