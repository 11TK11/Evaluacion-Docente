<?php 
	class Administrador extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_administrador');
			if(!$this->session->userdata('usuario'))
			{
				redirect(base_url().'Usuario');
			}
		}
		public function index()
		{
			$this->load->view('templates/header2');
			$data['info']=$this->model_administrador->general();
			$this->load->view('Administrador/historico',$data);
			$this->load->view('templates/footer');
		}
		public function respuestas()
		{
			$this->load->view('templates/header2');
			$data['info']=$this->model_administrador->list_puntaje_act();
			$this->load->view('Administrador/respuestas',$data);
			$this->load->view('templates/footer');
		}
		public function historic()
		{
			$do=$this->input->post('id_docente');
			$pa=$this->input->post('id_paralelo');
			$info=$this->model_administrador->histo($do,$pa);
			echo json_encode($info);
		}
		public function cuestionario()
		{
			$this->load->view('templates/header2');
			$data['info']=$this->model_administrador->cuestionarios();
			$this->load->view('Administrador/cuestionario',$data);
			$this->load->view('templates/footer');
		}
		public function pregs()
		{
			$id=$this->input->post('idcuest');
			$info=$this->model_administrador->pregunt($id);
			echo json_encode($info);
		}
		public function descargas()
		{
			$this->load->view('templates/header2');
			$this->load->view('Administrador/descargas');
			$this->load->view('templates/footer');
		}
		public function salir()
		{
			$this->session->sess_destroy();
			redirect(base_url());
		}
		public function histpreg()
		{
			$do=$this->input->post('id_docente');
			$pa=$this->input->post('id_paralelo');
			$info=$this->model_administrador->histpre($do,$pa);
			echo json_encode($info);
		}
		public function materias()
		{
			$this->load->view('templates/header2');
			$data['info']=$this->model_administrador->vermaterias();
			$this->load->view('Administrador/materias',$data);
		}
		public function gestmat()
		{
			$this->load->view('templates/header2');
			$data['info']=$this->model_administrador->vermaterias2();
			$this->load->view('Administrador/gestmat',$data);
		}
		public function verparalelos()
		{
			$cod=$this->input->post('mat');
			$info=$this->model_administrador->verparalelos($cod);
			echo json_encode($info);
		}
	}
 ?>