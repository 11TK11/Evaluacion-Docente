function onSelectChange()
{
	var x=document.getElementById("materia").value;	
	document.getElementById("sigla").value = x;
	var valor={"id":x};
	$.ajax({
		data:valor,
		url:'paralelos',
		type:'post',
		dataType:'json',
		success:function(resp)
		{
			$('select#paralelo').find('option').remove();

			$.each(resp,function(index,data){
					$('select#paralelo').attr('disabled',false).append('<option value="'+data['id_mat_paralelo']+'">'+data['paralelo']+'</option>');
		
			});
		},
		error:function(resp)
		{
			console.log("Algo salio mal");
		}
	});	
}
function cambparal()
{
	var x=document.getElementById("paralelo").value;
	var param={"id_mat_paralelo":x};
	$.ajax({
		data:param,
		url:'docentes',
		type:'post',
		dataType:'json',
		success:function(resp)
		{
			$('select#docente').find('option').remove();
			$.each(resp,function(index,data){
				$('select#docente').append('<option value="'+data['id_usuario']+'">'+data['apellido_paterno']+' '+data['apellido_materno']+' '+data['nombres']+'</option>');
			});
		},
		error:function(resp)
		{
			console.log("Algo salio mal");
		}
	});
}
function cambio(de,hacia)
{
	var x=document.getElementById(de).value;
	document.getElementById(hacia).value=x;
}
function paso(n,val)
{
	document.getElementById("id"+n).value=val;
}
function validar()
{
	if(!confirm('Esta seguro de terminar la encuesta?'))
	{
		return false;
	}
	else
	{
		var p=0,d=0;
		p=document.getElementById("paralelo").value;
		d=document.getElementById("docente").value;
		if(p!=0 && d!=0)
			return true;
		else
		{
			alert('No puede dejar campos sin llenar');
			return false;
		}
	}
}
function hist(id,d,p)
{
	var param={"id_docente":d,"id_paralelo":p};
	$.ajax({
		data:param,
		url:'historic',
		type:'post',
		dataType:'json',
		success:function(resp)
		{
			$('tbody#cuerpo').find('tr').remove();	
			$.each(resp,function(index,data)
				{
					$('tbody#cuerpo').append('<tr><td>'+data['fecha']+'</td><td>'+data['prom']+'</td></tr>');
				});
		}
	});
}
function hist1(id,d,p)
{
	var param={"id_docente":d,"id_paralelo":p};
	$.ajax({
		data:param,
		url:'Administrador/historic',
		type:'post',
		dataType:'json',
		success:function(resp)
		{
			$('tbody#cuerpo').find('tr').remove();	
			$.each(resp,function(index,data)
				{
					$('tbody#cuerpo').append('<tr><td>'+data['fecha']+'</td><td>'+data['prom']+'</td></tr>');
				});
		}
	});
}
function histpregs(d,p)
{
	var param={"id_docente":d,"id_paralelo":p};
	$.ajax({
		data:param,
		url:'Administrador/histpreg',
		type:'post',
		dataType:'json',
		success:function(resp)
		{
			$('tbody#cuerp').find('tr').remove();	
			$.each(resp,function(index,data)
				{
					$('tbody#cuerp').append('<tr><td>'+data['fecha']+'</td><td>'+data['detalle']+'</td><td>'+data['prom']+'</td></tr>');
				});
		}
	});
}
function preg(c)
{
	var param={"idcuest":c};
	$.ajax({
		data:param,
		url:'pregs',
		type:'post',
		dataType:'json',
		success:function(resp)
		{
			$('tbody#cuerpo').find('tr').remove();	
			$.each(resp,function(index,data)
				{
					$('tbody#cuerpo').append('<tr><td>'+index+'</td><td>'+data['detalle']+' </td></tr>');
				});
		}
	});
}
function anonim()
{
	document.getElementById("usuario").value="anonimo";
	document.getElementById("contra").value="anonimo";
}
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
function cambiomat()
{
	var x=document.getElementById("materia").value;	
	document.getElementById("sigla").value = x;
	var valor={"id":x};
	$.ajax({
		data:valor,
		url:'paralelos',
		type:'post',
		dataType:'json',
		success:function(resp)
		{
			$('select#paralelo').find('option').remove();

			$.each(resp,function(index,data){
					$('select#paralelo').attr('disabled',false).append('<option value="'+data['id_mat_paralelo']+'">'+data['paralelo']+'</option>');
		
			});
		},
		error:function(resp)
		{
			console.log("Algo salio mal");
		}
	});	
}
function validarAct()
{
	if(!confirm('Esta seguro de almacenar la actividad?, no podra modificar ni elimiar la actividad una vez almacenada'))
	{
		return false;
	}
	else
	{
		var t,a;
		t=document.getElementById('tema').value;
		a=document.getElementById('actividad').value;
		if(t!=0 && a!=0)
		{
			return true;
		}
		else
		{
			alert('No deje campos sin llenar y/o seleccionar');
			return false;
		}
	}
}
function validarMem()
{
	if(!confirm('Esta seguro de almacenar la memoria?, no podra modificar ni elimiar la memoria una vez almacenada'))
	{
		return false;
	}
	else
	{
		var t,a;
		m=document.getElementById('txtmat').value;
		p=document.getElementById('txtpar').value;
		if(m!=0 && p!=0)
		{
			return true;
		}
		else
		{
			alert('No deje campos sin llenar y/o seleccionar');
			return false;
		}
	}
}
function finalmem(cod)
{
	if(confirm('Esta seguro de finalizar la memoria?, no podra modificar de ninguna manera'))
	{
		var valor={"cod":cod};
		$.ajax({
			data:valor,
			url:'Docente/finmem',
			type:'post',
			dataType:'json',
			error:function()
			{
				location.reload();
			}
		});		
	}
}
function paral(mat)
{
	var valor={"mat":mat};
	$.ajax({
		data:valor,
		url:'verparalelos',
		type:'post',
		dataType:'json',
		success:function(resp)
		{
			$('tbody#cuerpo').find('tr').remove();	
			$.each(resp,function(index,data)
				{
					$('tbody#cuerpo').append('<tr><td>'+data['paralelo']+' </td><td>'+data['apellido_paterno']+'</td><td>'+data['apellido_materno']+'</td><td>'+data['nombres']+'</td></tr>');
				});
		}
	});
}


