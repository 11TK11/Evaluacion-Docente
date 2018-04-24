<?php 
	class Usuario extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_usuario');
		}
		public function index()
		{
			$this->load->view('templates/header3');
			$this->load->view('inicio');
			$this->load->view('templates/footer');
		}
		public function validar()
		{
			$us=$this->input->post('usuario');
			$pa=$this->input->post('contra');
			$pa=md5($pa);
			if($us=="admin" && $pa=="704b037a97fa9b25522b7c014c300f8a")
			{
				//si es admin	
				$dat=array( 'id'=>0,
							'usuario'=>$us);
				$this->session->set_userdata($dat);
				redirect(base_url().'Administrador');
			}
			else
			{
				if($pa=="ac037c61854d527f164f8e9d23df1918")
				{
					//es anonimo
					$dat=array( 'id'=>0,
							'usuario'=>$us);
					$this->session->set_userdata($dat);
					redirect(base_url().'Anonimo');
				}
				else
				{
					$res=$this->model_usuario->validar($us,$pa);
					if($res->num_rows()==1)
					{
						$fila=$res->row();
						$dat=array( 'id'=>$fila->id_usuario,
								'usuario'=>$us);
						$this->session->set_userdata($dat);
						$resu=$this->model_usuario->validardocente($fila->id_usuario);
						if($resu->num_rows()==1)
						{
							redirect(base_url().'Docente');
						}
						else
						{
							$resul=$this->model_usuario->validarestudiante($fila->id_usuario);
							if($resul->num_rows()==1)
							{
								redirect(base_url().'Estudiante');
							}
							else
							{
								redirect(base_url().'Usuario');
							}
						}

					}
					else
					{
						redirect(base_url().'Usuario');
					}
				}
			}
		}
	}
 ?>