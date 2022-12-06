<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos extends CI_Model {
    
    public function insert($new){
        $this->db->insert('servicos', $new);
        return $this->db->insert_id();
    }
    
    public function update($id, $new){
        $this->db->where('servico_id', $id);
        $this->db->update('servicos', $new);
    }
    
    public function delete($id){
        $this->db->where('servico_id', $id);
        $this->db->delete('servicos');
    }
    
    public function getAll(){
        return $this->db->get('servicos')->result_array();
    }
    public function getAllSimplificado(){
        $this->db->select('
            servico_id, 
            servico_nome, 
            servico_valor, 
            servico_imagem1,
            servico_resumo,
            servico_qtd_parcela, 
            servico_parcelamento, 
            servico_subtitulo,
            servico_cupomAtivo,
            servico_dataInicial_cupom,
            servico_dataFinal_cupom,
            servico_promocaoPreco,
            servico_promocaoAtivo,
            servico_desconto,
            servico_descontoAtivo,
            servico_dataInicial,
            servico_dataFinal,
        ');
        $this->db->where('servico_habilitado', 1);
        return $this->db->get('servicos')->result_array();
    }
    
    public function getAllAtivos(){
        $this->db->where('servico_habilitado', 1);
        return $this->db->get('servicos')->result_array();
    }

    public function getAllLista(){
        $this->db->select('servico_id, servico_nome, ');
        $this->db->where('servico_habilitado', 1);
        return $this->db->get('servicos')->result_array();
    }
    
    public function getAllDestaques(){
         $this->db->select('
            servico_id, 
            servico_nome, 
            servico_valor, 
            servico_imagem1,
            servico_resumo,
            servico_qtd_parcela, 
            servico_parcelamento, 
            servico_subtitulo,
            servico_cupomAtivo,
            servico_dataInicial_cupom,
            servico_dataFinal_cupom,
            servico_promocaoPreco,
            servico_promocaoAtivo,
            servico_desconto,
            servico_descontoAtivo,
            servico_dataInicial,
            servico_dataFinal,
        ');
        $this->db->where('servico_habilitado', 1);
        $this->db->where('servico_destaque', 1);
        return $this->db->get('servicos')->result_array();
    }
    
    public function getAllDDepartamento($departamento){
        $this->db->where('servico_habilitado', 1);
        $this->db->select('
            servico_id, 
            servico_nome, 
            servico_valor, 
            servico_imagem1,
            servico_resumo,
            servico_qtd_parcela, 
            servico_parcelamento, 
            servico_subtitulo,
            servico_cupomAtivo,
            servico_dataInicial_cupom,
            servico_dataFinal_cupom,
            servico_promocaoPreco,
            servico_promocaoAtivo,
            servico_desconto,
            servico_descontoAtivo,
            servico_dataInicial,
            servico_dataFinal,
            servico_departamento
        ');
        $servicos = $this->db->get('servicos')->result_array();
        
        $cont = 0;
        $query = [];
        
        foreach($servicos as $p) {
            if($p['servico_departamento']) {
                 $aux = explode('¬', $p['servico_departamento']);
                 for($i = 0; $i < count($aux); $i++) {
                     if($departamento == $aux[$i]){
                         $query[$cont] = $p;
                         $cont++;
                     }
                 }
            }
        }
        
        return $query;
    }
    
     public function getRandom(){
        $this->db->where('servico_habilitado', 1);
        $this->db->select('
            servico_id, 
            servico_nome, 
            servico_valor, 
            servico_imagem1 as servico_imagem,
            servico_resumo,
            servico_qtd_parcela, 
            servico_parcelamento, 
            servico_subtitulo,
            servico_cupomAtivo,
            servico_dataInicial_cupom,
            servico_dataFinal_cupom,
            servico_promocaoPreco,
            servico_promocaoAtivo,
            servico_desconto,
            servico_descontoAtivo,
            servico_dataInicial,
            servico_dataFinal,
        ');$this->db->order_by('rand()');
        $this->db->limit(6);
        $query = $this->db->get('servicos');
        return $query->result_array();
    }
    
    public function get($id){
        $this->db->where('servico_id', $id);
        return $this->db->get('servicos')->row_array();
    }
    
    public function getAtivo($id){
        $this->db->where('servico_habilitado', 1);
        $this->db->where('servico_id', $id);
        return $this->db->get('servicos')->row_array();
    }
    
    public function get_countFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->join('status s', 'servicos.servico_habilitado = s.status_id');
        $this->db->like('status_nome', $filter, 'both');
        $this->db->or_like('servico_nome', $filter, 'both');
        $this->db->or_like('servico_codigo', $filter, 'both');
        
        $a = $this->db->get('servicos')->row_array();
        return $a['pages'];
    }
    
    public function getAllFiltro($filter, $limit, $start){
        $this->db->join('status s', 'servicos.servico_habilitado = s.status_id');
        // $this->db->like('status_nome', $filter, 'both');
        $this->db->or_like('servico_nome', $filter, 'both');
        
        $this->db->order_by('servico_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('servicos');
        return $data->result_array();
    }
    
    
    
    public function retrieveBusca($termo, $start, $stop){
        $this->db->where('servico_habilitado', 1);
        $busca = explode(" ", $termo);
        $this->db->where('servico_nome LIKE', '%'.$busca[0].'%');    
        for($i=1; $i<count($busca); $i++){
            $this->db->or_where('servico_nome LIKE', '%'.$busca[$i].'%');    
        }
        $this->db->limit($stop, $start);
        $this->db->order_by('servico_id', 'DESC');
        $a = $this->db->get('servicos')->result_array();
        return $a;
    }
    
    public function countBusca($termo){
        $busca = explode(" ", $termo);
        $this->db->select("COUNT('servico_id') as count");
        $this->db->where('servico_nome LIKE', '%'.$busca[0].'%');    
        for($i=1; $i<count($busca); $i++){
            $this->db->or_where('servico_nome LIKE', '%'.$busca[$i].'%');    
        }
        $a = $this->db->get('servicos')->row_array();
        return $a;
    }
    
    public function countDepartamento($termo){
        $busca = explode(" ", $termo);
        $this->db->select("COUNT('servico_id') as count");
        $this->db->where('servico_nome LIKE', '%'.$busca[0].'%');    
        for($i=1; $i<count($busca); $i++){
            $this->db->or_where('servico_nome LIKE', '%'.$busca[$i].'%');    
        }
        $a = $this->db->get('servicos')->row_array();
        return $a;
    }
    
    
    public function getAllCad(){
        $this->db->select("servico_id as id, servico_nome as nome");
        $a = $this->db->get('servicos')->result_array();
        return $a;
    }
    
    public function getServicoAdd($id){
        $this->db->select('servico_id, servico_nome, servico_subtitulo, servico_valor,  servico_qtd_parcela, servico_parcelamento');
        $this->db->where('servico_id', $id);
        $data = $this->db->get('servicos')->row_array();
        
        $data['servico_valor'] = number_format($data['servico_valor'],2,',','.');
        
        return $data;
    }
    
    public function termo($id){
        if($id == 1){
            $this->db->select('termos as dado');    
        }else{
            $this->db->select('politica_entrega as dado');
        }
        $a = $this->db->get('site')->row_array();
        return $a['dado'];
    }
    
    public function servicosHistorico(){
        $this->db->where('historico_ativo', 1);
        return $this->db->get("historicoTipos")->result_array();
        
        

    }
    
    public function servicosComentario($id){
        $this->db->select("historico_comentario as mensagem");
        $this->db->where('historico_id', $id);
        $a =  $this->db->get("historicoTipos")->row_array();
        
        return $a['mensagem'];
    }

    public function getEstoqueSite($id){
        $this->db->select("servico_nome");
        $this->db->where('servico_id', $id);
        $a = $this->db->get('servicos')->row_array();

        $this->db->select("sum(estoque_quantidade) as estoque_quantidade, estoque_produto");
        $this->db->where('estoque_produto =', $a['servico_nome']);
        $this->db->group_by("estoque_produto");
        $estoques = $this->db->get('estoque')->row_array();
        
        //$estoques['estoque_quantidade'] = 80;
        
        return $estoques['estoque_quantidade'];    }
    
    
}