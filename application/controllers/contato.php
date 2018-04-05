<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Contato extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}
	public function index(){
        $data['title'] = 'Number One | Saúde';
		$data['description'] = 'Oportunidade no bairro da Saude';
		$data['keywords'] = 'apartamento saude, studio saude, apartamento pequeno, apartamento com automacao; apto 1 vaga';
		$menu['contato'] = 'active';
		$conteudo['pagina_view'] = 'contato_view';
		
		if($this->input->post('enviar_email') == "enviar"){			
			$nome = $this->input->post('nome');
			$email = $this->input->post('email');
			$telefone = $this->input->post('phone');
			$mensagem = utf8_decode($this->input->post('mss'));
			$assunto = utf8_decode('Contato enviado pelo site www.apartamentonasaude.com.br');
			
			$this->load->library('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			
			$this->email->from("contato@apartamentonasaude.com.br","$nome"); //senha: contato@2017
			$this->email->to('contato@apartamentonasaude.com.br');
			$this->email->cc('vidigal@brbrokerssp.com.br, felipe@spicycomm.com.br, vidigal.delfort@gmail.com, leadsnumberonesaude@gmail.com, paulobaronista@gmail.com');
			$this->email->subject($assunto);
			$this->email->message("<html xmlns='http://www.w3.org/1999/xhtml' dir='ltr' lang='pt-br'>
			<head> <meta http-equiv='content-type' content='text/html;charset=UTF-8' /> </head><body>
				Nome:		{$nome}<br/>
				E-mail:		{$email}<br/>
				Telefone:	{$telefone}<br/>
				Mensagem:	{$mensagem}<br/>
			</body></html>");
			
			if($this->email->send()){				
				redirect('http://apartamentonasaude.com.br/contato/obrigado');
			}else{
				redirect('http://apartamentonasaude.com.br/contato/fail');
			}
			
		}
		
		$this->load->view('html_header', $data);
		$this->load->view('header');
		$this->load->view('menu', $menu);
		$this->load->view('conteudo', $conteudo);
		$this->load->view('rodape');
		$this->load->view('html_footer');
	}

	public function obrigado(){	
		$data['title'] = 'Number One | Saúde';
		$data['description'] = 'Oportunidade no bairro da Saude';
		$data['keywords'] = 'apartamento saude, studio saude, apartamento pequeno, apartamento com automacao; apto 1 vaga';
		$menu['contato'] = 'active';
		$conteudo['pagina_view'] = 'contato_sucesso';
		
		$this->load->view('html_header', $data);
		$this->load->view('header');
		$this->load->view('menu', $menu);
		$this->load->view('conteudo', $conteudo);
		$this->load->view('rodape');
		$this->load->view('html_footer');
	}
	
	public function fail(){	
		$data['title'] = 'Number One | Saúde';
		$data['description'] = 'Oportunidade no bairro da Saude';
		$data['keywords'] = 'apartamento saude, studio saude, apartamento pequeno, apartamento com automacao; apto 1 vaga';
		$menu['contato'] = 'active';
		$conteudo['pagina_view'] = 'contato_insucesso';
		
		$this->load->view('html_header', $data);
		$this->load->view('header');
		$this->load->view('menu', $menu);
		$this->load->view('conteudo', $conteudo);
		$this->load->view('rodape');
		$this->load->view('html_footer');
	}
	
}

/* Location: ./application/controllers/contato.php */