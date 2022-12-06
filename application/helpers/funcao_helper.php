<?php
defined('BASEPATH') or exit('No direct script access allowed');



function dataDiaDb(){
    return date("Y-m-d H:i:s");
}

function dataDb(){
    return date("Y-m-d");;
}
function samoel($text = ""){
    echo "<h3 style='color:red'>SAMOEL MEXENDO</h3>";
    print_r_pre($text);
}

function dataDia($data = NULL){
    if ($data) {

        //Entrada-> 1980/05/10     
        $data = explode("-", $data);

        //Saída - >10/05/1980 
        return $data[2] . '/' . $data[1];
    }
}



function formataDataDb($data = NULL){
    if ($data) {

        //Entrada-> 10/05/1980        
        $data = explode("/", $data);

        //Saída - > 1980/05/10
        return $data[2] . '-' . $data[1] . '-' . $data[0];
    }
}

function formataDataDbView($data = NULL){
    if ($data) {

        //Entrada-> 1980-05-10     
        $data = explode("-", $data);

        //Saída - >10/05/1980 
        return $data[2] . '/' . $data[1] . '/' . $data[0];
    }
}

function datadbDMA($data = NULL){
    if ($data) {

        //Entrada-> 1980-05-10     
        $data = explode("-", $data);

        //Saída - >10/05/1980 
        return $data[0] . '/' . $data[1] . '/' . $data[2];
    }
}

function formatarMoedaReal($valor=NULL, $real=FALSE){
    if ($valor) {

        $valor = ($real == TRUE ? 'R$ ' : ''). number_format($valor, 2, ',', '.');
        return $valor;
    }
}

function formatoDecimal($valor=NULL)
{
    
    $valor = str_replace('.', '', $valor);
    $valor = str_replace(',', '.', $valor);

    return $valor;

}

function slug($string=NULL){
	$string = remove_acentos($string);
	return url_title($string, '-', TRUE);
}

function remove_acentos($string=NULL){
	$procurar    = array('À','Á','Ã','Â','É','Ê','Í','Ó','Õ','Ô','Ú','Ü','Ç','à','á','ã','â','é','ê','í','ó','õ','ô','ú','ü','ç');
	$substituir  = array('a','a','a','a','e','r','i','o','o','o','u','u','c','a','a','a','a','e','e','i','o','o','o','u','u','c');
	return str_replace($procurar, $substituir, $string);
}

function editarend($string=NULL){
	$procurar    = array('-');
	$substituir  = array('¬');
	return str_replace($procurar, $substituir, $string);
}


function limita_caracteres($texto, $limite, $quebra = true) {
    $tamanho = strlen($texto);

    // Verifica se o tamanho do texto é menor ou igual ao limite
    if ($tamanho <= $limite) {
        $novo_texto = $texto;
    // Se o tamanho do texto for maior que o limite
    } else {
        // Verifica a opção de quebrar o texto
        if ($quebra == true) {
            $novo_texto = trim(substr($texto, 0, $limite)).'...';
        // Se não, corta $texto na última palavra antes do limite
        } else {
            // Localiza o útlimo espaço antes de $limite
            $ultimo_espaco = strrpos(substr($texto, 0, $limite), ' ');
            // Corta o $texto até a posição localizada
            $novo_texto = trim(substr($texto, 0, $ultimo_espaco)).'...';
        }
    }

    // Retorna o valor formatado
    return $novo_texto;
}

function datahoraview($rowmensagens) {

    if($rowmensagens) {
        $datamensagem = $rowmensagens;
        $datamensagem = date("d/m/Y", strtotime($datamensagem));
        $horamensagem = date("H:i:s", strtotime($datamensagem));
        
        $arr_msg = explode("/", $datamensagem);
        $diamsg = $arr_msg[0];
        $mesmsg = $arr_msg[1];
        $anomsg = $arr_msg[2];
        
        $arr_hora = explode(":", $horamensagem);
        $hora_msg = $arr_hora[0];
        $minuto_msg = $arr_hora[1];
        
        return $diamsg . '/' . $mesmsg . '/' . $anomsg  . ' ' . $hora_msg . ':' . $minuto_msg;
    }
}

function removerCaracteresEspeciaiss($str){
    $str_saida = "";
    for($i=0; $i<strlen($str); $i++){
        $num_asc = ord($str[$i]);
        if( ($num_asc>=65 && $num_asc<=90) || ($num_asc>=97 && $num_asc<=122) || ($num_asc>=48 && $num_asc<=57)){
            $str_saida .= $str[$i];
        }
    }
    return $str_saida;
}

function mascararNumero($numero, $tipo){
    $mask = "";
    
    if($tipo =="documento"){
        if(strlen($numero) == 11){
            $mask = '###.###.###-##';
        }elseif(strlen($numero) == 14){
            $mask = '##.###.###/####-##';
        }
    }elseif($tipo =="cep"){
        $mask = '#####-###';
    }elseif($tipo =="telefone"){
        if(strlen($numero) == 10){
            $mask = '(##) ####-####';
        }elseif(strlen($numero) == 11){
            $mask = '(##) # ####-####';
        }
    }elseif($tipo =="misto"){
        $mask = '###.###.###';
    }
    $maskared = '';
    $k = 0;
    for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
        if ($mask[$i] == '#') {
            if (isset($numero[$k])) {
                $maskared .= $numero[$k++];
            }
        } else {
            if (isset($mask[$i])) {
                $maskared .= $mask[$i];
            }
        }
    }  
    return $maskared;
}

function Firstlette($word){
    return ucfirst(strtolower($word));
}

function Firstword($word){
    return ucwords(strtolower($word));
}

function print_r_pre($array, $title = NULL){
    echo '<pre>';
        echo $title ? '<h1>'. $title .'</h1>' : '';
        print_r($array);
    echo '</pre>';
}

function var_dump_pre($array, $title = NULL){
    echo '<pre>';
        echo $title ? '<h1>'. $title .'</h1>' : '';
        var_dump($array);
    echo '</pre>';
}
