<?php 
	class Estudiante extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_estudiante');
			if(!$this->session->userdata('usuario'))
			{
				redirect(base_url().'Usuario');
			}
		}
		public function index()
		{

			$this->load->view('templates/header4');
			$this->load->view('templates/footer');
		}
		
		public function salir()
		{
			$this->session->sess_destroy();
			redirect(base_url().'Usuario');
		}
	}
 ?>