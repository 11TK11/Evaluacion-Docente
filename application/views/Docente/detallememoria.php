<body onload="alert('Para imprimir el presente documento presione la combinacion ctrl+p')">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h6>UNIVERSIDAD TECNICA DE ORURO</h6>
			</div>
			<div class="col-md-12">
				<h6>FACULTAD NACIONAL DE INGENIERIA</h6>
			</div>
			<div class="col-md-12">
				<h6>INGENIERIA DE SISTEMAS E INFORMATICA</h6>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4 class="text-center"><strong>EVALUACION DOCENTE</strong></h4>
			</div>
			<div class="col-md-12">
				<h5 class="text-center">INFORME MEMORIA DEL DOCENTE</h5>
			</div>
		</div>
		<div class="row" style="padding-top:10px">
			<div class="col-md-3 col-xs-3">
				<label for="">FACULTAD</label>
			</div>
			<div class="col-md-9 col-xs-9">
				<input type="text" class="form-control" value="NACIONAL DE INGENIERIA" disabled>
			</div>
		</div>
		<div class="row" style="padding-top:10px">
			<div class="col-md-3 col-xs-3">
				<label for="">CARRERA</label>
			</div>
			<div class="col-md-9 col-xs-9">
				<input type="text" disabled class="form-control" value="INGENIERIA DE SISTEMAS E INFORMATICA">
			</div>
		</div>
		<div class="row" style="padding-top:10px">
			<div class="col-md-3 col-xs-3">
				<label for="">ASIGNATURA</label>
			</div>
			<div class="col-md-9 col-xs-9">
				<input type="text" disabled class="form-control" <?php echo 'value="'.$mat.'"'; ?>>
			</div>
		</div>
		<div class="row" style="padding-top:10px">
			<div class="col-md-3 col-xs-3">
				<label for="">SIGLA</label>
			</div>
			<div class="col-md-9 col-xs-9">
				<input type="text" disabled class="form-control" <?php echo 'value='.$sig; ?>>
			</div>
		</div>
		<div class="row" style="padding-top:10px">
			<div class="col-md-3 col-xs-3">
				<label for="">PARALELO</label>
			</div>
			<div class="col-md-9 col-xs-9">
				<input type="text" disabled class="form-control" <?php echo 'value='.$par; ?>>
			</div>
		</div>
		<div class="row" style="padding-top:10px">
			<div class="col-md-3 col-xs-3">
				<label for="">GESTION ACADEMICA</label>
			</div> 
			<div class="col-md-9 col-xs-9">
				<input type="text" disabled class="form-control" <?php echo 'value='.$ges; ?>>
			</div>
		</div>
		<div class="row" style="padding-top:10px">
			<div class="col-md-3 col-xs-3">
				<label for="">NOMBRE DEL DOCENTE</label>
			</div>
			<div class="col-md-9 col-xs-9">
				<input type="text" disabled class="form-control" <?php echo 'value="'.$doc->nombres.' '.$doc->apellido_paterno.' '.$doc->apellido_materno.'"'; ?>>
			</div>
		</div>
		<div class="row" style="padding-top:10px">
			<div class="col-md-12">
				<h4><strong>1. EJECUCION DEL PLAN DE TRABAJO.</strong></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-xs-6">
				<div class="row">
					<div class="col-md-6 col-xs-6">
						<label for="">INICIO ACTIVIDADES</label>
					</div>
					<div class="col-md-6 col-xs-6">
						<input type="text" disabled class="form-control" <?php echo 'value='.$fei; ?>>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xs-6">
				<div class="row">
					<div class="col-md-6 col-xs-6">
						<label for="">CONCLUSION ACTIVIDADES</label>
					</div>
					<div class="col-md-6 col-xs-6">
						<input type="text" disabled class="form-control" <?php echo 'value='.$fef; ?>>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="padding-top:10px">
			<div class="col-md-3 col-xs-3">
				<label for="">TEMAS AVANZADOS</label>
			</div>
			<div class="col-md-9 col-xs-9 table-reponsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>#</td>
							<td>TEMA</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$con=1;
							foreach ($matsi as $mat)
							{
								echo '<tr><td>'.$con.'</td><td>'.$mat->titulo.'</td></tr>';
								$con=$con+1;
							}
						 ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-xs-3">
				<label for="">TEMAS NO AVANZADOS</label>
			</div>
			<div class="col-md-9 col-xs-9 table-reponsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>#</td>
							<td>TEMA</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$con=1;
							foreach ($matno as $mat)
							{
								echo '<tr><td>'.$con.'</td><td>'.$mat->titulo.'</td></tr>';
								$con=$con+1;
							}
						 ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4><strong>1.1. EXAMENES (PARCIALES, FINAL, REVALIDA).</strong></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>EXAMEN</td>
							<td>FECHA</td>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($actividades as $act)
						{
							if($act->actividad==4)
							echo '<tr><td>'.$act->detalle.'</td><td>'.$act->fecha_realizacion.'</td></tr>';
						}
						 ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4><strong>1.2. PRACTICAS.</strong></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>#</td>
							<td>TEMA</td>
							<td>DETALLE</td>
							<td>FECHA</td>
						</tr>
					</thead>
					<tbody>
						<?php 
						$con=1;
						foreach ($actividades as $act)
						{
							if($act->actividad==2)
							{
								echo '<tr><td>'.$con.'</td><td>'.$act->titulo.'</td><td>'.$act->detalle.'</td><td>'.$act->fecha_realizacion.'</td></tr>';
								$con=$con+1;
							}
						}
						 ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4><strong>1.3. PROYECTOS, TRABAJOS DE CAMPO ETC.</strong></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>#</td>
							<td>TEMA</td>
							<td>DETALLE</td>
							<td>FECHA</td>
						</tr>
					</thead>
					<tbody>
						<?php 
						$con=1;
						foreach ($actividades as $act)
						{
							if($act->actividad!=4 && $act->actividad!=2 && $act->actividad!=1 )
							{
								echo '<tr><td>'.$con.'</td><td>'.$act->titulo.'</td><td>'.$act->detalle.'</td><td>'.$act->fecha_realizacion.'</td></tr>';
								$con=$con+1;
							}
						}
						 ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4><strong>1.4. CUMPLIMIENTO DEL CALENDARIO ACADEMICO POR EL DOCENTE EN LA ASIGNATURA.</strong></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-xs-3">
				<div class="row">
					<div class="col-md-12">
						90-100% <input name="radio" type="radio">
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-3">
				<div class="row">
					<div class="col-md-12">
						70-89% <input name="radio" type="radio">
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-3">
				<div class="row">
					<div class="col-md-12">
						50-69% <input name="radio" type="radio">
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-3">
				<div class="row">
					<div class="col-md-12">
						Menor a 50% <input name="radio" type="radio">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4>COMENTARIOS</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p class="text-justify">
					<?php echo $com; ?>
				</p>
			</div>
		</div>
	</div>
</body>