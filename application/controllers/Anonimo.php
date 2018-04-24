<?php 
	class Anonimo extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_anonimo');
			if(!$this->session->userdata('usuario'))
			{
				redirect(base_url().'Usuario');
			}
		}
		public function index()
		{

			$this->load->view('templates/header3');
			$this->load->view('Anonimo/inicuest');
			$this->load->view('templates/footer');
		}
		public function encuesta()
		{
			$this->load->view('templates/header3');
			$data=[];
			$data['resolucion']=$this->model_anonimo->inforesol();
			$data['fecha']=$this->model_anonimo->infofecha();
			$data['asignaturas']=$this->model_anonimo->infoasigna();
			$data['menciones']=$this->model_anonimo->infomencion();
			$data['preguntas']=$this->model_anonimo->infopreguntas();
			$this->load->view('Anonimo/cuestionario',$data);
			$this->load->view('templates/footer');
		}
		public function paralelos()
		{
			$materia=$this->input->post('id');
			$info=$this->model_anonimo->infoparal($materia);
			echo json_encode($info);
		}
		public function docentes()
		{
			$paralelo=$this->input->post('id_mat_paralelo');
			$info=$this->model_anonimo->infodocente($paralelo);
			echo json_encode($info);
		}
		public function enviar()
		{
			$data['id_evaluacion']=$this->model_anonimo->idevaluacion();
			$data['fecha_realizacion']=date("Y-m-d");
			$data['id_mencion']=$this->input->post('txtmen');
			$data['id_carrera']=$this->input->post('txtcarr');
			$data['id_facultad']=$this->input->post('txtfac');
			$data['id_docente']=$this->input->post('txtdoc');
			$data['id_mat']=$this->input->post('txtmat');
			$data['id_mat_paralelo']=$this->input->post('txtpar');
			$data['id_cuestionario']=$this->model_anonimo->idcuestionario();
			
			$r=$this->model_anonimo->agregar($data);
			
			$cpreg=$this->model_anonimo->cantpreg($data['id_cuestionario']);
			for ($i=1; $i <= $cpreg; $i++)
			{ 
				$dato['id_respuesta']=$this->model_anonimo->idrespuesta()+1;
				$dato['valor']=$this->input->post('id'.$i);
				$dato['id_pregunta']=$this->input->post($i);
				$dato['id_evaluacion']=$data['id_evaluacion'];
				$this->model_anonimo->agreg_resp($dato);
			}	

			redirect(base_url().'Anonimo/finalizar_cuest');
		}
		public function finalizar_cuest()
		{
			$this->load->view('templates/header3');
			$this->load->view('Anonimo/fincuest');
			$this->load->view('templates/footer');
		}
		public function salir()
		{
			$this->session->sess_destroy();
			redirect(base_url().'Usuario');
		}
	}
 ?>