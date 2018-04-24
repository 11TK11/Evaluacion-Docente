<?php 
	class Model_administrador extends CI_Model
	{	
		function list_puntaje_act()
		{
			$query=$this-> db ->query('select m.nombre,m.sigla,um.paralelo,u.nombres,u.apellido_paterno,u.apellido_materno,e.id_docente,e.id_mat_paralelo,round(avg(r.valor),1) as prom
										from evd_evaluacion e,evd_respuesta r,uni_docente_completo dc,
										uni_docente_horario dh,sin_usuario u,uni_materia_paralelo um,uni_materias m
										where e.id_evaluacion=r.id_evaluacion and 
										((e.id_docente=dc.id_docente and e.id_docente=u.id_usuario and 
										um.id_mat_paralelo=e.id_mat_paralelo and um.id_materia=m.idmat)
 										or(e.id_docente=dh.id_docente and e.id_docente=u.id_usuario and
 										um.id_mat_paralelo=e.id_mat_paralelo and um.id_materia=m.idmat)) and
										extract(year from now())=extract(year from e.fecha_realizacion)
										group by m.nombre,m.sigla,um.paralelo,u.nombres,u.apellido_paterno,u.apellido_materno,e.id_docente,e.id_mat_paralelo
										order by m.sigla,um.paralelo');
			$res=$query;
			return $res->result();
		}
		function histo($docente,$paralelo)
		{
			$query=$this-> db ->query('select extract(year from e.fecha_realizacion) as fecha,round(avg(r.valor),1) as prom
										from evd_evaluacion e,evd_respuesta r,sin_usuario u,
										uni_materias m,uni_materia_paralelo um
										where e.id_docente='.$docente.' and e.id_mat_paralelo='.$paralelo.' and 
										e.id_evaluacion=r.id_evaluacion and
										e.id_docente=u.id_usuario
										group by extract(year from e.fecha_realizacion),u.nombres,
										u.apellido_paterno,u.apellido_materno');
			$res=$query;
			return $res->result();
		}
		function general()
		{
			$query=$this-> db ->query('select distinct m.nombre,m.sigla,um.id_mat_paralelo,um.paralelo,u.id_usuario,u.nombres,
										u.apellido_paterno,u.apellido_materno
										from uni_materias m,uni_materia_paralelo um,
										uni_docente_completo dc,uni_docente_horario dh,
										sin_usuario u
										where m.idmat=um.id_materia and (
										(um.id_mat_paralelo=dc.id_mat_paralelo and u.id_usuario=dc.id_docente) 
										or (um.id_mat_paralelo=dh.id_mat_paralelo and u.id_usuario=dh.id_docente))
									');
			$res=$query;
			return $res->result();
		}
		function cuestionarios()
		{
			$query=$this-> db ->query('select *
										from evd_cuestionario
										');
			$res=$query;
			return $res->result();
		}
		function pregunt($id)
		{
			$query=$this-> db ->query('select p.* 
										from evd_pregunta p,evd_categoria c,evd_cuestionario cu
										where p.id_categoria=c.id_categoria and c.id_cuestionario=cu.id_cuestionario
										and cu.id_cuestionario='.$id);
			$res=$query;
			return $res->result();
		}
		function histpre($do,$pa)
		{
			$query=$this-> db ->query('select extract(year from e.fecha_realizacion) as fecha,p.detalle,round(avg(r.valor),1) as prom
										from evd_evaluacion e,evd_pregunta p,evd_respuesta r
										where e.id_docente='.$do.' and e.id_mat_paralelo='.$pa.' and p.id_pregunta=r.id_pregunta and
										r.id_evaluacion=e.id_evaluacion
										group by extract(year from e.fecha_realizacion),p.detalle
										order by extract(year from e.fecha_realizacion) desc');
			$res=$query;
			return $res->result();
		}
		function vermaterias()
		{
			$query=$this-> db ->query('select *
										from uni_materias
										where estado=1
										order by sigla,nombre');
			$res=$query;
			return $res->result();
		}
		function vermaterias2()
		{
			$query=$this-> db ->query('select *
										from uni_materias
										order by sigla,nombre');
			$res=$query;
			return $res->result();
		}
		function verparalelos($mat)
		{
			$query=$this-> db ->query('select distinct mp.paralelo,u.apellido_paterno,u.apellido_materno,u.nombres
										from uni_materia_paralelo mp,uni_docente_horario dh,uni_docente_completo dc,sin_usuario u
										where mp.id_materia='.$mat.' and ((dh.id_mat_paralelo=mp.id_mat_paralelo and u.id_usuario=dh.id_docente) or (dc.id_mat_paralelo=mp.id_mat_paralelo and u.id_usuario=dc.id_docente))
										order by mp.paralelo');
			$res=$query;
			return $res->result();
		}
	}
 ?>