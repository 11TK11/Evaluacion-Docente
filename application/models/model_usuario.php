<?php 
	class Model_usuario extends CI_Model
	{
		function validar($us,$pa)
		{
			$this-> db ->from('sin_autenticacion');
			$this-> db ->where('nombre_usuario',$us);
			$this-> db ->where('password',$pa);
			$res=$this-> db ->get();
			return $res;
		}
		function validardocente($cod)
		{
			$this-> db ->from('sin_docente');
			$this-> db ->where('id_docente',$cod);
			$res=$this-> db ->get();
			return $res;
		}
		function validarestudiante($cod)
		{
			$this-> db ->from('sin_estudiante');
			$this-> db ->where('id_usuario',$cod);
			$res=$this-> db ->get();
			return $res;
		}
	}
 ?>