<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estoque extends CI_Model {
    
    public function getAll(){
        $a = $this->db->get('estoque')->result_array();
        return $a;
    }
    
    public function getId($id){
        $this->db->where('estoque_id', $id);
	    return $this->db->get('estoque')->row_array();
    }
    
    public function getNomeProd($nome){
        $this->db->where('estoque_produto', $nome);
        return $this->db->get('estoque')->result_array();
    }
    
    public function update($id, $new){
	    $this->db->where('estoque_id', $id);
	    $this->db->update('estoque', $new);
	    return $this->db->insert_id();
	}
	
	public function insert($new){
	    $this->db->insert('estoque', $new);
	    return $this->db->insert_id();
	}
	
	public function excluir($id){
	    $this->db->where('estoque_id', $id);
        $this->db->delete('estoque');
	}
	
	public function getestoqueByProd($nome){
	    $this->db->where('estoque_produto', $nome);
	    $estoque = $this->db->get('estoque')->row_array();
	    
	    if($estoque != null){
	        return $estoque;
	    }else{
	        return 0;
	    }
	}

	
	 public function getAllEstoqueFiltro($filter, $limit, $start){
        $this->db->select('estoque.*');
        $this->db->like('estoque_data', $filter, 'both');
        $this->db->or_like('estoque_produto', $filter, 'both');
        $this->db->or_like('estoque_quantidade', $filter, 'both');
        $this->db->or_like('estoque_valor', $filter, 'both');
        $this->db->or_like('estoque_tipo', $filter, 'both');
        $this->db->order_by('estoque_id', 'desc');
        $this->db->limit($limit, $start);
        $a = $this->db->get('estoque')->result_array();
        return $a;
    }
    
    public function get_countFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->like('estoque_produto', $filter, 'both');
        $this->db->or_like('estoque_tipo', $filter, 'both');
        $this->db->or_like('estoque_data', $filter, 'both');
        $a = $this->db->get('estoque')->row_array();
        return $a['pages'];
    }
    
    public function getProdutos(){
        $this->db->select('servico_id, servico_nome, servico_modelo');
        return $this->db->get('servicos')->result_array();
    }
    
    /**Funções feitas por Anderson Moreira em 05/01/2022**/
    public function recuperaEstoque($dados){
        
	    $this->db->select('servico_nome, servico_id');
	    $produto = $this->db->get('servicos')->result_array();

        $html="";
        $pos = 0;
        foreach($produto as $prt){
            $this->db->select("estoque_valor");
            $this->db->where('estoque_produto =', $prt['servico_nome']);
            $this->db->order_by("estoque_id", 'DESC');
            $valor = $this->db->get('estoque')->row_array();
            if($valor){
                $valor = $valor['estoque_valor'];
            }else{
                $valor = "0,00";
            }
            
            $this->db->select("estoque_id, estoque_data, estoque_produto, sum(estoque_quantidade) as estoque_quantidade, estoque_tipo, estoque_valor");
            $this->db->where('estoque_produto =', $prt['servico_nome']);
            $this->db->group_by("estoque_produto");
            $estoque = $this->db->get('estoque')->row_array();
            if($estoque){
                $estoque = $estoque['estoque_quantidade'];
            }else{
                $estoque = "0";
            }
            
            $html .= "<tr id='line".$pos."'>
                        <td class='text-center'># ".$prt['servico_id']."</td>
                        <td>".$prt['servico_nome']."<input type='hidden' name='item".$pos."' id='item".$pos."' value='".$prt['servico_nome']."'></td>
                        <td>R$ ".$valor."</td>
                        <td>
                            <div class='input-group mb-3 input-group-sm w-75'>
                                <div class='input-group-append'>
                                    <span class='input-group-text' style='border-radius: .25rem 0 0 .25rem !important;'>R$</span>
                                </div>
                                <input type='text' class='form-control money' name='newVal".$pos."' id='newVal".$pos."' value='".$valor."' aria-label='Amount (to the nearest dollar)'>
                            </div>
                        </td>
                        <td>".$estoque." unidades</td>
                        <td>
                            <div class='input-group mb-3 input-group-sm w-75'>
                                <input type='text' class='form-control number' name='newQtd".$pos."' id='newQtd".$pos."' value='0' aria-label='Amount (to the nearest dollar)'>
                                <div class='input-group-append'>
                                    <span class='input-group-text' style='border-radius: 0 .25rem .25rem 0 !important;'>unidades</span>
                                </div>
                            </div>
                        </td>
                        <td id='action".$pos."' ><button type='button' class='btn btn-success' onclick='GravaEstoque(".$pos.")'><i class='fa fa-thumbs-up'></i></button></td>
                    </tr>";
            $pos++;        
        }
        return $html;
        
    }
    
    public function getestoqueAntigo($produto){
        $this->db->where('estoque_produto =', $produto);
        return $this->db->get('estoque')->row_array();
    }
    
    public function newEstoque($dados){
        $this->db->insert('estoque', $dados);
    }
    
    public function updtEstoque($dados){
        $this->db->where('estoque_produto =', $dados['produto']);
        $this->db->order_by('estoque_id', 'DESC');
        $a = $this->db->get('estoque')->row_array();
        
        if($a){
            if($dados['movimento'] == "Entrada"){
                $qtd = $dados['newQtd'];
            }elseif($dados['movimento'] == "Ajuste+"){
                $qtd = $dados['newQtd'];
            }elseif($dados['movimento'] == "Ajuste-"){
                $qtd = ($dados['newQtd'] * -1);
            }elseif($dados['movimento'] == "Perda"){
                $qtd = ($dados['newQtd'] * -1);
            }elseif($dados['movimento'] == "Garantia"){
                $qtd = ($dados['newQtd'] * -1);
            }
            $valor_antigo = $a['estoque_valor'];
        } 
        
        if(!$a){
            if($dados['movimento'] == "Entrada"){
                $qtd = $dados['newQtd'];
            }elseif($dados['movimento'] == "Ajuste"){
                $qtd = $dados['newQtd'];
            }elseif($dados['movimento'] == "Perda"){
                $qtd = ($dados['newQtd'] * -1);
            }elseif($dados['movimento'] == "Garantia"){
                $qtd = ($dados['newQtd'] * -1);
            }   
            $valor_antigo = 0;
        }

        $a = array(
            'estoque_data'      => date('Y-m-d H:i:s'),
            'estoque_produto'   => $dados['produto'],
            'estoque_quantidade'=> $qtd,
            'estoque_tipo'      => $dados['movimento'],
            'estoque_valor'     => $dados['newVal'],
            'estoque_desc'      => 0, 
            'valor_antigo'      => $valor_antigo, 
        );
        
        $this->db->insert('estoque', $a);
        
        $this->db->select("estoque_id, estoque_valor, sum(estoque_quantidade) as estoque_quantidade, estoque_produto");
        $this->db->where('estoque_produto =', $a['estoque_produto']);
        $this->db->group_by("estoque_produto");
        $estoques = $this->db->get('estoque')->row_array();
        
        $html = "<td class='text-center'>Atualizado</td>
                <td>".$a['estoque_produto']."</td>
                <td>R$ ".$a['estoque_valor']."</td>
                <td>".formatarMoedaReal($estoques['estoque_valor'], true)."</td>
                <td>".$estoques['estoque_quantidade']." unidades</td>
                <td>Atualizado</td>
                <td><button type='button' class='btn btn-danger'><i class='fa fa-lock'></i></button></td>";
        
        return $html;
    }
        /**Fim das Funções feitas por Anderson Moreira em 05/01/2022**/
}

