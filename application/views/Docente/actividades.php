<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">ACTIVIDADES REALIZADAS EN LA GESTION</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12  table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<td><strong>#</strong></td>
							<td><strong>TEMA</strong></td>
							<td><strong>ACTIVIDAD</strong></td>
							<td><strong>DETALLE</strong></td>
							<td><strong>FECHA</strong></td>
						</tr>
					</thead>
					<tbody>
						<?php
						$cont=1;
						$acti="";
						foreach ($info as $dato)
						 {
						 	switch ($dato->actividad)
						 	{
						 		case 1:
						 			$acti="Avace de Tema";
						 			break;
						 		case 2:
						 			$acti="Investigación o Práctica";
						 			break;
						 		case 3:
						 			$acti="Interacción Social";
						 			break;
						 		case 4:
						 			$acti="Examen";
						 			break;
						 		default:
						 			$acti="Otra";
						 			break;
						 	}
							echo '<tr><td>'.$cont.'</td><td>'.$dato->titulo.'</td><td>'.$acti.'</td><td>'.$dato->detalle.'</td><td>'.$dato->fecha_realizacion.'</td></tr>';
						 	$cont=$cont+1;
						 }
						 ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row" style="padding-top:50px">
			<div class="col-md-12">
				<h2 class="text-center">NUEVA ACTIVIDAD</h2>
			</div>
		</div>
		<form method="POST" onSubmit="return validarAct();" action="<?php echo base_url().'Docente/guardaract'?>">
			<div class="row">
				<div class="col-md-6 col-xs-8">
					<div class="form-group">
						<label for="tema">Tema:</label>
						<select required class="form-control" name="tema" id="tema">
							<option value="0">Seleccione el Tema...</option>
							<?php 
								foreach ($info2 as $dato)
								{
									echo '<option value='.$dato->id_tema.'>'.$dato->titulo.'</option>';
								}
							 ?>
						</select>
					</div>
					
				</div>
				<div class="col-md-2 col-xs-4">
					<div class="form-group">
						<label for="actividad">Actividad:</label>
						<select required class="form-control" name="actividad" id="actividad">
							<option value="0">Seleccione Opcion...</option>
							<option value="1">Avace de Tema</option>
							<option value="2">Investigación</option>
							<option value="3">Interacción Social</option>
							<option value="4">Examen</option>
							<option value="5">Otra</option>
					</select>
					</div>
				</div>
				<div class="col-md-4 col-xs-4">
					<div class="form-group">
						<label for="fecha">Fecha:</label>
						<input required type="date" name="fecha" id="fecha" class="form-control">
					</div>
				</div>
				<div class="col-md-12 col-xs-8">
					<div class="form-group">
						<label for="detalle">Detalle: </label>
						<textarea  class="form-control" name="detalle" id="detalle" cols="30" rows="6"></textarea>
						<input style="visibility:hidden;" class="form-control"  id="memoria" name="memoria" <?php echo 'value='.$info3; ?>>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-xs-6">
					<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
				</div>
				<div class="col-md-3 col-xs-6">
				<a type="button" class="btn btn-primary btn-lg btn-block" <?php echo 'href='.base_url().'Docente'; ?>>Cancelar</a>
				</div>
			</div>
		</form>
	</div>
</body>