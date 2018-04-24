<?php 
	class Model_docente extends CI_Model
	{
		function vermemorias($cod)
		{
			$query=$this-> db ->query('select m.id_memoria,ma.idmat,ma.nombre,ma.sigla,p.paralelo,m.gestion,m.fecha_inicio,m.fecha_fin,m.comentarios
										from evd_memoria m,uni_materias ma,uni_materia_paralelo p
										where m.id_materia=ma.idmat and m.id_mat_paralelo=p.id_mat_paralelo and m.id_docente='.$cod.'
										order by m.id_memoria desc');
			$res=$query->result();
			return $res;
		}
		function vermaterias($cod)
		{
			$query=$this-> db ->query('select distinct m.idmat,m.nombre,m.sigla
										from uni_materias m,uni_materia_paralelo p,uni_docente_completo dc,uni_docente_horario dh 
										where m.idmat=p.id_materia and ((p.id_mat_paralelo=dc.id_mat_paralelo and dc.id_docente='.$cod.') or (p.id_mat_paralelo=dh.id_mat_paralelo and dh.id_docente='.$cod.'))');
			$res=$query->result();
			return $res;
		}
		function verparalelos($doc,$mat)
		{
			$query=$this-> db ->query('select distinct p.id_mat_paralelo,p.paralelo
										from uni_materia_paralelo p,uni_docente_horario dh,uni_docente_completo dc
										where p.id_materia='.$mat.' and ((dc.id_docente='.$doc.' and dc.id_mat_paralelo=p.id_mat_paralelo) or (dh.id_docente='.$doc.' and dh.id_mat_paralelo=p.id_mat_paralelo))');
			$res=$query->result();
			return $res;
		}
		function misdatos($cod)
		{
			$query=$this-> db ->query('select *
										from sin_usuario
										where id_usuario='.$cod);
			$res=$query->row();
			return $res;
		}
		function veractividades($cod,$mat)
		{
			$query=$this-> db ->query('select d.*,t.titulo
										from evd_pdiaria d, uni_tema t
										where d.id_memoria='.$cod.' and t.id_tema=d.id_tema and t.id_materia='.$mat.'
										order by d.id_memoria,d.id_pdiaria');
			$res=$query->result();
			return $res;
		}
		function veractividadnom($cod,$mat)
		{
			$query=$this-> db ->query("select d.*,t.titulo
										from evd_pdiaria d, uni_tema t,uni_materias m
										where d.id_memoria=".$cod." and t.id_tema=d.id_tema and m.idmat=t.id_materia and m.nombre='".$mat."'
										order by d.id_memoria,d.id_pdiaria");
			$res=$query->result();
			return $res;
		}
		function vertemas($cod,$mat)
		{
			$query=$this-> db ->query('select id_tema,titulo
										from uni_tema t
										where id_materia='.$mat.'
										order by id_tema');
			$res=$query->result();
			return $res;
		}
		function idpdiaria()
		{
			$query=$this-> db ->query('select max(id_pdiaria) as num
										from evd_pdiaria');
			$res=$query->row();
			return $res->num;
		}
		function guardar_act($data)
		{
			$this-> db ->insert('evd_pdiaria',$data);
		}
		function idmemoria()
		{
			$query=$this-> db ->query('select max(id_memoria) as num
										from evd_memoria');
			$res=$query->row();
			return $res->num;
		}
		function guardar_mem($data)
		{
			$this-> db ->insert('evd_memoria',$data);
		}
		function act_mem($data)
		{
			$id=$data['id_memoria'];
			$d['fecha_fin']=$data['fecha_fin'];
			$this-> db ->where('id_memoria',$id);
			$this-> db ->update('evd_memoria',$d);
		}
		function materiassi($cod)
		{
			$query=$this-> db ->query('select distinct t.id_tema,t.titulo
										from evd_pdiaria d, uni_tema t
										where d.id_tema=t.id_tema and d.id_memoria='.$cod.'
										order by t.id_tema');
			$res=$query->result();
			return $res;
		}
		function materiasno($cod)
		{
			$query=$this-> db ->query('select distinct t.id_tema,t.titulo
										from evd_pdiaria d,uni_tema t,evd_memoria me
										where me.id_memoria='.$cod.' and me.id_materia=t.id_materia and t.id_tema not in(select distinct t.id_tema
										from evd_pdiaria d, uni_tema t
										where d.id_tema=t.id_tema and d.id_memoria='.$cod.'
										order by t.id_tema)
										order by t.id_tema');
			$res=$query->result();
			return $res;
		}
	}
 ?>