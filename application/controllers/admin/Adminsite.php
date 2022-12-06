<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminsite extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model('configs');
        $this->load->model('perguntas');
    }

    public function site()
    {

        if ($this->session->userdata('msg')) {
            $data['msg'] = $this->session->userdata('msg');
            $this->session->unset_userdata('msg');
        }

        $data['site']       = $this->configs->getSite();
        $data['perguntas']  = $this->perguntas->getAll();

        $this->header(6);
        $this->load->view('restrito/site', $data);
        $this->footer();
    }


    public function atualizarSite()
    {


        $site = array(
            'logo'                  => '/imagens/site/logo.png',
            'logo2'                 => '/imagens/site/logo2.png',
            'email'                 => $this->input->post('email'),
            'whats'                 => $this->limpa($this->input->post('whats')),
            'telefone'              => $this->limpa($this->input->post('telefone')),
            'facebook'              => $this->input->post('facebook'),
            'instagram'             => $this->input->post('instagram'),
            'twitter'               => $this->input->post('twitter'),
            'termos'                => $this->input->post('termos'),
            'endereco'              => $this->input->post('endereco'),
            'nome_empresa'          => $this->input->post('nome_empresa'),
            'cnpj'                  => $this->limpa($this->input->post('cnpj')),
            'sobre_loja'            => $this->input->post('desc'),
            'politica_entrega'      => $this->input->post('desc2'),
            'politica_privacidade'  => $this->input->post('desc3'),
            'termos'                => $this->input->post('desc4'),
            'banner_principal1'     => '/imagens/site/banner_principal1.png',
            'banner_principal2'     => '/imagens/site/banner_principal2.png',
            'banner_principal3'     => '/imagens/site/banner_principal3.png',
            'parallax'              => '/imagens/site/parallax.png',
            'banner_contato'        => '/imagens/site/banner_contato.png',
            'imagem1'               => '/imagens/site/imagem1.png',
            'imagem2'               => '/imagens/site/imagem2.png',
            'imagem3'               => '/imagens/site/imagem3.png',
            'img_full2'             => '/imagens/site/img_full2.png',
            'img_full1'             => '/imagens/site/img_full1.png',
            'text_banner1'          => $this->input->post('text_banner1'),
            'text_banner2'          => $this->input->post('text_banner2'),
            'text_banner3'          => $this->input->post('text_banner3'),
            'btn_banner1'           => $this->input->post('btn_banner1'),
            'btn_banner2'           => $this->input->post('btn_banner2'),
            'btn_banner3'           => $this->input->post('btn_banner3'),

            'loja_text'           => $this->input->post('loja_text'),
            'midia_text'           => $this->input->post('midia_text'),
            'loja_imagem_principal'             => '/imagens/site/loja_imagem_principal.png',
            'loja_imagem_secundaria1'             => '/imagens/site/loja_imagem_secundaria1.png',
            'loja_imagem_secundaria2'             => '/imagens/site/loja_imagem_secundaria2.png',
            'loja_imagem_secundaria3'             => '/imagens/site/loja_imagem_secundaria3.png',
            'loja_imagem_secundaria4'             => '/imagens/site/loja_imagem_secundaria4.png',
            'midia_video' => '/videos/midia_video.mp4',
            'midia_imagem1'             => '/imagens/site/midia_imagem1.png',
            'midia_imagem2'             => '/imagens/site/midia_imagem2.png',
            'midia_imagem3'             => '/imagens/site/midia_imagem3.png',
            'midia_imagem4'             => '/imagens/site/midia_imagem4.png',
        );

        if (!empty($_FILES['banner_principal1']['name'])) {
            $this->uploadGui('banner_principal1', 'banner_principal1.png');
        }

        if (!empty($_FILES['banner_principal2']['name'])) {
            $this->uploadGui('banner_principal2', 'banner_principal2.png');
        }

        if (!empty($_FILES['banner_principal3']['name'])) {
            $this->uploadGui('banner_principal3', 'banner_principal3.png');
        }

        if (!empty($_FILES['banner_contato']['name'])) {
            $this->uploadGui('banner_contato', 'banner_contato.png');
        }

        if (!empty($_FILES['img_banner1']['name'])) {
            $this->uploadGui('img_banner1', 'img_banner1.png');
        }

        if (!empty($_FILES['img_banner2']['name'])) {
            $this->uploadGui('img_banner2', 'img_banner2.png');
        }

        if (!empty($_FILES['img_banner3']['name'])) {
            $this->uploadGui('img_banner3', 'img_banner3.png');
        }

        if (!empty($_FILES['img_full1']['name'])) {
            $this->uploadGui('img_full1', 'img_full1.png');
        }

        if (!empty($_FILES['img_full2']['name'])) {
            $this->uploadGui('img_full2', 'img_full2.png');
        }

        if (!empty($_FILES['parallax']['name'])) {
            $this->uploadGui('parallax', 'parallax.png');
        }

        if (!empty($_FILES['imagem1']['name'])) {
            $this->uploadGui('imagem1', 'imagem1.png');
        }

        if (!empty($_FILES['imagem2']['name'])) {
            $this->uploadGui('imagem2', 'imagem2.png');
        }

        if (!empty($_FILES['imagem3']['name'])) {
            $this->uploadGui('imagem3', 'imagem3.png');
        }

        if (!empty($_FILES['logo']['name'])) {
            $this->uploadGui('logo', 'logo.png');
        }

        if (!empty($_FILES['logo2']['name'])) {
            $this->uploadGui('logo2', 'logo2.png');
        }

        if (!empty($_FILES['ebook']['name'])) {
            $this->uploadGui('ebook', 'ebook.pdf');
        }

        if (!empty($_FILES['loja_imagem_principal']['name'])) {
            $this->uploadGui('loja_imagem_principal', 'loja_imagem_principal.png');
        }

        if (!empty($_FILES['loja_imagem_secundaria1']['name'])) {
            $this->uploadGui('loja_imagem_secundaria1', 'loja_imagem_secundaria1.png');
        }

        if (!empty($_FILES['loja_imagem_secundaria2']['name'])) {
            $this->uploadGui('loja_imagem_secundaria2', 'loja_imagem_secundaria2.png');
        }

        if (!empty($_FILES['loja_imagem_secundaria3']['name'])) {
            $this->uploadGui('loja_imagem_secundaria3', 'loja_imagem_secundaria3.png');
        }

        if (!empty($_FILES['loja_imagem_secundaria4']['name'])) {
            $this->uploadGui('loja_imagem_secundaria4', 'loja_imagem_secundaria4.png');
        }

        if (!empty($_FILES['midia_imagem1']['name'])) {
            $this->uploadGui('midia_imagem1', 'midia_imagem1.png');
        }

        if (!empty($_FILES['midia_imagem2']['name'])) {
            $this->uploadGui('midia_imagem2', 'midia_imagem2.png');
        }

        if (!empty($_FILES['midia_imagem3']['name'])) {
            $this->uploadGui('midia_imagem3', 'midia_imagem3.png');
        }

        if (!empty($_FILES['midia_imagem4']['name'])) {
            $this->uploadGui('midia_imagem4', 'midia_imagem4.png');
        }

        if (!empty($_FILES['midia_video']['name'])) {
            $this->uploadGui('midia_video', 'midia_video.png');
        }

        for ($i = 0; $i < $_POST['qtdPerg']; $i++) {
            $perguntas[$i] = array(
                'pergunta_id'           => $i + 1,
                'pergunta_titulo'       => $_POST['pergunta_titulo_' . $i],
                'pergunta_resposta'     => $_POST['pergunta_resposta_' . $i],
            );
        }

        $this->perguntas->updatePergunta($perguntas);
        $this->configs->updateSite($site);


        $this->session->set_userdata('msg', 1);

        redirect(base_url('af8889282b50f9030f8cc7a19b3f706d'), 'refresh');
    }

    public function uploadGui($file, $nome)
    {
        $config['upload_path']      = './imagens/site/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 2000000;
        $config['overwrite']        = TRUE;
        $config['file_name']        = $nome;

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        $this->upload->do_upload($file);
    }

    public function uploadGuiVideo($file, $nome)
    {
        $config['upload_path']          = './videos/';
        $config['allowed_types']        = 'mp4|avi|mov|mp3|webm|3gp|mkv';
        $config['overwrite']            = TRUE;
        $config['remove_spaces']        = true;
        $config['file_name']            = $nome;

        $this->load->library('upload');

        $this->upload->initialize($config);

        $this->upload->do_upload($file);
    }

    function newPerguntaLista()
    {

        $aux = $_POST['row'] + 1;
        $html = "";
        $html .=   "<br><div class='row'id='perguntaFrequente" . $aux . "'>
                    <div class='col-md-2' style='text-align:-webkit-center;'>
                    <button id='buttonPergunta" . $aux . "' type='button' class='btn btn-success' onclick='novaPergunta(" . $aux . ")'>
                    <i class='fa fa-plus' aria-hidden='true'></i>
                    </button>
                    </div>
                    <div class='col-md-10'>
                    <div class='row' >
                    <div class='col-md-12'>
                    <div>
                    <label style='color: #4da751;'>Campo:</label><br>
                    <input placeholder='Pergunta' type='text' class='form-control' name='pergunta_titulo_" . $aux . "' id='pergunta_titulo_" . $aux . "'>
                    </div>
                    <div style='margin-top: 2%;'>
                    <input placeholder='Resposta' type='text' class='form-control' name='pergunta_resposta_" . $aux . "' id='pergunta_resposta_" . $aux . "'>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>";
        echo json_encode($html);
    }
}
