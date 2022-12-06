    <style>
        .img-square {
            aspect-ratio: 1/1;
            object-fit: contain;
        }

        .prod-preco {
            color: #d39c1c;
            font-size: 18px;
            border: 1px solid #d39c1c;
            border-radius: 4px;
            max-width: fit-content;
            padding: 0 8px;
            transition: all 300ms ease-in-out;
        }

        .prod-preco:hover {
            color: #fff;
            background-color: #d39c1c;
        }

        .old-prod-preco {
            text-decoration: line-through;
        }

        .card {
            box-shadow: rgb(0 0 0 / 20%) 0px 2px 6px;
        }

        .servico-desconto {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #25e625;
            padding: 0 4px;
            color: white;
            border-radius: 3px;
        }

        .servico-titulo {
            text-align: center;
            color: #828282;
            display: -webkit-box;
            overflow: hidden;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
            height: 3.75rem;
            word-break: break-word;
            font-size: 14px;
            margin-bottom: 10px;
            margin-top: 2%;
            line-height: 19px;
        }

        .servico-titulo:hover {
            text-decoration: none !important;
        }

        .zoom {
            transition: transform .3s;
            /* Animation */
            cursor: pointer;
        }

        .zoom:hover {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            text-decoration: none !important;
        }

        .zoom:hover b {
            text-decoration: none !important;
        }

        .pagination-links a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 16px;
            margin: 2px;
            background: #d39c1c;
        }

        .pagination-links a:hover {
            color: #d39c1c;
            background: bisque;
        }

        .pagination-links strong {
            color: #d39c1c;
            border: 1px solid #d39c1c;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 16px;
            background-color: bisque;
        }

        .card_prod {
            height: 100%;
        }

        .imagem_prod {
            height: 180px;
            width: auto;
            padding: 10px 5px;
            max-width: 110%;
        }

        .comprar {
            height: 10px;
            background-color: #f9c717;
            position: absolute;
            bottom: 0;
            left: 14px;
            width: 101%;
        }

        .div-preco {
            width: 100%;
            position: absolute;
            top: 305px;
            left: 0px;
        }

        .features-area {
            height: 100vh;
            padding-top: 10px !important;
        }

        .pPesquisa {
            font-size: 35px;
            font-weight: 900;
            color: #444;
        }

        .divImagemServico {
            padding: 0 30px;
        }

        #cards-prod .btn {
            color: #d39c1c;
            border-color: #d39c1c;
            background-color: white;
        }

        #cards-prod .btn:hover {
            color: white;
            border-color: white;
            background-color: #d39c1c;
        }

        #cards-prod {
            margin-bottom: 5%;
        }

        @media (min-width: 299px) and (max-width: 398px) {
            .estrelas {
                font-size: 10px;
                margin-bottom: 6px;
            }

            .pPesquisa {
                margin-top: 30%;
                font-size: 25px;
                text-align: center;
            }

            .divImagemServico {
                padding: 0 2px;
            }

            .imagem_prod {
                height: 140px;
                max-width: 98%;
            }

            #cards-prod .btn b {
                font-size: 15px !important;
            }

            .prod-preco {
                margin-top: 8%;
            }

            .card_prod {
                height: 353px !important;
                margin-bottom: 7%;
                width: 105%;
            }

            .btn-noPromo {
                margin-top: 16.5% !important;
            }
        }

        /* X-Small devices (iPhone and others mobiles, 400px and up) */
        @media (min-width: 399px) and (max-width: 574px) {
            .estrelas {
                font-size: 10px;
                margin-bottom: 6px;
            }

            .pPesquisa {
                margin-top: 30%;
                font-size: 25px;
                text-align: center;
            }

            .divImagemServico {
                padding: 0 2px;
            }

            .imagem_prod {
                height: 140px;
                max-width: 98%;
            }

            #cards-prod .btn b {
                font-size: 15px !important;
            }

            .prod-preco {
                margin-top: 8%;
            }

            .card_prod {
                height: 353px !important;
                margin-bottom: 7%;
            }

            .btn-noPromo {
                margin-top: 16.5% !important;
            }
        }

        /* Small devices (landscape phones, 576px and up) */
        @media (min-width: 575px) and (max-width: 766px) {
            .estrelas {
                font-size: 10px;
                margin-bottom: 6px;
            }

            .pPesquisa {
                margin-top: 30%;
                font-size: 25px;
                text-align: center;
            }

            .divImagemServico {
                padding: 0 2px;
            }

            .imagem_prod {
                height: 140px;
                max-width: 98%;
            }

            #cards-prod .btn b {
                font-size: 15px !important;
            }

            .prod-preco {
                margin-top: 8%;
            }

            .card_prod {
                height: 353px !important;
                margin-bottom: 7%;
            }

            .btn-noPromo {
                margin-top: 16.5% !important;
            }
        }

        @media (min-width: 501px) and (max-width: 600px) {
            .estrelas {
                font-size: 10px;
                margin-bottom: 6px;
            }

            .pPesquisa {
                margin-top: 30%;
                font-size: 25px;
                text-align: center;
            }

            .divImagemServico {
                padding: 0 2px;
            }

            .imagem_prod {
                height: 140px;
                max-width: 98%;
            }

            #cards-prod .btn b {
                font-size: 15px !important;
            }

            .prod-preco {
                margin-top: 8%;
            }

            .card_prod {
                height: 353px !important;
                margin-bottom: 7%;
            }

            .btn-noPromo {
                margin-top: 16.5% !important;
            }
        }

        /* Medium devices (tablets, 768px and up) */
        @media (min-width: 767px) and (max-width: 990px) {
            .div-preco {
                top: 252px;
            }

            .comprar {
                width: 100% !important;
                left: 15px !important;
            }

            .imagem_prod {
                height: 140px;
                max-width: 98%;
            }

            /*.card_prod{*/
            /*    height: 353px!important;  */
            /*    margin-bottom: 7%;*/
            /*}*/
            .features-area {
                padding-top: 130px !important;
            }

            .pPesquisa {
                font-size: 30px;
            }

            .divImagemServico {
                padding: 0 2px;
            }

            .estrelas {
                font-size: 10px;
                margin-bottom: 6px;
            }

            .pPesquisa {
                font-size: 25px;
                text-align: center;
            }

            .margin-ipad {
                margin-top: 0% !important;
            }

            #cards-prod .btn b {
                font-size: 15px !important;
            }

            .prod-preco {
                margin-top: 8%;
            }

            /*.card_prod{height: 353px!important; margin-bottom: 7%;}*/
            .btn-noPromo {
                margin-top: 16.5% !important;
            }
        }

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 991px) and (max-width: 1198px) {
            .estrelas {
                font-size: 10px;
                margin-bottom: 6px;
            }

            .pPesquisa {
                font-size: 25px;
                text-align: center;
            }

            .margin-ipad {
                margin-top: 0% !important;
            }

            .divImagemServico {
                padding: 0 2px;
            }

            .imagem_prod {
                height: 140px;
                max-width: 98%;
            }

            #cards-prod .btn b {
                font-size: 15px !important;
            }

            .prod-preco {
                margin-top: 8%;
            }

            /*.card_prod{height: 353px!important; margin-bottom: 7%;}*/
            .btn-noPromo {
                margin-top: 16.5% !important;
            }
        }

        /*@media only screen and (max-width: 768px) {*/
        /*    .div-preco{*/
        /*        top: 252px;*/
        /*    }*/
        /*    .comprar{*/
        /*        width: 100%!important;*/
        /*        left: 15px!important;*/
        /*    }*/

        /*    .imagem_prod{*/
        /*        height: 160px;*/
        /*        padding: 5px 5px;*/
        /*    }*/

        /*    .card_prod{*/
        /*        height: 300px!important;  */
        /*    }*/
        /*    .features-area{*/
        /*        padding-top: 130px!important;*/
        /*    }*/
        /*    .pPesquisa{*/
        /*        font-size: 30px;*/
        /*    }*/
        /*    .divImagemServico{*/
        /*        padding: 0!important;*/
        /*    }*/
        /*}*/
    </style>



    <section class="features-area section-padding-100-0" style="height: 100%; margin-bottom: -15%;">
        <div class="container" style="padding: 0 10%;">
            <div class="row margin-ipad" style="margin-top: 13%;">
                <div class="col-lg-12 col-md-12">
                    <div class="row form-group">
                        <div class="col-xl-12">
                            <p class="pPesquisa">Resultado da Pesquisa</p>
                        </div>
                    </div>
                    <div class="row">
                        <?php if (is_array($servicos)) {
                            foreach ($servicos as $p) { //echo '<pre>';print_r($p);echo '</pre>';   
                        ?>
                                <?php $aux_nome = explode(' ', $p['servico_nome'], 2) ?>
                                <div class="col-md-4 col-xs-6 col-sm-4 col-lg-3 mb-4">
                                    <div class="card zoom card-relacionados" style="border-radius: 7px; height: 100%;">
                                        <div class="card-body p-2 pb-0" style="border-bottom: 7px solid #d39c1c; border-radius: 7px;">
                                            <a href="<?php echo base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/') . $p['servico_id'] ?>">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <img class="d-block mx-auto img-fluid img-square" src="<?php echo base_url($p['servico_imagem']) ?>">
                                                    </div>
                                                    <!-- aspect-ratio: 1/1; -->
                                                    <div class="col-md-12 text-center">
                                                        <p class="text-center stars">
                                                            <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                            <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                            <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                            <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                            <i style="color: gold" class="fa fa-star" aria-hidden="true"></i>
                                                        </p>

                                                        <p class="text-center servico-titulo" style="margin-top: 7%; font-weight: 600; color: #0b193c;"><?php echo ucfirst(mb_strtolower($p['servico_nome'])) ?></p>

                                                        <div class="row">
                                                            <?php if ($p['valor_desconto']) { ?>
                                                                <div class="col-12 col-md-12 text-center">
                                                                    <span class="old-prod-preco text-muted">R$ <?php echo number_format($p['servico_valor'], 2, ',', '.') ?></span>
                                                                    <p class="text-center prod-preco mx-auto my-1">R$ <?= number_format($p['valor_desconto'], 2, ',', '.') ?></p>
                                                                    <p class="text-center prod-departamento mb-0 text-muted"><?= $p['servico_qtd_parcela'] ?></p>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="col-12 col-md-12 text-center mt-4">
                                                                    <strike hidden class="old-preco">text</strike><br>
                                                                    <p class="text-center prod-preco mx-auto my-1">R$ <?= number_format($p['servico_valor'], 2, ',', '.') ?></p>
                                                                    <p class="text-center prod-departamento mb-0 text-muted"><?= $destpaque['servico_qtd_parcela'] ?></p>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else if ($servicos == null) { ?>
                            <div class="col-md-12 text-center">
                                <p><b>Nenhum serviço encontrado :(</b></p>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center" style="padding-top: 30px!important">
                            <p class="pagination-links"><?php echo $links; ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </section>