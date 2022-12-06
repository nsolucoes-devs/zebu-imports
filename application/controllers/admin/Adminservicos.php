<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminservicos extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('servicos');
        $this->load->model('departamentos');
        $this->load->model('marcas');
        $this->load->helper('url');
    }
    
    public function servicos(){
        
        $this->load->library("pagination");
        
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(4) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(5))); 
        }
        
        $uri_segment = 6;
        
        $config = array();

        if($filtro){
            $config["base_url"] = base_url('admin/adminservicos/servicos/f/' . $filtro . '/');
        } else {
            $config["base_url"] = base_url('admin/adminservicos/servicos/n/');
            $uri_segment = 5;
        }
        
        $config["total_rows"] = $this->servicos->get_countFiltro($filtro);
        $config["per_page"] = 10;
        
        $config["uri_segment"] = $uri_segment;
        
        $this->pagination->initialize($config);
        
        $data['links'] = $this->pagination->create_links();
        
        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;

        $data['servicos']  = $this->servicos->getAllFiltro($filtro, 10, $page);
        $data['filtro']    = $filtro;

        if($this->session->userdata('alert')){
            $data['alert'] = $this->session->userdata('alert');
            $this->session->unset_userdata('alert');
        }
        
        $this->header(2);
        $this->load->view('restrito/servicos', $data);
        $this->footer();
    }
    
        
    public function cadastro(){
        
        $data['servicos'] = $this->servicos->getAllCad();
        $data['departamentos'] = $this->departamentos->getAll();
        $data['func'] = "cadastro";
		$this->header(2);
		$this->load->view('restrito/servico', $data);//editaservico
		$this->footer();
		
	}
    
    public function edita(){
	    
	    
	    $servico  = $this->servicos->get($this->uri->segment(4));
	    $servico['servico_departamento'] = explode("¬" , $servico['servico_departamento']);
	    
	    $data['servico'] = $servico;
	    $data['servicos'] = $this->servicos->getAllCad();
        $data['departamentos'] = $this->departamentos->getAll();
	    $data['serv'] = $this->servicos->getAll();
	    $data['func'] = "edita";

		$this->header(2);
		$this->load->view('restrito/editaservico', $data);
		$this->footer();
	}
	
	public function deletefile(){
	    
	    $servico_id = trim($_GET['servico_id']);
	    $field = trim($_GET['field']);
	    $this->db->where('servico_id', $servico_id);
	    $this->db->set($field, null);
	    $this->db->update('servicos');
	    
	    return redirect('admin/adminservicos/edita/'.$servico_id);
	    
	    
	}
	
	public function verServico(){
	    
	    
	    $servico = $this->servicos->get($this->uri->segment(4));
	    $servico['servico_departamento'] = explode("¬" , $servico['servico_departamento']);
	    
	    $data['servico'] = $servico;
        $data['servicos'] = $this->servicos->getAllCad();
        $data['departamentos'] = $this->departamentos->getAll();
        $data['func'] = "ver";
        
		$this->header(2);
		$this->load->view('restrito/verservico', $data);//editaservico
		$this->footer();
	}
	
	public function excluirServico(){
	    
	    
	    $id = $this->input->post('id');
	    $senha = md5($this->input->post('senha'));
	    
	    if($senha == $this->session->userdata('senha')){
	        $this->session->set_userdata('alert', 3);
	        
	        // #5 - Chamada da função para gerar log de produto, quando der certo a senha e concluir a exclusão.
	        //$servico = $this->servicos->get($id);
	        //$dados = array(
	        //  'produto_id'    => $id,    
	        //  'produto_nome'  => $servico['servico_nome'],
	        //);
	        //$this->logProduto($dados);
	        // Fim #5
	        
	        $this->servicos->delete($id);    
	    } else {
	        $this->logBlock();
	        $this->session->set_userdata('alert', 4);
	    }
	    
	    redirect(base_url('admin/adminservicos/servicos'), 'refresh');
	}
	
	public function updateServico(){
	    
	    
	    $id = $this->input->post('id');
	    
        $imagem1 = $this->input->post('imagem1_verifica');
        $imagem2 = $this->input->post('imagem2_verifica');
        $video   = $this->input->post('video_verifica');
        
        if(!empty($_FILES['imagem1']['name'])){
            $imagem1 = '/imagens/servicos/' . $id . '-imagem1.jpg';
            $this->newUploadImagem($id . '-imagem1.jpg', 'imagem1');
        }
        if(!empty($_FILES['imagem2']['name'])){
            $imagem2 = '/imagens/servicos/' . $id . '-imagem2.jpg';
            $this->newUploadImagem($id . '-imagem2.jpg', 'imagem2');
        }
        if(!empty($_FILES['video']['name'])){
            $video = '/videos/servicos/' . $id . '-video.mp4';
            $this->newUploadVideo($id . '-video.mp4', 'video');
        }
        if($this->input->post('requisito') == 0){
            $req = $this->input->post('requisitoNecessarioId');
        }else{
            $req = null;
        }
        
	    $servico = array(
            'servico_codigo'            => $this->input->post('codigo'),
            'servico_nome'              => $this->input->post('nome'),
            'servico_subtitulo'         => $this->input->post('subtitulo'),
            'servico_resumo'            => $this->input->post('resumo'),
            'servico_valor'             => $this->limpaValor($this->input->post('valor')),
            'servico_habilitado'        => $this->input->post('habilitado'),
            'servico_visivel'           => $this->input->post('visivel'),
            'servico_detalhes'          => $this->input->post('desc'),
            'servico_questionario'      => $this->input->post('questionario0'),
            'servico_posicao'           => $this->input->post('posicao-frase'),
            'servico_upload'            => $this->input->post('upload'),
            'servico_promocaoPreco'     => $this->limpaValor($this->input->post('promocaoPreco')),
            'servico_promocaoAtivo'     => $this->input->post('promocaoAtivo'),
            'servico_desconto'          => $this->input->post('desconto'),
            'servico_descontoAtivo'     => $this->input->post('descontoAtivo'),
            'servico_dataInicial'       => $this->input->post('dataInicial'),
            'servico_dataFinal'         => $this->input->post('dataFinal'),
            'servico_dataInicial_cupom' => $this->input->post('dataInicialCupom'),
            'servico_dataFinal_cupom'   => $this->input->post('dataFinalCupom'),
            'servico_dataFinalAtivo'    => $this->input->post('dataFinalAtivo'),
            'servico_cupom'             => $this->input->post('cupom'),
            'servico_cupomAtivo'        => $this->input->post('cupomAtivo'),
            'servico_imagem1'           => $imagem1,
            'servico_imagem2'           => $imagem2,
            'servico_video'             => $video,
            'servico_historico'         => $this->input->post('historico'),
            // 'servico_livre'             => $this->input->post('requisito'),
            'servico_requisito'         => $req,
            'servico_qualidade'         => $this->input->post('qualidade'),
            'servico_qtd_parcela'       => $this->input->post('parcela'),
            'servico_parcelamento'      => $this->input->post('parcelamento'),
            'servico_qtd_parcela'       => $this->input->post('parcela'),
            'servico_parcelamento'      => $this->input->post('parcelamento'),
            'comprimento'               => $this->input->post('comprimento'),
            'largura'                   => $this->input->post('largura'),
            'altura'                    => $this->input->post('altura'),
            'peso'                      => $this->input->post('peso'),
            'und_comprimento'           => $this->input->post('medida'),
            'und_peso'                  => $this->input->post('un_peso'),
            'servico_departamento'      => $this->montarArray($this->input->post('departamentos')),
        );
        
        for($aux = 1; $aux < 10; $aux++ ){
            if ($this->input->post('questionario'.$aux)){
                $servico['servico_questionario']  = $servico['servico_questionario'] . '¬' . $this->input->post('questionario'.$aux);
            }
        }
        
        for($aux2 = 1; $aux2 < 10; $aux2++ ){
            if ($this->input->post('questionario'.$aux2)){
                $servico['servico_posicao']  = $servico['servico_posicao'] . '¬' . $this->input->post('posicao-frase'.$aux2);
            }
        }
        $this->servicos->update($id, $servico);
        
        $this->session->set_userdata('alert', 2);
        
        redirect(base_url('admin/adminservicos/servicos'));
	}
	

    
    public function novoServico(){
        
        
        $new = array(
            'servico_codigo'            => $this->input->post('codigo'),
            'servico_nome'              => $this->input->post('nome'),
            'servico_subtitulo'         => $this->input->post('subtitulo'),
            'servico_resumo'            => $this->input->post('resumo'),
            'servico_valor'             => $this->limpaValor($this->input->post('valor')),
            'servico_habilitado'        => $this->input->post('habilitado'),
            'servico_visivel'           => $this->input->post('visivel'),
            'servico_detalhes'          => $this->input->post('desc'),
            'servico_questionario'      => $this->input->post('pergunta'),
            'servico_posicao'           => $this->input->post('posicao-frase'),
            'servico_upload'            => $this->input->post('upload'),
            'servico_promocaoPreco'     => $this->limpaValor($this->input->post('promocaoPreco')),
            'servico_promocaoAtivo'     => $this->input->post('promocaoAtivo'),
            'servico_desconto'          => $this->input->post('desconto'),
            'servico_descontoAtivo'     => $this->input->post('descontoAtivo'),
            'servico_dataInicial'       => $this->input->post('dataInicial'),
            'servico_dataFinal'         => $this->input->post('dataFinal'),
            'servico_dataFinalAtivo'    => $this->input->post('dataFinalAtivo'),
            'servico_cupom'             => $this->input->post('cupom'),
            'servico_cupomAtivo'        => $this->input->post('cupomAtivo'),
            'servico_historico'         => $this->input->post('historico'),
            // 'servico_livre'             => $this->input->post('requisito'),
            'servico_requisito'         => $this->input->post('requisitoNecessarioId'),
            'servico_dataInicial_cupom' => $this->input->post('dataInicialCupom') == '0000-00-00' ? null : $this->input->post('dataInicialCupom'),
            'servico_dataFinal_cupom'   => $this->input->post('dataFinalCupom') == '0000-00-00' ? null : $this->input->post('dataFinalCupom'),
            'servico_destaque'          => "0",
            'servico_qualidade'         => $this->input->post('qualidade'),
            'servico_qtd_parcela'       => $this->input->post('parcela'),
            'servico_parcelamento'      => $this->input->post('parcelamento'),
            'servico_qtd_parcela'       => $this->input->post('parcela'),
            'servico_parcelamento'      => $this->input->post('parcelamento'),
            'comprimento'               => $this->input->post('comprimento'),
            'largura'                   => $this->input->post('largura'),
            'altura'                    => $this->input->post('altura'),
            'peso'                      => $this->input->post('peso'),
            'und_comprimento'           => $this->input->post('medida'),
            'und_peso'                  => $this->input->post('un_peso'),
            'servico_departamento'      => $this->montarArray($this->input->post('departamentos')),
        );
        
        for($aux = 1; $aux < 10; $aux++ ){
            if ($this->input->post('pergunta'.$aux)){
                $new['servico_questionario']  = $new['servico_questionario'] . '¬' . $this->input->post('pergunta'.$aux);
            }
        }
        
        for($aux2 = 1; $aux2 < 10; $aux2++ ){
            if ($this->input->post('pergunta'.$aux2)){
                $new['servico_posicao']  = $new['servico_posicao'] . '¬' . $this->input->post('posicao-frase'.$aux2);
            }
        }
        
        $id = $this->servicos->insert($new);
        
        $update = [];
        
        if(!empty($_FILES['imagem1']['name'])){
            $update['servico_imagem1'] = '/imagens/servicos/' . $id . '-imagem1.jpg';
            $this->newUploadImagem($id . '-imagem1.jpg', 'imagem1');
        }
        if(!empty($_FILES['imagem2']['name'])){
            $update['servico_imagem2'] = '/imagens/servicos/' . $id . '-imagem2.jpg';
            $this->newUploadImagem($id . '-imagem2.jpg', 'imagem2');
        }
        if(!empty($_FILES['video']['name'])){
            $update['servico_video'] = '/videos/servicos/' . $id . '-video.mp4';
            $this->newUploadVideo($id . '-video.mp4', 'video');
        }
        
        $this->session->set_userdata('alert', 1);
        
        if($update){
            $this->servicos->update($id, $update);
        }
        
        redirect(base_url('admin/adminservicos/servicos'));
    }
    
    public function newUploadImagem($name, $file){
        $config = array();
        $config['upload_path']          = './imagens/servicos/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 2000000;
        $config['overwrite']            = true;
        $config['file_name']            = $name;
        
        $this->load->library('upload');
        
        $this->upload->initialize($config);

        $this->upload->do_upload($file);
    }
    
    
    public function newUploadVideo($name, $file){
        $config = array();
        $config['upload_path']          = './videos/servicos/';
        $config['allowed_types']        = 'mp4|avi|mov|mp3|webm|3gp|mkv';
        $config['overwrite']            = true;
        $config['remove_spaces']        = true;
        $config['file_name']            = $name;
        
        $this->load->library('upload');
        
        $this->upload->initialize($config);
        
        $this->upload->do_upload($file);
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
    
    public function montarArray($itens){
        $array  = "";
        $cont   = 0;
        
        if($itens){
            foreach($itens as $i){
                if($cont == 0){
                    $array .= $i;    
                } else {
                    $array .= '¬' . $i;
                }
                $cont++;
            }
        } 
        
        return $array;
    }
}