<?php 
	class Model_estudiante extends CI_Model
	{
		function inforesol()
		{
			$query=$this-> db ->query('select resolucion 
				from evd_cuestionario where id_cuestionario=(select max(id_cuestionario) 
																from evd_cuestionario)');
			$res=$query->row();
			return $res->resolucion;
		}
		function infofecha()
		{
			$query=$this-> db ->query('select fecha_aprobacion 
										from evd_cuestionario 
										where id_cuestionario=(select max(id_cuestionario) 
																from evd_cuestionario)');
			$res=$query->row();
			return $res->fecha_aprobacion;
		}
		function infoasigna()
		{
			$query=$this-> db ->query("select * 
										from uni_materias 
										where estado=1 and (sigla like 'SIS%' or sigla like 'INF%') 
										order by sigla");
			$res=$query;
			return $res->result();
		}
		function infoparal($materia)
		{
			
			$query=$this-> db ->query('select * 
										from uni_materia_paralelo
										where id_materia='.$materia);
			$res=$query;
			return $res->result();
		}
		function infodocente($idpar)
		{
			$query=$this-> db ->query('select distinct u.* 
										from sin_usuario u,sin_docente d, uni_docente_completo dc,uni_docente_horario dh
								where u.id_usuario=d.id_docente and ((d.id_docente=dc.id_docente and dc.id_mat_paralelo='.$idpar.')
								or (d.id_docente=dh.id_docente and dh.id_mat_paralelo='.$idpar.'))');
			$res=$query;
			return $res->result();
		}
		function infomencion()
		{
			$query=$this-> db ->query("select m.* 
										from uni_mencion m,uni_plan p,uni_carrera c 
										where c.id_carrera=7 and c.id_carrera=p.id_carrera and p.id_plan=m.id_plan");
			$res=$query;
			return $res->result();
		}
		function infopreguntas()
		{
			$query=$this-> db ->query("select p.* 
										from evd_pregunta p,evd_cuestionario c,evd_categoria cat 
										where p.id_categoria=cat.id_categoria and cat.id_cuestionario=c.id_cuestionario and c.id_cuestionario=(select max(id_cuestionario) 
																																				from evd_cuestionario)");
			$res=$query;
			return $res->result(); 
		}
		function idevaluacion()
		{
			$query=$this-> db ->query("select count(id_evaluacion) as num
										from evd_evaluacion");
			$res=$query->row();
			return $res->num;
		}
		function idcuestionario()
		{
			$query=$this-> db ->query("select count(id_cuestionario) as num
										from evd_cuestionario");
			$res=$query->row();
			return $res->num;
		}
		function agregar($data)
		{
			$dt['id_evaluacion']=$data['id_evaluacion'];
			$dt['fecha_realizacion']=$data['fecha_realizacion'];
			$dt['id_mencion']=$data['id_mencion'];
			$dt['id_carrera']=$data['id_carrera'];
			$dt['id_facultad']=$data['id_facultad'];
			$dt['id_docente']=$data['id_docente'];
			$dt['id_mat']=$data['id_mat'];
			$dt['id_mat_paralelo']=$data['id_mat_paralelo'];
			$dt['id_cuestionario']=$data['id_cuestionario'];
			$this-> db ->insert('evd_evaluacion',$dt);
		}
		function cantpreg($idcuest)
		{
			$query=$this-> db ->query('select count(p.id_pregunta) as num
										from evd_pregunta p,evd_categoria c,evd_cuestionario cu
										where p.id_categoria=c.id_categoria and c.id_cuestionario=cu.id_cuestionario and 
										cu.id_cuestionario='.$idcuest);
			$res=$query->row();
			return $res->num;
		}
		function idrespuesta()
		{
			$query=$this-> db ->query("select count(id_respuesta) as num
										from evd_respuesta");
			$res=$query->row();
			return $res->num;
		}
		function agreg_resp($dato)
		{
			$this-> db ->insert('evd_respuesta',$dato);
		}
	}
 ?>