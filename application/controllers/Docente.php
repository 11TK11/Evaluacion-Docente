<?php 
	class Docente extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_docente');
			if(!$this->session->userdata('usuario'))
			{
				redirect(base_url().'Usuario');
			}
		}
		public function index()
		{
			$cod=$this->session->id;
			$datos['info']=$this->model_docente->vermemorias($cod);
			$this->load->view('templates/header');
			$this->load->view('Docente/memoria',$datos);
			$this->load->view('templates/footer');
		}
		public function salir()
		{
			$this->session->sess_destroy();
			redirect(base_url());
		}
		public function descargas()
		{
			$this->load->view('templates/header');
			$this->load->view('Docente/descargas');
			$this->load->view('templates/footer');
		}
		public function nueva()
		{
			//nueva memoria
			$cod=$this->session->id;
			$dato['info']=$this->model_docente->vermaterias($cod);
			$dato['miinfo']=$this->model_docente->misdatos($cod);
			$this->load->view('templates/header');
			$this->load->view('Docente/nuevmemoria',$dato);
			$this->load->view('templates/footer');
		}
		public function paralelos()
		{
			$mat=$this->input->post('id');
			$cod=$this->session->id;
			$info=$this->model_docente->verparalelos($cod,$mat);
			echo json_encode($info);
		}
		public function actividades()
		{
			$cod=$this->input->post('cod');
			$mat=$this->input->post('mat');
			$this->load->view('templates/header');
			$datos['info']=$this->model_docente->veractividades($cod,$mat);
			$datos['info2']=$this->model_docente->vertemas($cod,$mat);
			$datos['info3']=$cod;
			$this->load->view('Docente/actividades',$datos);
			$this->load->view('templates/footer');
		}
		public function guardaract()
		{
			$data['id_pdiaria']=$this->model_docente->idpdiaria()+1;
			$data['id_tema']=$this->input->post('tema');
			$data['id_memoria']=$this->input->post('memoria');
			$data['actividad']=$this->input->post('actividad');
			$data['fecha_realizacion']=$this->input->post('fecha');
			$data['fecha_presentacion']=date("Y-m-d");
			$data['detalle']=$this->input->post('detalle');
			$r=$this->model_docente->guardar_act($data);
			
			redirect(base_url().'Docente/correcto');	
		}
		public function correcto()
		{
			$this->load->view('templates/header');
			$dato['usuario']='Docente';
			$this->load->view('templates/correcto',$dato);
			$this->load->view('templates/footer');
		}
		public function guardarmem()
		{
			$data['id_memoria']=$this->model_docente->idmemoria()+1;
			$data['id_facultad']=1;//fni
			$data['id_materia']=$this->input->post('txtmat');
			$data['id_mat_paralelo']=$this->input->post('txtpar');
			$data['id_docente']=$this->session->id;
			$data['gestion']=$this->input->post('gestion');
			//$data['fecha_entrega']=;
			$data['fecha_inicio']=date("Y-m-d");
			//$data['fecha_fin'];
			$data['comentarios']=$this->input->post('comentarios');
			$r=$this->model_docente->guardar_mem($data);
			redirect(base_url().'Docente/correcto');
		}
		public function finmem()
		{
			$cod=$this->input->post('cod');
			$data['id_memoria']=$cod;
			$data['fecha_fin']=date("Y-m-d");
			$r=$this->model_docente->act_mem($data);
		}
		public function detalle_memoria()
		{
			
			$data['id']=$this->input->post('id');
			$data['ges']=$this->input->post('ges');
			$data['mat']=$this->input->post('mat');
			$data['par']=$this->input->post('par');
			$data['sig']=$this->input->post('sig');
			$data['fei']=$this->input->post('fei');
			$data['fef']=$this->input->post('fef');
			$data['com']=$this->input->post('com');
			$cod=$this->session->id;
			$data['doc']=$this->model_docente->misdatos($cod);
			$data['actividades']=$this->model_docente->veractividadnom($data['id'],$data['mat']);
			$data['matsi']=$this->model_docente->materiassi($data['id']);
			$data['matno']=$this->model_docente->materiasno($data['id']);
			$this->load->view('templates/header');
			$this->load->view('Docente/detallememoria',$data);
			$this->load->view('templates/footer');
		}
	}
 ?>