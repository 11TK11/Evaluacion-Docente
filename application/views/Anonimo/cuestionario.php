<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center">UNIVERSIDAD TECNICA DE ORURO <br><small>VICERRECTORADO</small></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">REGLAMENTO DE EVALUACION DOCENTE 
					<br><small><h5>Opinión Estudiantil</h5></small>
					<br><small><h6>Resolución H.C.U. Nº <?php echo $resolucion;?></h6></small>
					<br><small><h6>Del <?php echo $fecha; ?></h6></small>
				</h3>
			</div>
		</div>
		<div class="row">
			<form method="POST" onSubmit="return validar();" action="<?php echo base_url().'Anonimo/enviar'?>">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="asignatura">Asignatura: </label>
								<select class="form-control" onChange="onSelectChange()" name="txtmat" id="materia">
									<?php
									foreach ($asignaturas as $materia)
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
									<?php
									foreach ($asignaturas as $materia)
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
								<select class="form-control" disabled name="txtpar" onChange="cambparal()" id="paralelo">
									
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="docente">Nombre Docente: </label>
								<select class="form-control" name="txtdoc" id="docente">
									
								</select>	
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="facultad">Facultad: </label>
								<select class="form-control" name="txtfac" id="facultad">
									<?php echo "<option value=1>"."Facultad Nacional de Ingeniería"."</option>"; ?>
								</select>	
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="carrera">Carrera: </label>
								<select class="form-control" name="txtcarr" id="carrera">
									<?php echo "<option value=7>"."Ingeniería de Sistemas e Informática"."</option>"; ?>
								</select>	
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label for="mencion">Mencion: </label>
								<select class="form-control" name="txtmen" id="mencion">
									<?php 
										foreach ($menciones as $mencion)
										{
											echo "<option value=".$mencion->id_mencion.">".$mencion->nombre."</option>"; 
										}
									?>
								</select>	
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							
								<table>

									<?php 
										$i=1;
										foreach ($preguntas as $pregunta)
										{
											echo "<p>".$pregunta->detalle."</p>";
									?>
									<input type="text" hidden <?php echo "name=".$i." id=".$i." value=".$pregunta->id_pregunta; ?>>
									<div class="row">
										<div class="col-md-2 col-xs-1"></div>
										<div class="col-md-3 col-xs-2">
											<p>Estoy de acuerdo</p>
										</div>
										<div class="col-md-4 col-xs-6">
											<div class="" data-toggle="buttons">
												<label  <?php echo "onClick=paso(".$i.",5)";?> class="btn btn-lg color-verde radio-inline" for=""><span class="glyphicon glyphicon-record"></span><input type="radio" <?php echo "id=".$i; ?> ></label>
												<label  <?php echo "onClick=paso(".$i.",4)";?> class="btn btn-md color-verde radio-inline" for=""><span class="glyphicon glyphicon-record"></span><input type="radio" <?php echo "id=".$i; ?> ></label>
												<label  <?php echo "onClick=paso(".$i.",3)";?> class="btn btn-sm color-gris radio-inline" for=""><span class="glyphicon glyphicon-record"></span><input type="radio" <?php echo "id=".$i; ?> ></label>
												<label  <?php echo "onClick=paso(".$i.",2)";?> class="btn btn-md color-morado radio-inline" for=""><span class="glyphicon glyphicon-record"></span><input type="radio" <?php echo "id=".$i; ?> ></label>
												<label  <?php echo "onClick=paso(".$i.",1)";?> class="btn btn-lg color-morado radio-inline" for=""><span class="glyphicon glyphicon-record"></span><input type="radio" <?php echo "id=".$i; ?> ></label>
											</div>
										</div>
										<div class="col-md-3 col-xs-2">
											<p>No estoy de acuerdo <input  <?php echo "id=id".$i." name=id".$i; ?> value="1" hidden type="text"></p>
										</div>
									</div>
									<br><br>
									<?php
										$i=$i+1;}
									 ?>
								</table>
								<button class="btn btn-primary btn-lg" type="submit">Terminar Cuestionario</button>
						</div>
					</div>
				</div>		
			</form>
		</div>
	</div>
</body>