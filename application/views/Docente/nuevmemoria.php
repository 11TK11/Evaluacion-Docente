<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center"><strong>MEMORIA DOCENTE</strong></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">		
				<h5 class="text-center">UNIVERSIDAD TECNICA DE ORURO</h5>
			</div>
			<div class="col-md-12">
				<h6 class="text-center">FACULTAD NACIONAL DE INGENIERIA</h6>
			</div>
			<div class="col-md-12" style="padding-bottom:100px">
				<h6 class="text-center">INGENIERIA DE SISTEMAS E INGENIERIA INFORMATICA</h6>
			</div>
		</div>
		<div class="row">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12" style="padding-bottom:80px">
						<div class="panel panel-primary">
							<div class="panel-heading">
								IMPORTANTE!
							</div>
							<div class="panel-body">
								<p class="text-justify">
									El presente formulario solo debe crearse al iniciar una gestion
									, para poder añadir actividades correspondientes a la memoria debe seleccionar
									una memoria en su opción AÑADIR ACTIVIDAD, de la cual no se ha concluido su periodo
							 		(getion vigente)
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			
		</div>
		<div class="row">
			<div class="col-md-12">
				<form method="POST" onSubmit="return validarMem();" action="<?php echo base_url().'Docente/guardarmem'?>">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="asignatura">Asignatura: </label>
									<select class="form-control" onChange="cambiomat()" name="txtmat" id="materia">
										<option value="0">Seleccione Materia ...</option>
										<?php
										foreach ($info as $materia)
										{
									
										 	echo "<option value=".$materia->idmat.">".$materia->nombre."</option>";
										}  
										?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="sigla">Sigla: </label>
									<select class="form-control" disabled name="" id="sigla">
										<option value="0">Seleccione Materia ...</option>
										<?php 
											foreach ($info as $materia)
											{
												echo "<option value=".$materia->idmat.">".$materia->sigla."</option>";
											}
										 ?>
									</select>	
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="paralelo">Paralelo: </label>
									<select class="form-control" disabled name="txtpar" id="paralelo">
									
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="" class="pull-left">Docente:</label>
									<input class="form-control" disabled type="text" <?php echo 'value="'.$miinfo->nombres.' '.$miinfo->apellido_paterno.' '.$miinfo->apellido_materno.'"'; ?>>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="gestion">Gestión:</label>
									<input required type="text" id="gestion" name="gestion" class="form-control" placeholder="ej. 2018/2">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="comentarios">Comentarios:</label>
									<textarea class="form-control" name="comentarios" id="comentarios" cols="30" rows="6"></textarea>
								</div>
							</div>
						</div>	
						<div class="row">
							<div class="col-md-6 col-xs-6">
								<button type="submit" class="btn btn-primary btn-lg btn-block">Crear</button>
							</div>
							<div class="col-md-6 col-xs-6">
								<a type="button" class="btn btn-primary btn-lg btn-block" <?php echo 'href='.base_url().'Docente'; ?>>Cancelar</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>