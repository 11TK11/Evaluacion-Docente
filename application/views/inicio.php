<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-xs-2"><br></div>
			<div class="col-md-6 col-xs-8">
				<img src="/Evaluacion_Docente/assets/img/sisinf.png" alt="">
			</div>
			<div class="col-md-3 col-xs-2"><br></div>
		</div>
		<div class="row">
			<div class="col-md-3"><br></div>
			<div class="col-md-6 center-block">
				<div class="panel panel-primary">
  					<div class="panel-heading">Ingreso</div>
  					<div class="panel-body">
  						<form method="POST" <?php echo 'action='.base_url().'Usuario/validar'; ?>>
  							<div class="form-group">
  								<label for="usuario">Usuario: </label>
  								<input class="form-control" placeholder="Usuario" type="text" id="usuario" name="usuario">
  							</div>
  							<div class="form-group">
  								<label for="contrasenia">Contraseña: </label>
  								<input placeholder="Contraseña" type="password" id="contra" name="contra" class="form-control">
  							</div>
  							<div class="form-group">
  								<button type="submit" class="btn btn-primary">Ingresar</button>
  								<a class="pull-right" data-toggle="tooltip" data-placement="left" title="Presione e Ingrese si es Estudiante" onClick="anonim()">Soy Estudiante</a>
  							</div>
  						</form>
  					</div>
				</div>
			</div>
			<div class="col-md-3"><br></div>
		</div>
	</div>
</body>