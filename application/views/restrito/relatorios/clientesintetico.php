<!DOCTYPE html>
<html lang="en">



<style>
    @page {
        margin: 35pt 10pt 50pt 10pt;
        counter-increment: page;

        @bottom-center {
            content: "Page "counter(page);
        }
    }
</style>

<head>
    <title>Relatório de Pedidos Sintético</title>
    <link href="<?php echo base_url('assets/admin/'); ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/'); ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/admin/'); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/'); ?>css/style-responsive.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/admin/'); ?>lib/jquery/jquery.min.js"></script>
    <title>.</title>
</head>

<body>
    <section id="container" style="position: relative; margin-right: 1%; margin-left: 1%; width: 98%">
        <div class="row" style="margin-bottom: 10px; display: inline;">
            <div>
                <img id="imagem" src="<?php echo base_url('imagens/site/logo2.png') ?>" style="margin-left: 28px; margin-top:40px; width: auto; height: 50px;">
            </div>
            <div style="margin-top: -89px;margin-left: 191px;">
                <h4 style="margin-right: 20%; text-align: center; font-weight: bold"><b><?php echo mb_strtoupper($configs['nome_empresa']) ?></b> - <?php echo date('d/m/Y | H:i') ?></h4>
                <h3 style="margin-right: 20%; text-align: center; font-weight: bold">RELATÓRIO DE CLIENTES SINTÉTICO</h3>
                <?php if (isset($filtros)) { ?>
                    <p class="text-center" style="margin-right: 20%; font-size: 8px">
                        <?php if ($filtros['datainicio']) {
                            echo '<span>  |  </span>Filtro Data Início: ' . $filtros['datainicio'];
                        } ?>
                        <?php if ($filtros['datafim']) {
                            echo '<span>  |  </span>Filtro Data Fim: ' . $filtros['datafim'];
                        } ?>
                        <?php if ($filtros['estado']) {
                            echo '<span>  |  </span>Filtro Estado: ' . $filtros['estado'];
                        } ?>
                    </p>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align: right">
                <button id="btn" type="button" class="btn btn-primary" style="border-color: #3a0b0c!important; color: white; background-color: #3a0b0c!important; right: 0; float: right; margin-right: 20px; margin-bottom: 20px" onclick="pdf()">Relatório PDF</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <table style='width: 100%'>
                    <thead>
                        <tr style="font-size: 11px; border-bottom: 2px solid lightgrey;border-top: 2px solid lightgrey; padding: 3px">
                            <th style="padding: 10px; width: 15%"><b>NOME</b></th>
                            <th style="width: 10%"><b>CPF</b></th>
                            <th style="width: 30%"><b>ENDEREÇO</b></th>
                            <th style="width: 15%"><b>EMAIL</b></th>
                            <th style="width: 7%"><b>TELEFONE</b></th>
                            <th class="text-center" style="width: 7%"><b>DATA CADASTRO</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $c) { ?>
                            <tr style="border-bottom: 1px solid lightgrey; font-size: 10px">
                                <td style="padding: 7px;"><?php echo mb_strtoupper($c['cliente_nome']) ?></td>
                                <td class="cpf"><?php echo $c['cliente_cpf'] ?></td>
                                <td><?php echo $c['cliente_endereco'] ?>, <?php echo $c['cliente_numero'] ?>, <?php echo $c['cliente_bairro'] ?>, <?php echo $c['cliente_cidade'] ?>, <?php echo $c['cliente_estado'] ?></td>
                                <td><?php echo $c['cliente_email'] ?></td>
                                <td class="telefone"><?php echo $c['cliente_telefone'] ?></td>
                                <td class="text-center"><?php echo date('d/m/Y', strtotime($c['cliente_datacadastro'])) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    </section>

    <footer id="footer" style="position: fixed; bottom: 0px; text-align: center; width: 100%; margin-bottom: -13px; display: none; clear: both;">
        <table style="width: 100%">
            <tbody>
                <tr>
                    <td style="margin-left: 10px; width: 50%; text-align: right">
                        <p><b style="font-size: 12px; margin-right: 15px;">Gestão de Ecommerce | N Soluções</b></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </footer>
</body>

<script src="<?php echo base_url('assets/admin/'); ?>lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('resources/') ?>js/jquery_mask/dist/jquery.mask.min.js"></script>
<script>
    $(document).ready(function() {
        $('.cpf').mask('000.000.000-00', {
            reverse: true
        });
        var SPMaskBehavior = function(val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

        $('.telefone').mask(SPMaskBehavior, spOptions);
    });
</script>


<script>
    function pdf() {
        $('#btn').css('display', 'none');
        $('#footer').css('display', 'block');
        $('#imagem').css('height', '30px')
        $('#imagem').css('margin-top', '0px')
        window.print();
        $('#imagem').css('height', '50px')
        $('#imagem').css('margin-top', '40px')
        $('#footer').css('display', 'none');
        $('#btn').css('display', 'block');
    }
</script>

</html>