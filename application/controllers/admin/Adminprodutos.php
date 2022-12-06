<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminprodutos extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('produtos');
        $this->load->model('departamentos');
        $this->load->model('marcas');
    }
    
    public function produtos(){
        
        $this->load->library("pagination");
        
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(2) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(3))); 
        }
        
        if($filtro){
            $config = array();
            $config["base_url"] = base_url('391a027a8fef2eba4487a00156901156/f/' . $filtro . '/');
            $config["total_rows"] = $this->produtos->get_countFiltro($filtro);
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
            $data['produtos']  = $this->produtos->getAllProdutosFiltro($filtro, 10, $page);
            $data['filtro']    = $filtro;
        } else {
            $config = array();
            $config["base_url"] = base_url('391a027a8fef2eba4487a00156901156/n/');
            $config["total_rows"] = $this->produtos->get_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
            $data['produtos']  = $this->produtos->getAllProdutos(10, $page);
        
        }

        if($this->session->userdata('alert')){
            $data['alert'] = $this->session->userdata('alert');
            $this->session->unset_userdata('alert');
        }
        
        $this->header(2);
        $this->load->view('restrito/produtos', $data);
        $this->footer();
    }
    
        
    public function cadastrarProduto(){
        
        
        $data['marcas']         = $this->marcas->getAllAtivos();
        $data['produtos']       = $this->produtos->getAll();
        $data['departamentos']  = $this->departamentos->getAll();
        
		$this->header(2);
		$this->load->view('restrito/produto', $data);
		$this->footer();
	}
    
    public function editaProduto(){
	    
	    
	    $id = $this->uri->segment(2);
	    
	    $data['produto']        = $this->produtos->get($id);
	    $data['produtos']       = $this->produtos->getAll();
        $data['departamentos']  = $this->departamentos->getAll();
        $data['marcas']         = $this->marcas->getAllAtivos();

		$this->header(2);
		$this->load->view('restrito/editaproduto', $data);
		$this->footer();
	}
	
	public function excluirProduto(){
	    
	    
	    $id = $this->input->post('id');
	    $senha = md5($this->input->post('senha'));
	    
	    if($senha == $this->session->userdata('senha')){
	        $this->session->set_userdata('alert', 3);
	        
	        // #5 - Chamada da função para gerar log de produto, quando der certo a senha e concluir a exclusão.
	        $produto = $this->produtos->get($id);
	        $dados = array(
	            'produto_id'    => $id,    
	            'produto_nome'  => $produto['produto_nome'],
	        );
	        $this->logProduto($dados);
	        // Fim #5
	        
	        $this->produtos->delete($id);    
	    } else {
	        $this->logBlock();
	        $this->session->set_userdata('alert', 4);
	    }
	    
	    redirect(base_url('391a027a8fef2eba4487a00156901156'), 'refresh');
	}
	
	public function updateProduto(){
	    
	    
	    $id = $this->input->post('id');
	    
	    $config['upload_path']          = './imagens/produtos/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['overwrite']            = true;
        $config['file_name']            = $id . '.jpg';
        
        $itens = $this->input->post('relacionados');
        $cont = 0;
        $relacionados = "";
        $departamentos = "";
        
        if($itens){
            foreach($itens as $i){
                if($cont == 0){
                    $relacionados .= $i;    
                } else {
                    $relacionados .= '¬' . $i;
                }
                $cont++;
            }
        }
        
        $itens2 = $this->input->post('departamentos');
        $cont2 = 0;
        
        if($itens2){
            foreach($itens2 as $i){
                if($cont2 == 0){
                    $departamentos .= $i;    
                } else {
                    $departamentos .= '¬' . $i;
                }
                $cont2++;
            }
        } 
        
        
	    $produto = array(
            'produto_nome'                      => mb_strtoupper($this->input->post('nome')),
            'produto_modelo'                    => mb_strtoupper($this->input->post('modelo')),
            'produto_codigo'                    => $this->input->post('codigo'),
            'produto_fabricante'                => mb_strtoupper($this->input->post('fabricante')),
            'produto_valor'                     => $this->limpaValor($this->input->post('valor')),
            'produto_habilitado'                => $this->input->post('habilitado'),
            'produto_quantidade'                => $this->input->post('quantidade'),
            'produto_estoque_minimo'            => $this->input->post('minimo'),
            'produto_minimo_venda'              => $this->input->post('minimo_venda'),
                
            'produto_valor_atacado'             => $this->limpaValor($this->input->post('valor_atacado')),
            'produto_minimo_venda_atacado'      => $this->input->post('minimo_venda_atacado'),
            'produto_ativo_atacado'             => $this->input->post('ativo_atacado'),
                
                
            'produto_preco_promocao'            => $this->limpaValor($this->input->post('preco_promocao')),
            'produto_preco_promocao_ativo'      => $this->input->post('preco_promocao_ativo'),
            'produto_desconto'                  => $this->input->post('desconto'),
            'produto_desconto_ativo'            => $this->input->post('desconto_ativo'),
            'produto_datainicial_promocao'      => $this->input->post('datainicial_promocao'),
            'produto_datafinal_promocao'        => $this->input->post('datafinal_promocao'),
            'produto_datafinal_promocao_ativo'  => $this->input->post('datafinal_promocao_ativo'),
            'produto_cupom'                     => $this->input->post('cupom'),
            'produto_cupom_ativo'               => $this->input->post('cupom_ativo'),
            'produto_marca_id'                  => $this->input->post('marca'),
            
            'produto_departamentos'             => $departamentos,
            'produto_relacionados'              => $relacionados,
            
            
            'produto_reduzir'                   => $this->input->post('reduzir'),
            'produto_un_medida'                 => $this->input->post('medida'),
            'produto_comprimento'               => $this->input->post('comprimento'),
            'produto_largura'                   => $this->input->post('largura'),
            'produto_altura'                    => $this->input->post('altura'),
            'produto_un_peso'                   => $this->input->post('un_peso'),
            'produto_peso'                      => $this->input->post('peso'),
            'produto_sku'                       => $this->input->post('sku'),
            'produto_ncm'                       => $this->input->post('ncm'),
            'produto_cest'                      => $this->input->post('cest'),
            'produto_upc'                       => $this->input->post('upc'),
            'produto_ean'                       => $this->input->post('ean'),
            'produto_jan'                       => $this->input->post('jan'),
            'produto_isbn'                      => $this->input->post('isbn'),
            'produto_mpn'                       => $this->input->post('mpn'),
            'produto_detalhes'                  => $this->input->post('desc'),
            'produto_localpreparo'              => mb_strtoupper($this->input->post('local_preparo')),
            'produto_armazenamento'             => mb_strtoupper($this->input->post('local_armazenamento')),
            'produto_envelhecimento'            => mb_strtoupper($this->input->post('envelhecimento')),
            'produto_teor'                      => mb_strtoupper($this->input->post('teor')),
            'produto_imagens_opcionais'         => '',
        );
        
        $this->load->library('upload', $config);
        
        $this->upload->do_upload('imagem');
        
        $this->produtos->update($id, $produto);
        $this->session->set_userdata('alert', 2);
        
        redirect(base_url('391a027a8fef2eba4487a00156901156'));
	}
	
	public function verProduto(){
	    
	    
	    $id = $this->uri->segment(2);
	    
	    $data['produto']        = $this->produtos->get($id);
	    $data['produtos']       = $this->produtos->getAll();
        $data['departamentos']  = $this->departamentos->getAll();
        $data['marcas']         = $this->marcas->getAllAtivos();

		$this->header(2);
		$this->load->view('restrito/verproduto', $data);
		$this->footer();
	}
    
    public function novoProduto(){
        
        
        $config['upload_path']          = './imagens/produtos/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;

        $itens = $this->input->post('relacionados');
        $cont = 0;
        $relacionados = "";
        $departamentos = "";
        
        if($itens){
            foreach($itens as $i){
                if($cont == 0){
                    $relacionados .= $i;    
                } else {
                    $relacionados .= '¬' . $i;
                }
                $cont++;
            }
        }
        
        $itens2 = $this->input->post('departamentos');
        $cont2 = 0;
        
        if($itens2){
            foreach($itens2 as $i){
                if($cont2 == 0){
                    $departamentos .= $i;    
                } else {
                    $departamentos .= '¬' . $i;
                }
                $cont2++;
            }
        } 

        
        $new = array(
            'produto_nome'                  => mb_strtoupper($this->input->post('nome')),
            'produto_modelo'                => mb_strtoupper($this->input->post('modelo')),
            'produto_codigo'                => mb_strtoupper($this->input->post('codigo')),
            'produto_fabricante'            => mb_strtoupper($this->input->post('fabricante')),
            'produto_valor'                 => $this->limpaValor($this->input->post('valor')),
            
            'produto_valor_atacado'         => $this->limpaValor($this->input->post('valor_atacado')),
            'produto_minimo_venda_atacado'  => $this->input->post('minimo_venda_atacado'),
            'produto_ativo_atacado'         => $this->input->post('ativo_atacado'),
            
            'produto_preco_promocao'            => $this->limpaValor($this->input->post('preco_promocao')),
            'produto_preco_promocao_ativo'      => $this->input->post('preco_promocao_ativo'),
            'produto_desconto'                  => $this->input->post('desconto'),
            'produto_desconto_ativo'            => $this->input->post('desconto_ativo'),
            'produto_datainicial_promocao'      => $this->input->post('datainicial_promocao'),
            'produto_datafinal_promocao'        => $this->input->post('datafinal_promocao'),
            'produto_datafinal_promocao_ativo'  => $this->input->post('datafinal_promocao_ativo'),
            'produto_cupom'                     => $this->input->post('cupom'),
            'produto_cupom_ativo'               => $this->input->post('cupom_ativo'),
            'produto_marca_id'                  => $this->input->post('marca'),
            
            'produto_departamentos'             => $departamentos,
            'produto_relacionados'              => $relacionados,
            
            'produto_habilitado'            => $this->input->post('habilitado'),
            'produto_quantidade'            => $this->input->post('quantidade'),
            'produto_estoque_minimo'        => $this->input->post('minimo'),
            'produto_minimo_venda'          => $this->input->post('minimo_venda'),
            'produto_reduzir'               => $this->input->post('reduzir'),
            'produto_un_medida'             => $this->input->post('medida'),
            'produto_comprimento'           => $this->input->post('comprimento'),
            'produto_largura'               => $this->input->post('largura'),
            'produto_altura'                => $this->input->post('altura'),
            'produto_un_peso'               => $this->input->post('un_peso'),
            'produto_peso'                  => $this->input->post('peso'),
            'produto_sku'                   => $this->input->post('sku'),
            'produto_ncm'                   => $this->input->post('ncm'),
            'produto_cest'                  => $this->input->post('cest'),
            'produto_upc'                   => $this->input->post('upc'),
            'produto_ean'                   => $this->input->post('ean'),
            'produto_jan'                   => $this->input->post('jan'),
            'produto_isbn'                  => $this->input->post('isbn'),
            'produto_mpn'                   => $this->input->post('mpn'),
            'produto_detalhes'              => $this->input->post('desc'),
            'produto_localpreparo'          => mb_strtoupper($this->input->post('local_preparo')),
            'produto_armazenamento'         => mb_strtoupper($this->input->post('local_armazenamento')),
            'produto_envelhecimento'        => mb_strtoupper($this->input->post('envelhecimento')),
            'produto_teor'                  => mb_strtoupper($this->input->post('teor')),
            'produto_imagens_opcionais'     => '',
        );
        
        $id = $this->produtos->insert($new);
        $this->session->set_userdata('alert', 1);
        
        $config['file_name'] = $id . '.jpg';
        
        $this->load->library('upload', $config);
        
        $this->upload->do_upload('imagem');
        
        redirect(base_url('391a027a8fef2eba4487a00156901156'));
    }
    
        
    public function solicitacoes(){
        
        $this->load->library("pagination");
        
        
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(2) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(3))); 
        }
        
        if($filtro){
            $config = array();
            $config["base_url"] = base_url('4f713efdd5a702bb7c0bf2608f3a6a72/f/' . $filtro . '/');
            $config["total_rows"] = $this->produtos->get_countSolicitacoesFiltro($filtro);
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
            $data['solicitacoes']  = $this->produtos->getAllSolicitacoesPaginationFiltro($filtro, 10, $page);
            $data['filtro']        = $filtro;
        } else {
            $config = array();
            $config["base_url"] = base_url('4f713efdd5a702bb7c0bf2608f3a6a72/n/');
            $config["total_rows"] = $this->produtos->get_countSolicitacoes();
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
            $data['solicitacoes']  = $this->produtos->getAllSolicitacoesPagination(10, $page);
        }
        
        $this->header(4);
        $this->load->view('restrito/solicitacoes', $data);
        $this->footer();
    }

    public function getSolicitacao(){
        
        
        $id = $this->input->post('id');
        
        $solicitacao = $this->produtos->getSolicitacao($id);
        
        echo json_encode($solicitacao);
    }
    
    public function verSolicitacao(){
        
        
        $id = $this->uri->segment(2);
        
        $data['solicitacao'] = $this->produtos->getSolicitacao($id);
        $data['andamento'] = $this->produtos->getAllAndamento($id);
        
        $this->header(4);
        $this->load->view('restrito/solicitacao', $data);
        $this->footer();
    }
    
    public function updateStatus(){
        
        
        date_default_timezone_set('America/Sao_Paulo');
        $datahora = date('d/m/y | H:i');
        
        $id = $this->input->post('id');
        
        $solicitacao = array(
            'solicitacao_status'    => $this->input->post('status'),
        );
        
        $andamento = array(
            'andamento_solicitacao_id'  => $id,
            'andamento_mensagem'        => $this->input->post('andamento'),
            'andamento_status'          => $this->input->post('status'),
            'andamento_datahora'        => $datahora,
        );
        
        $this->produtos->insertAndamento($andamento);
        
        $this->produtos->updateSolicitacao($id, $solicitacao);
        
        redirect(base_url('4f713efdd5a702bb7c0bf2608f3a6a72'), 'refresh');
    }
    
    public function updateAndamento(){
        
        
        $id = $this->input->post('id');
        $mensagem = $this->input->post('mensagem');
        
        $andamento = array(
            'andamento_mensagem'  => $mensagem,    
        );
        
        $this->produtos->updateAndamento($id, $andamento);

    }
    
    public function deleteAndamento(){
        
        
        $id = $this->input->post('id');
        
        $this->produtos->deleteAndamento($id);

    }
    
    public function logProduto($dados){
        $this->load->model('Logger');
        date_default_timezone_set('America/Sao_Paulo');
        
        $log = array(
            'logproduto_ip'             => $_SERVER['REMOTE_ADDR'],
            'logproduto_user_id'        => $this->session->userdata('user_id'),
            'logproduto_data'           => date('Y-m-d'),
            'logproduto_hora'           => date('H:i:s'),
            'logproduto_produto_nome'   => $dados['produto_nome'],  
            'logproduto_produto_id'     => $dados['produto_id'],  
        );
        
        $this->logger->logProduto($log);
    }
    
    public function logBlock(){
        $this->load->model('Logger');
        $this->load->model('usuarios');
        date_default_timezone_set('America/Sao_Paulo');
        
        $log = array(
            'log_ip'             => $_SERVER['REMOTE_ADDR'],
            'log_user_id'        => $this->session->userdata('user_id'),
            'log_nome'           => $this->session->userdata('nome'),
            'log_data'           => date('Y-m-d'),
            'log_hora'           => date('H:i:s'),
            'log_funcao'         => '391a027a8fef2eba4487a00156901156',  
            'log_tipo'           => 'SENHA',  
        );
        
        
        if($this->session->userdata('user_block')){
            $cont = $this->session->userdata('user_block');
            $this->session->set_userdata('user_block', $cont + 1);
        } else {
            $this->session->set_userdata('user_block', 1);
        }
        
        if($this->session->userdata('user_block') >= 3){
            $user_content = array(
                'ativo' => 0,
            );
            $this->usuarios->atualizarUsuario($user_content, $this->session->userdata('user_id'));
            
            $this->session->unset_userdata('user_block');
            
            redirect(base_url('dc28f82848daefd26e2f0f38094d5818'));
        }
        
        
        $this->logger->logBlock($log);
    }
}