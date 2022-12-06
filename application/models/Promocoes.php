<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Promocoes extends CI_Model {

    public function insert($new){
        $this->db->insert('promocoes', $new);
    }
    
    public function update($id, $new){
        $this->db->where('promocao_id', $id);
        $this->db->update('promocoes', $new);
    }
    
    public function delete($id){
        $this->db->where('promocao_id', $id);
        $this->db->delete('promocoes');
    }
    
    public function getAllAtivos(){
        $this->db->where('promocao_datainicial  <=', date('Y-m-d'));
        $itens = $this->db->get('promocoes')->result_array();
        
        $promocoes  = [];
        $cont       = 0;
        
        foreach($itens as $i){
            if($i['promocao_datafinal_ativo'] == 1){
                if($i['promocao_datafinal'] >= date('Y-m-d')){
                    $promocoes[$cont] = array(
                        'promocao_preco'            => $i['promocao_preco'],
                        'promocao_preco_ativo'      => $i['promocao_preco_ativo'],
                        'promocao_desconto'         => $i['promocao_desconto'],
                        'promocao_desconto_ativo'   => $i['promocao_desconto_ativo'],
                        'promocao_cupom'            => $i['promocao_cupom'],
                        'promocao_cupom_ativo'      => $i['promocao_cupom_ativo'],
                        'promocao_produtos'         => $i['promocao_produtos'],
                        'promocao_datainicial'      => $i['promocao_datainicial'],
                        'promocao_datafinal'        => $i['promocao_datafinal'],
                        'promocao_datafinal_ativo'  => $i['promocao_datafinal_ativo'],
                    );
                }
            } else {
                $promocoes[$cont] = array(
                    'promocao_preco'            => $i['promocao_preco'],
                    'promocao_preco_ativo'      => $i['promocao_preco_ativo'],
                    'promocao_desconto'         => $i['promocao_desconto'],
                    'promocao_desconto_ativo'   => $i['promocao_desconto_ativo'],
                    'promocao_cupom'            => $i['promocao_cupom'],
                    'promocao_cupom_ativo'      => $i['promocao_cupom_ativo'],
                    'promocao_produtos'         => $i['promocao_produtos'],
                    'promocao_datainicial'      => $i['promocao_datainicial'],
                    'promocao_datafinal'        => $i['promocao_datafinal'],
                    'promocao_datafinal_ativo'  => $i['promocao_datafinal_ativo'],
                );
            }
            $cont++;
        }
        
        return $promocoes;
    }
    
    public function get($id){
        $this->db->where('promocao_id', $id);
        return $this->db->get('promocoes')->row_array();
    }
    
     public function getAllT(){
        return $this->db->get('promocoes')->row_array();
    }
    
    public function get_count() {
        $this->db->select(" COUNT(*) as pages");
        $a = $this->db->get('promocoes')->row_array();
        return $a['pages'];
    }
    
    public function getAll($limit, $start){
        $this->db->select('promocao_id, promocao_titulo, promocao_datainicial, promocao_datafinal, promocao_preco, promocao_desconto');
        $this->db->order_by('promocao_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('promocoes');
        return $data->result_array();
    }
    
    public function get_countFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->like('promocao_titulo', $filter, 'both');
        $this->db->or_like('promocao_datainicial', $filter, 'both');
        $this->db->or_like('promocao_datafinal', $filter, 'both');
        $this->db->or_like('promocao_preco', $filter, 'both');
        $this->db->or_like('promocao_desconto', $filter, 'both');
        $a = $this->db->get('promocoes')->row_array();
        return $a['pages'];
    }
    
    public function getAllFiltro($filter, $limit, $start){
        $this->db->select('promocao_id, promocao_titulo, promocao_datainicial, promocao_datafinal, promocao_preco, promocao_desconto');
        $this->db->like('promocao_titulo', $filter, 'both');
        $this->db->or_like('promocao_datainicial', $filter, 'both');
        $this->db->or_like('promocao_datafinal', $filter, 'both');
        $this->db->or_like('promocao_preco', $filter, 'both');
        $this->db->or_like('promocao_desconto', $filter, 'both');
        $this->db->order_by('promocao_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('promocoes');
        return $data->result_array();
    }
 
    public function promocao($id){
        $hoje = date('Y-m-d');
        $this->db->where('servico_id', $id)->where('servico_dataInicial <=', $hoje)->where('servico_dataFinal >=', $hoje);
        $z = $this->db->get("servicos")->row_array();
        $ativo = 0;
        
        
        if($z != null || $z != "" || $z != " "){
            
            if($z['servico_promocaoAtivo'] == 1 && $z['servico_promocaoPreco'] != 0.00){
                $z['servico_valor'] = $z['servico_promocaoPreco'];
                $ativo = 1;
            }
            
            if($z['servico_descontoAtivo'] == 1 && $z['servico_desconto'] != 0){
                $z['servico_valor'] = $z['servico_valor'] * (1-($z['servico_desconto']/100));
                $ativo = 2;
            }
            
            if($z['servico_dataInicial'] >= date('Y-m-d') && $z['servico_dataFinal'] <= date('Y-m-d')){
                $z['servico_valor'] = $z['servico_valor'] * (1-($z['servico_desconto']/100));
                $ativo = 3;
            }
            
            $promocoes = array(
                'promocao_preco'            => $z['servico_valor'],
                'promocao_preco_ativo'      => $z['servico_promocaoAtivo'],
                'promocao_desconto'         => $z['servico_desconto'],
                'promocao_desconto_ativo'   => $z['servico_descontoAtivo'],
                'promocao_cupom'            => $z['servico_cupom'],
                'promocao_cupom_ativo'      => $z['servico_cupomAtivo'],
                'promocao_produtos'         => $z['servico_promocaoPreco'],
                'promocao_datainicial'      => $z['servico_dataInicial'],
                'promocao_datafinal'        => $z['servico_dataFinal'],
                'promocao_datafinal_ativo'  => $z['servico_dataFinalAtivo'],
                'ativo'                     => $ativo,
            );
        }else{
            $promocoes = array();
        } 
        return $promocoes;
    }
    
    public function promocao2($servico){
        
        if($servico['servico_promocaoAtivo'] == 1 && $servico['servico_promocaoPreco'] != 0.00){
            $servico['servico_valor'] = $servico['servico_promocaoPreco'];
        }
        
        if($servico['servico_descontoAtivo'] == 1 && $servico['servico_desconto'] != 0){
            $servico['servico_valor'] = $servico['servico_valor'] * (1-($servico['servico_desconto']/100));
        }
        
        if($servico['servico_dataInicial'] >= date('Y-m-d') && $servico['servico_dataFinal'] <= date('Y-m-d')){
            $servico['servico_valor'] = $servico['servico_valor'] * (1-($servico['servico_desconto']/100));
        }
        
        return $servico;
    }
    
    public function resgataCupom($cupom, $carrinho){
        $hoje = date('Y-m-d');
        $this->db->where('servico_cupom', $cupom)->where('servico_dataInicial_cupom <=', $hoje)->where('servico_dataFinal_cupom >=', $hoje);
        $z = $this->db->get("servicos")->row_array();
        $cupom = 0;
        
        $this->db->where('idTemp', $carrinho);
        $y = $this->db->get("cartunico")->row_array();
        
        $a = explode("¬", $y['listServicosId']);
        
        if(in_array($z['servico_id'], $a)){
            $cupom = $z['servico_desconto'];
        }
        
        $desconto = $z['servico_valor'] * ($cupom / 100);
        
        $y['desconto'] = $desconto;
        
        $this->db->where('idTemp', $y['idTemp']);
        $this->db->update('cartunico', $y);
        
        return $desconto;
    }
    
    
}