<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Afiliados extends CI_Model {
    
    public function insert($new){
        $this->db->insert('afiliados', $new);
        return $this->db->insert_id();
    }
    
    public function update($id, $new){
        $this->db->where('afiliado_id', $id);
        $this->db->update('afiliados', $new);
    }
    
    public function verific($id){
        $this->db->where('afiliado_cliente_id', $id);
        $this->db->where('afiliado_ativo', 1);
        $this->db->select('afiliado_id');
        $data = $this->db->get('afiliados');
        return $data->row_array();
        
    }
    
    public function delete($id){
        $this->db->where('afiliado_id', $id);
        $this->db->delete('afiliados');
    }
    
    public function getCPNJ($login){
        $this->db->where('afiliado_cnpj', $login);
        $data = $this->db->get('afiliados');
        return $data->row_array();
    }
    
    public function getSenha($senha){
        $this->db->where('afiliado_senha', $senha);
        $data = $this->db->get('afiliados');
        return $data->row_array();
    }
    
    public function getSenhaLogin($login, $senha){
        $this->db->where('afiliado_cnpj', $login);
        $this->db->where('afiliado_senha', $senha);
        $data = $this->db->get('afiliados');
        return $data->row_array();
    }
    
    public function getPedido($id){
        $this->db->where('afiliado', $id);
        return $this->db->get('historicocompras')->result_array();
    }
    
    public function getAll(){
        $this->db->select('afiliado_ativo, afiliado_id, afiliado_cliente_id, afiliado_comissao, afiliado_codigo');
        $lista = $this->db->get('afiliados')->result_array();
        $count = 0;
        foreach($lista as $a){
            $this->db->select('cliente_nome');
            $this->db->where('cliente_id', $a['afiliado_cliente_id']);
            $z = $this->db->get('cliente')->row_array();
            
            if($a['afiliado_ativo'] == 1){
                $ativo = "Ativo";
            }elseif($a['afiliado_ativo'] == 0){
                $ativo = "Aguardando Aprovação";
            }else{
                $ativo = "Recusado/Cancelado";
            }
            
            $data[$count]['afiliado_id']         = $count;
            $data[$count]['afiliado_cliente_id'] = $z['cliente_nome'];
            $data[$count]['afiliado_comissao']   = $a['afiliado_comissao'];
            $data[$count]['afiliado_ativo']      = $ativo;
            $data[$count]['afiliado_codigo']     = $a['afiliado_codigo'];
            $data[$count]['afiliado_tipo']       = "Cliente";
            $data[$count]['afiliado_empresa']    = "---";
            $count++;
        }
        
        $this->db->select('afiliado_ativo, afiliado_id, afiliado_nome, afiliado_comissao, afiliado_codigo, afiliado_empresa');
        $lista = $this->db->get('afiliadosLogin')->result_array();
        
        foreach($lista as $a){
            if($a['afiliado_ativo'] == 1){
                $ativo = "Ativo";
            }elseif($a['afiliado_ativo'] == 0){
                $ativo = "Aguardando Aprovação";
            }else{
                $ativo = "Recusado/Cancelado";
            }
            
            $data[$count]['afiliado_id']         = $count;
            $data[$count]['afiliado_cliente_id'] = $a['afiliado_nome'];
            $data[$count]['afiliado_comissao']   = $a['afiliado_comissao'];
            $data[$count]['afiliado_ativo']      = $ativo;
            $data[$count]['afiliado_codigo']     = $a['afiliado_codigo'];
            $data[$count]['afiliado_tipo']       = "Empresa";
            $data[$count]['afiliado_empresa']    = $a['afiliado_empresa'];
            $count++;
        }
        
        return $data;
    }
    
    public function getPedidoView($id){
        $this->db->select('idcompra, idClient, valorCompra, dataCompra, statusPagamento');
        $this->db->where('afiliado', $id);
        $pedidos = $this->db->get('historicocompras')->result_array();
        
        $count=0;
        foreach($pedidos as $p){
            $this->db->select('cliente_nome');
            $this->db->where('cliente_id', $p['idClient']);
            $z = $this->db->get('cliente')->row_array();
            
            $this->db->select('nomeStatusCompra');
            $this->db->where('idStatusCompra', $p['statusPagamento']);
            $y = $this->db->get('statuscompras')->row_array();
            
            
            $data[$count]['id']                 = $p['idcompra'];
            $data[$count]['nome']               = $z['cliente_nome'];
            $data[$count]['total']        = $p['valorCompra'];
            $data[$count]['data']               = $p['dataCompra'];
            $data[$count]['status']             = $y['nomeStatusCompra'];
            $count++;
        }
        return $data;
    }
    
    function excluirProduto($id, $produto){
        $this->db->select("afiliado_produtos");
        $pedidos = $this->db->get('afiliados')->row_array();
        
        echo '<pre>';
            print_r($pedidos);
        echo '<pre>';
        
        if($pedidos['afiliado_produtos'] != ""){
            if(strpos($pedidos['afiliado_produtos'], "¬")){
                $aux = explode("¬", $pedidos['afiliado_produtos']);
            } else {
                $aux[0] = $pedidos['afiliado_produtos'];
            }
            
            for($i=0; $i<count($aux); $i++){
                if($aux[$i] == $produto){
                    $aux[$i] = null;
                }
            }
            
            
        }
    }
    
    
    
    public function getAfiliadoID($id){
        
        $this->db->where('afiliado_id', $id);
        $lista = $this->db->get('afiliados')->row_array();
        $count = 0;
        
            $this->db->select('cliente_nome, cliente_cpf, cliente_email');
            $this->db->where('cliente_id', $lista['afiliado_cliente_id']);
            $z = $this->db->get('cliente')->row_array();
            
            if($lista['afiliado_ativo'] == 1){
                $ativo = "Ativo";
            }elseif($lista['afiliado_ativo'] == 0){
                $ativo = "Aguardando Aprovação";
            }else{
                $ativo = "Recusado/Cancelado";
            }
            
            $b = array();
            if($lista['afiliado_produtos'] != ""){
                if(strpos($lista['afiliado_produtos'], "¬")){
                    $aux = explode("¬", $lista['afiliado_produtos']);
                }else{
                    $aux[0] = $lista['afiliado_produtos'];
                }
                $a['produtos'] = 4;
                
                for($i=0; $i<count($aux); $i++){
                    $j = $i + 1;
                    $this->db->select("servico_id, servico_nome");
                    $this->db->where('servico_id', $aux[$i]);
                    $b[$i] = $this->db->get('servicos')->row_array();
                }
            }
            
            $data['afiliado_id']         = $lista['afiliado_id'];
            $data['afiliado_cliente_id'] = $z['cliente_nome'];
            $data['afiliado_comissao']   = $lista['afiliado_comissao'];
            $data['afiliado_ativo']      = $ativo;
            $data['afiliado_cnpj']       = $z['cliente_cpf'];
            $data['afiliado_email']      = $z['cliente_email'];
            $data['afiliado_codigo']     = $lista['afiliado_codigo'];
            $data['afiliado_apelido']    = $lista['afiliado_apelido'];
            $data['afiliado_banco']      = 'bando bla bla'; /*$lista['afiliado_banco'];*/
            $data['afiliado_produtos']   = $b;
            
        return $data;
    }
    
    public function getAllAtivos(){
        $this->db->where('afiliado_habilitado', 1);
        return $this->db->get('afiliados')->result_array();
    }
    
    public function get($id){
        $this->db->where('afiliado_id', $id);
        return $this->db->get('afiliados')->row_array();
    }
    
    public function getAtivo($id){
        $this->db->where('afiliado_habilitado', 1);
        $this->db->where('afiliado_id', $id);
        return $this->db->get('afiliados')->row_array();
    }
    
    public function get_countFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->like('afiliado_nome', $filter, 'both');
        $this->db->or_like('afiliado_cnpj', $filter, 'both');
        
        $a = $this->db->get('afiliados')->row_array();
        return $a['pages'];
    }
    
    public function getAllFiltro($filter, $limit, $start){
        $this->db->or_like('afiliado_nome', $filter, 'both');
        $this->db->or_like('afiliado_cnpj', $filter, 'both');
        
        $this->db->order_by('afiliado_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('afiliados');
        return $data->result_array();
    }
    
    public function verifyLink($link){
        $this->db->like('afiliado_link', $link);
        $data = $this->db->get('afiliados')->result_array();
        if($data){
            return true;
        } else {
            return false;
        }
    }
    
    public function check($id){
        $this->db->where('afiliado_cliente_id', $id);
        $a = $this->db->get('afiliados')->row_array();

        if($a){
            $b = $this->menuAfiliado($a);
        }else{
            $b = $this->makeAfiliado();
        }
        return $b;
    }
    
    function makeAfiliado(){
        // $a['menu'] =   "<div style='border:2px solid red; padding:10px; border-radius:25px;'>
        //         <div class='col-md-3' style='position:absolute; top:25%;'>
        //         <i class='icone-menu fa fa-users' aria-hidden='true'></i>
        //         </div>
        //         <div class='text-rigth col-md-9 opc-perfil' style='margin-left:20%;'>
        //         <a class='a-menu' onclick='makeAfiliado()'>Torne-se um Afiliado!</a>
        //         </div>
        //         </div>";
        
        $a['menu'] =   "<button class='btn-primary btn' style='width: 118%; font-size: 15px; margin-left: -15%;'>
                            <a class='a-menu' onclick='makeAfiliado()'>
                                <div class='opc-perfil' style='font-size: 21px; font-weight: 400;'>
                                    Torne-se um Afiliado
                                </div>
                            </a>
                        </button>";
                
        return $a;
    }
    
    function cadastraAfiliado($id){
        $this->db->where('cliente_id', $id);
        $a = $this->db->get('cliente')->row_array();

        $html = "<div class='modal-header'>
                    <h5 class='modal-title'>Confirma a Adesão ao Programa de Afiliados</h5>
                </div>
                <div class='modal-body'>
                    <div class='row'>
                        <div class='col-md-12 form-group'>
                            <label>Nome Completo</label>
                            <input class='form-control'disabled value='".$a['cliente_nome']."'>
                        </div>
                        <div class='col-md-4 form-group'>
                            <label>CPF/CNPJ</label>
                            <input class='form-control'disabled value='".$a['cliente_cpf']."'>
                        </div>
                        <div class='col-md-4 form-group'>
                            <label>E-mail</label>
                            <input class='form-control'disabled value='".mb_strtolower($a['cliente_email'])."'>
                        </div>
                        <div class='col-md-4 form-group'>
                            <label>Fone</label>
                            <input class='form-control'disabled value='".$a['cliente_telefone']."'>
                        </div>
                        <div class='col-md-12 form-group'>
                            <label>Endereco</label>
                            <input class='form-control'disabled value='".$a['cliente_endereco']."'>
                        </div>
                        <div class='col-md-3 form-group'>
                            <label>Número</label>
                            <input class='form-control'disabled value='".$a['cliente_numero']."'>
                        </div>
                        <div class='col-md-2 form-group'>
                            <label>Comp.</label>
                            <input class='form-control'disabled value='".$a['cliente_complemento']."'>
                        </div>
                        <div class='col-md-4 form-group'>
                            <label>Bairro</label>
                            <input class='form-control'disabled value='".$a['cliente_bairro']."'>
                        </div>
                        <div class='col-md-3 form-group'>
                            <label>CEP</label>
                            <input class='form-control'disabled value='".$a['cliente_cep']."'>
                        </div>
                        <div class='col-md-8 form-group'>
                            <label>Cidade</label>
                            <input class='form-control'disabled value='".$a['cliente_cidade']."'>
                        </div>
                        <div class='col-md-4 form-group'>
                            <label>UF</label>
                            <input class='form-control'disabled value='".$a['cliente_estado']."'>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <input class='btn btn-primary' onclick='afiliadoAdesao(1)' value='Confirmar Adesão'>
                    <input class='btn btn-danger' onclick='afiliadoAdesao(0)' value='Cancelar'>
                </div>";
        return $html;
    }
    
    function novoCadastro($id){
        $dados = array(
        'afiliado_cliente_id'   => $id,
        'afiliado_comissao'     => 0,
        'afiliado_ativo'        => 0,
        'afiliado_codigo'       => md5($id),
        );
        return $this->db->insert('afiliados', $dados);
    }
    
    function menuAfiliado($afiliado){
        $a['menu'] =   "<div class='row-hover row form-group'>
                    <div class='col-md-2'>
                        <i class='icone-menu fa fa-users' aria-hidden='true'></i>
                    </div>
                    <div class='text-left col-md-10 opc-perfil' style='margin-top:-16%; margin-left:25%;'>
                        <a class='a-menu' href='#pedidos_afiliado'>Afiliados</a>
                    </div>
                </div>";
        
        if($afiliado['afiliado_ativo'] == 1){
            $this->db->select("cliente_nome, cliente_cpf, cliente_telefone");
            $this->db->where('cliente_id', $afiliado['afiliado_cliente_id']);
            $b = $this->db->get('cliente')->row_array();
            $a['corpo'] =  "<p style='font-weight: 900;font-size: 30px;color: #444;'>Menu Afiliado</p>
                            <button onclick='newProdutoAfiliado()' style='position:absolute; margin-top:-5%; margin-left:70%;' type='button' class='btn btn-success'><i class='fa fa-search-plus' aria-hidden='true'></i></button>
                                <div class='row'>
                                    <div class='col-md-12 form-group'>
                                        <label>Afiliado</label>
                                        <input class='form-control'disabled value='".$b['cliente_nome']."'>
                                    </div>
                                    <div class='col-md-4 form-group'>
                                        <label>CPF/CNPJ</label>
                                        <input class='form-control'disabled value='".$b['cliente_cpf']."'>
                                    </div>
                                    <div class='col-md-4 form-group'>
                                        <label>Fone</label>
                                        <input class='form-control'disabled value='".$b['cliente_telefone']."'>
                                    </div>
                                    <div class='col-md-4 form-group'>
                                        <label>Código</label>
                                        <input class='form-control'disabled value='".$afiliado['afiliado_codigo']."'>
                                    </div>
                                    <div class='col-md-4 form-group'>
                                        <label>Apelido</label>
                                        <input class='form-control'disabled value='".$afiliado['afiliado_apelido']."'>
                                    </div>
                                    <div class='col-md-2 form-group'>
                                        <button onclick='apelidoAfiliado()' style='position:absolute; margin-top: 18%;' type='button' class='btn btn-info'><i class='fa fa-link' aria-hidden='true'></i></button>
                                    </div>
                                    <div class='col-md-6 form-group'>
                                        <label>Comissao</label>
                                        <input class='form-control'disabled value='".$afiliado['afiliado_comissao']."'>
                                    </div>
                                </div>";
            if($afiliado['afiliado_produtos'] != ""){
                if(strpos($afiliado['afiliado_produtos'], "¬")){
                    $aux = explode("¬", $afiliado['afiliado_produtos']);
                }else{
                    $aux[0] = $afiliado['afiliado_produtos'];
                }
                $a['produtos'] = "<p style='font-weight: 900;font-size: 30px;color: #444;'>Produtos Vinculados</p>
                                  <div class='row'>
                                  <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>#</th>
                                            <th scope='col'>Produto</th>
                                            <th scope='col'>Link</th>
                                            <th scope='col'>Vendas</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                for($i=0; $i<count($aux); $i++){
                    $j = $i + 1;
                    $this->db->select("servico_id, servico_nome");
                    $this->db->where('servico_id', $aux[$i]);
                    $b = $this->db->get('servicos')->row_array();
                    $a['produtos'] .= "<tr>
                                        <th scope='row'>".$j."</th>
                                        <td>".$b['servico_nome']."</td>
                                        <td><a href='".base_url('e9b8ed001f1726b0385dcfec2dbe2ea1/'.$b['servico_id'].'/'.$afiliado['afiliado_codigo'])."' target='_blank'><i class='fa fa-link' aria-hidden='true'></i></a></td>
                                        <td>0</td>
                                      </tr>";
                }
                $a['produtos'] .= "</tbody>
                                  </table>
                                  </div>";
            }else{
                $a['produtos'] = "<div class='col-md-2 text-center form-group'></div>
                                    <div class='col-md-10 text-center form-group'>
                                    <h1>Nenhum Produto Vinculado.</h1>
                                    </div>";
            }    
        }else{
            $a['corpo'] = "<div class='col-md-12 text-center form-group'>
                                <h1>Aguardando Aprovação.</h1>
                           </div>";
        }
        return $a;

    }
    
    function novoProduto($id){
        $this->db->select("afiliado_produtos");
        $this->db->where('afiliado_cliente_id', $id);
        $z = $this->db->get('afiliados')->row_array();
        
        $this->db->select("servico_id, servico_nome");
        $produto = $this->db->get('servicos')->result_array();
        
        $aux = explode("¬", $z['afiliado_produtos']);
        
        $html = "<div class='modal-header'>
                    <h5 class='modal-title'>Selecione o Produto para Divulgação</h5>
                    </div>
                    <div class='modal-body'>
                        <div class='row'>
                            <label>Selecione um produto</label>
                            <select class='selectProduto' name='prodAfiliado' id='prodAfiliado'>";
        
        foreach($produto as $prod){
            if(!in_array($prod['servico_id'], $aux)){
                $html .= "<option value='".$prod['servico_id']."'>".$prod['servico_nome']."</option>";
            }
        }
        
        $html .= "</select>
                  <div class='modal-footer'>
                    <input class='btn btn-primary' onclick='addProduto(1)' value='Confirmar'>
                    <input class='btn btn-danger' onclick='addProduto(0)' value='Cancelar'>
                  </div>";
        return $html;
    }
     
    function apelido($dados){
        
        $this->db->where('afiliado_apelido', $dados['apelido']);
        $z = $this->db->get('afiliados')->row_array();
        if($z){
            $data['erro'] = "Apelido já utilizado";
        }else{
            $this->db->where('afiliado_cliente_id', $dados['id']);
            $k = $this->db->get('afiliados')->row_array();
            
            $k['afiliado_apelido']  = $dados['apelido'];
            $this->db->replace('afiliados', $k);
            
            $data['success'] = "Apelido cadastrado";
        }
        return $data;
    }
    
    function addProduto($dados){
        $this->db->where('afiliado_cliente_id', $dados['id']);
        $z = $this->db->get('afiliados')->row_array();
        $prod = "";
        if($z['afiliado_produtos'] != ""){
            if( strpos($z['afiliado_produtos'], "¬")){
                $helper = explode("¬", $z['afiliado_produtos']);
            }else{
                $helper[0] = $z['afiliado_produtos'];
            }
            for($i=0; $i<count($helper); $i++){
                if($i>0){
                   $prod .= "¬";
                }
                $prod .= $helper[$i];
            }
            $prod .= "¬".$dados['produto'];
        }else{
            $prod .= $dados['produto'];
        }
        
        $z['afiliado_produtos'] = $prod;
        $this->db->replace('afiliados', $z);
    }
    
    function afiliadoAtivo($id, $step){
        $this->db->where('afiliado_id', $id);
        $a = $this->db->get('afiliados')->row_array();
        
        $a['afiliado_ativo'] = $step;
        
        $this->db->replace('afiliados', $a);
    }
}