<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
        $data['title'] = 'Number One | Saúde';
		$data['description'] = 'Oportunidade no bairro da Saude';
		$data['keywords'] = 'apartamento saude, studio saude, apartamento pequeno, apartamento com automacao; apto 1 vaga';
		$menu['contato'] = 'active';
		$conteudo['pagina_view'] = 'home_view';
		$this->load->view('html_header', $data);
		$this->load->view('header');
		$this->load->view('menu', $menu);
		$this->load->view('conteudo', $conteudo);
		$this->load->view('rodape');
		$this->load->view('html_footer');
	}
	
}

/* Location: ./application/controllers/home.php */
