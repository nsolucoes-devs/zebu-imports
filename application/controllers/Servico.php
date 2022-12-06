<?php defined('BASEPATH') or exit('No direct script access allowed');

class Servico extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('America/Sao_Paulo');
        $this->load->database();
        $this->load->model('configs');
        $this->load->model('servicos');
        $this->load->model('promocoes');
        $this->load->model('afiliados');
    }

    public function promocao($servico)
    {
        $valor          = null;
        $porcentagem    = null;
        $local          = null;

        $promo = $this->promocoes->promocao($servico['servico_id']);

        if ($promo['ativo'] == 1) {
            if ($promo['promocao_cupom_ativo'] == 0) {
                if ($promo['promocao_preco_ativo'] == 1) {
                    $valor = $promo['promocao_preco'];
                    $porcentagem = 100 - (($promo['promocao_preco'] * 100) / $servico['produto_valor']);
                } else if ($promo['promocao_desconto_ativo'] == 1) {
                    $porcentagem = $promo['promocao_desconto'];
                    $valor = $servico['produto_valor'] - (($promo['promocao_desconto'] / 100) * $servico['produto_valor']);
                }
            }

            if ($valor == null) {
                $boolean = true;
                if ($servico['servico_dataInicial'] !== null) {
                    if ($servico['servico_dataInicial'] > date('Y-m-d')) {
                        $boolean = false;
                    }
                }
                if ($servico['servico_dataFinalAtivo'] == 1) {
                    if ($servico['servico_dataFinal'] < date('Y-m-d')) {
                        $boolean = false;
                    }
                }
                if ($boolean == true) {
                    if ($servico['servico_cupomAtivo'] == 0) {
                        if ($servico['servico_promocaoAtivo'] == 1) {
                            $valor = $servico['servico_promocaoPreco'];
                            $porcentagem = 100 - (($servico['servico_promocaoPreco'] * 100) / $servico['servico_valor']);
                        } else if ($servico['servico_descontoAtivo'] == 1) {
                            $desconto = $servico['servico_desconto'];
                            $porcentagem = $servico['servico_desconto'];
                            $valor = $servico['servico_valor'] - (($servico['servico_desconto'] / 100) * $servico['servico_valor']);
                        }
                    }
                }
            }

            if (!empty($promo)) {

                if ($promo['ativo'] == 0) {
                    $porcento = $porcentagem;
                    $valor = $valor;
                    $local = 1;
                } elseif ($promo['ativo'] == 1) {
                    $porcento = $promo['promocao_produtos'];
                    $valor = $promo['promocao_preco'];
                    $local = 2;
                } elseif ($promo['ativo'] == 2) {
                    $porcento = $promo['promocao_desconto'];
                    $valor = $promo['promocao_preco'];
                    $local = 3;
                } elseif ($promo['ativo'] == 3) {
                    $porcento = $promo['promocao_desconto'];
                    $valor = $promo['promocao_preco'];
                    $local = 4;
                } else {
                    $porcento = null;
                    $valor = null;
                    $local = 5;
                }
            }

            $valor         = $promo['promocao_preco'];
            $porcentagem   = $porcento;
            $ativo         = $promo['ativo'];
            $local         = $local;
        }

        $array = array(
            'valor'         => $valor,
            'porcentagem'   => $porcentagem,
            'ativo'         => $promo['ativo'],
            'local'         => $local,
        );

        return $array;
    }

    public function produtoDesconto($produto)
    {
        /*$this->load->model('carrinhomodel');
        $valornovo['valor'] = $this->carrinhomodel->promocao($produto['servico_id']);
        $valornovo['porcentagem'] = $this->carrinhomodel->desconto($produto['servico_id']);
        return $valornovo;*/


        $dataatual = date('Y-m-d');
        $valornovo = null;

        if ($produto['servico_descontoAtivo'] == 1) {
            if ($produto['servico_dataInicial'] != "0000-00-00" && $produto['servico_dataInicial'] != null && $produto['servico_dataInicial'] != " ") {
                if ($produto['servico_dataInicial'] <= $dataatual) {
                    if ($produto['servico_dataFinal'] != "0000-00-00" && $produto['servico_dataFinal'] != null && $produto['servico_dataFinal'] != " ") {
                        if ($produto['servico_dataFinal'] >= $dataatual) {
                            if ($produto['servico_desconto'] > 0) {
                                $valor          = $produto['servico_valor'];
                                $porcentagem    = $produto['servico_desconto'];
                                $desconto = ($valor * $porcentagem) / 100;
                                $valornovo = $valor - $desconto;
                            }
                        }
                    } else {
                        if ($produto['servico_desconto'] > 0) {
                            $valor          = $produto['servico_valor'];
                            $porcentagem    = $produto['servico_desconto'];
                            $desconto = ($valor * $porcentagem) / 100;
                            $valornovo = $valor - $desconto;
                        }
                    }
                }
            } else {
                if ($produto['servico_desconto'] > 0) {
                    $valor          = $produto['servico_valor'];
                    $porcentagem    = $produto['servico_desconto'];
                    $desconto = ($valor * $porcentagem) / 100;
                    $valornovo = $valor - $desconto;
                }
            }
        }
        return $valornovo;
    }

    public function header()
    {


        $site = $this->configs->getSite();

        $dadosHeader['idpag']               = 1;
        $dadosHeader['telefonedecontato']   = $site['whats'];
        $dadosHeader['header'] = $this->departamentos->menuDepts();

        $this->load->view('recursos/header', $dadosHeader);
    }

    public function footer()
    {

        $site = $this->configs->getSite();

        $dadosFooter = array(
            'callback'              => $this->uri->uri_string(),
            'facebook'              => $site['facebook'],
            'instagram'             => $site['instagram'],
            'linkedin'              => $site['linkedin'],
            'endereco'              => $site['endereco'],
            'email'                 => $site['email'],
            'whats'                 => $site['whats'],
            'telefone'              => $site['telefone'],
            'nome_empresa'          => $site['nome_empresa'],
            'cnpj'                  => $site['cnpj'],
            'sobre_loja'            => $site['sobre_loja'],
            'politica_entrega'      => $site['politica_entrega'],
            'politica_privacidade'  => $site['politica_privacidade'],
            'termos'                => $site['termos'],
            'loja_text'               => $site['loja_text'],
            'midia_text'              => $site['midia_text'],
            'loja_imagem_principal'   => $site['loja_imagem_principal'],
            'loja_imagem_secundaria1' => $site['loja_imagem_secundaria1'],
            'loja_imagem_secundaria2' => $site['loja_imagem_secundaria2'],
            'loja_imagem_secundaria3' => $site['loja_imagem_secundaria3'],
            'loja_imagem_secundaria4' => $site['loja_imagem_secundaria4'],
            'midia_video'             => $site['midia_video'],
            'midia_imagem1'           => $site['midia_imagem1'],
            'midia_imagem2'           => $site['midia_imagem2'],
            'midia_imagem3'           => $site['midia_imagem3'],
            'midia_imagem4'           => $site['midia_imagem4'],
        );

        $this->load->view('recursos/footer', $dadosFooter);
    }

    public function verServico()
    {


        
        $servico = $this->servicos->getAtivo($this->uri->segment(2));

        // ALTERADO PARA AFILIADOS EM GET
        //$this->uri->segment(2) => id produto vendido
        //$_GET['afiliado'] => id afiliado
        if (isset($_GET['afiliado'])) {
            $data['afiliado'] = $_GET['afiliado'];
        }
        //FIM ALTERAÇÃO PARA AFILIADOS

        if (!$servico) {
            $data['errado'] = "null";
        } else {
            $data['servico'] = $servico;

            $valornovo = $this->produtoDesconto($servico);

            if ($valornovo != $servico['servico_valor']) {
                $data['servico']['valor_desconto'] = $valornovo;
            }

            $data['estoque'] = $this->servicos->getEstoqueSite($servico['servico_id']); 

            $ramdon = $this->servicos->getRandom();
            $cont = 0;
            foreach ($ramdon as $ram) {

                if ($ram) {
                    $vejatbm[$cont] = array(
                        'servico_id'            => $ram['servico_id'],
                        'servico_nome'          => $ram['servico_nome'],
                        'servico_valor'         => $ram['servico_valor'],
                        'servico_imagem'        => $ram['servico_imagem'],
                        'servico_subtitulo'     => $ram['servico_subtitulo'],
                        'servico_descontoAtivo' => $ram['servico_descontoAtivo'],
                        'servico_desconto     ' => $ram['servico_desconto'],
                        'servico_qtd_parcela'   => $ram['servico_qtd_parcela'],
                        'servico_parcelamento'  => $ram['servico_parcelamento'],
                    );

                    $vejatbm[$cont]['valor_desconto'] = $this->produtoDesconto($ram);
                    $cont++;
                }
            }
            $data['vejatbm'] = $vejatbm;

            $site = $this->configs->getSite();
            $data['email'] = $site['email'];

            $this->header();
            $this->load->view('servico', $data);
            $this->footer();
        }
    }

    public function verServico2()
    {

        $servico = $this->servicos->getAtivo($this->uri->segment(2));

        // ALTERADO PARA AFILIADOS

        //$this->uri->segment(2) => id produto vendido
        //$this->uri->segment(3) => id afiliado
        //$this->uri->segment(4) => nome afiliado

        if ($this->uri->segment(3)) {
            $data['afiliado'] = $this->uri->segment(3);
        }

        //FIM ALTERAÇÃO PARA AFILIADOS

        if (!$servico) {
            $data['errado'] = "null";
        } else {
            $data['servico'] = $servico;
            $aux_promocao = $this->promocao($data['servico']);
            $data['valor']        = $aux_promocao['valor'];
            $data['porcentagem']  = $aux_promocao['porcentagem'];
        }
        $site = $this->configs->getSite();
        $data['email'] = $site['email'];
        $data['ignora'] = 1;

        $this->header();
        $this->load->view('servico', $data);
        $this->footer();
    }

    function buscaServicos()
    {


        $this->load->library("pagination");

        if ($this->input->post('busca') != "") {
            $termo = mb_strtoupper($this->input->post('busca'));
            $this->session->set_userdata('termo', $termo);
        } else {
            $termo = $this->session->userdata('termo');
        }

        $site = $this->configs->getSite();

        if ($this->uri->segment('3')) {
            $start = $this->uri->segment('3');
        } else {
            $start = 0;
        }
        $stop = 20;

        $servicos = $this->servicos->retrieveBusca($termo, $start, $stop);

        $rows = $this->servicos->countBusca($termo);


        $config = array();
        $config["base_url"] = base_url('servico/buscaServicos/');
        $config["total_rows"] = $rows['count'];
        $config["per_page"] = $stop;

        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();

        $cont = 0;
        if (is_array($servicos)) {
            foreach ($servicos as $prt) {

                if ($prt) {

                    $promo              = $this->promocao($prt);
                    $valor_promo        = $promo['valor'];
                    $porcentagem_promo  = $promo['porcentagem'];

                    $relacionados[$cont] = array(
                        'servico_imagem'        => $prt['servico_imagem1'],
                        'servico_id'            => $prt['servico_id'],
                        'servico_nome'          => $prt['servico_nome'],
                        'servico_valor'         => $prt['servico_valor'],
                        'servico_porcentagem'   => $porcentagem_promo,
                        'servico_qtd_parcela'   => $prt['servico_qtd_parcela'],
                        'servico_parcelamento'  => $prt['servico_parcelamento'],
                    );

                    $relacionados[$cont]['valor_desconto'] = $this->produtoDesconto($prt);
                    $cont++;

                    $data['servicos'] = $relacionados;

                    $cont++;
                }
            }
        }

        if (!isset($data['servicos'])) {
            $data['servicos'] = null;
        }

        $this->header();
        $this->load->view('buscar', $data);
        $this->footer();
    }


    function buscaDepartamento($departamento_id)
    {


        $this->load->library("pagination");

        $site = $this->configs->getSite();

        if ($this->uri->segment('3')) {
            $start = $this->uri->segment('3');
        } else {
            $start = 0;
        }
        $stop = 20;

        $servicos = $this->servicos->getAllDDepartamento($departamento_id);

        $rows = /*$this->servicos->countDepartamento($departamento_id)*/ 8;


        $config = array();
        $config["base_url"] = base_url('servico/buscaDepartamento/');
        $config["total_rows"] = $rows['count'];
        $config["per_page"] = $stop;

        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();

        $cont = 0;
        if (is_array($servicos)) {
            foreach ($servicos as $prt) {

                if ($prt) {
                    $promo              = $this->promocao($prt);
                    $valor_promo        = $promo['valor'];
                    $porcentagem_promo  = $promo['porcentagem'];

                    $relacionados[$cont] = array(
                        'servico_imagem'        => $prt['servico_imagem1'],
                        'servico_id'            => $prt['servico_id'],
                        'servico_nome'          => $prt['servico_nome'],
                        'servico_valor'         => $prt['servico_valor'],
                        'servico_porcentagem'   => $porcentagem_promo,
                        'servico_qtd_parcela'   => $prt['servico_qtd_parcela'],
                        'servico_parcelamento'  => $prt['servico_parcelamento'],
                    );

                    $relacionados[$cont]['valor_desconto'] = $this->produtoDesconto($prt);
                    $cont++;
                    $data['servicos'] = $relacionados;
                }
            }
        }

        if (!isset($data['servicos'])) {
            $data['servicos'] = null;
        }

        $data['departamentos'] = $this->departamentos->menuDepartamento();
        $data['departamento'] = $this->departamentos->get($departamento_id);

        $this->header();
        $this->load->view('departamentos', $data);
        $this->footer();
    }

    public function chamatermo()
    {
        $this->load->database();
        $this->load->model('servicos');
        $termo = $this->servicos->termo($_POST['termo']);
        echo json_encode($termo);
    }
}
