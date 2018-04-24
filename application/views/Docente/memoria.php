<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center">MEMORIAS</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<a type="button" class="btn btn-primary" <?php echo 'href='.base_url().'Docente/Nueva'; ?>>NUEVA MEMORIA</a>
			</div>
		</div>
		<div class="row" style="padding-bottom:50px" >
			<div class="col-md-12"></div>
		</div>
		<?php 
			foreach ($info as $dato)
			{
		?>
			
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-primary">
							<div class="panel-body">
								<form method="POST" action="<?php echo base_url().'Docente/actividades'?>">
									<div class="row">
										<div class="col-md-1 col-xs-1">
											<h4><strong>COD.:</strong></h4>
										</div>
										<div class="col-md-1 col-xs-2">
											<h4><?php echo $dato->id_memoria; ?></h4>
											<input style="visibility:hidden;" class="form-control"  id="cod" name="cod" <?php echo 'value='.$dato->id_memoria; ?>>
										</div>
										<div class="col-md-1 col-xs-2">
											<h4><strong>GESTION:</strong></h4>
										</div>
										<div class="col-md-3 col-xs-2">
											<h4><?php echo $dato->gestion; ?></h4>
										</div>
										<div class="col-md-1 col-xs-2">
											<h4><strong>INICIO: </strong></h4>
										</div>
										<div class="col-md-2 col-xs-3">
											<h4><?php echo $dato->fecha_inicio; ?></h4>
										</div>
										<div class="col-md-1 col-xs-1">
											<h4><strong>FIN: </strong></h4>
										</div>
										<div class="col-md-2 col-xs-3">
											<h4><?php echo $dato->fecha_fin; ?></h4>
											<input style="visibility:hidden;" class="form-control"  id="mat" name="mat" <?php echo 'value='.$dato->idmat; ?>>
										</div>
									</div>
									<div class="row">
										<div class="col-md-1 col-xs-2">
											<h4><strong>MATERIA: </strong></h4>
										</div>
										<div class="col-md-4 col-xs-4">
											<h4 id="materia" name="materia"><?php echo $dato->nombre; ?></h4>
										</div>
										<div class="col-md-1 col-xs-2">
											<h4><strong>SIGLA: </strong></h4>
										</div>
										<div class="col-md-1 col-xs-2">
											<h4 id="sigla" name="sigla"><?php echo $dato->sigla; ?></h4>
										</div>
										<div class="col-md-3 col-xs-3">
											<h4 id="paralelo" name="paralelo"><?php echo $dato->paralelo; ?></h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 col-xs-12">
											<h4><strong>COMENTARIOS:</strong></h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 col-xs-12">
											<p class="text-justify"><?php echo $dato->comentarios; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 col-xs-4">
											<button id="btnact" <?php if($dato->fecha_fin!="") echo 'disabled '; ?>type="submit" class="btn btn-primary btn-block btn-lg" >Nueva Actividad</button>
										</div>
										<div class="col-md-8 col-xs-8">
											<p class="text-justify">
												<strong>NOTA:</strong>
												<p class="text-justify">
													Si no puede tener acceso a los botones de nueva actividad o de finalizar memoria
													es debido a que usted ya finalizo la memoria y actualmente, solo tiene acceso
													a ver la memoria sin opción a modificación.
												</p>
											</p>
										</div>
									</div>
								</form>
								<div class="row" style="padding-top:10px">
									<div class="col-md-4 col-xs-4">
										<button id="btnmem" <?php if($dato->fecha_fin!="") echo 'disabled '; ?>class="btn btn-primary btn-block btn-lg" <?php echo 'onClick=finalmem('.$dato->id_memoria.')'; ?>>Finalizar Memoria</button>
			               			 </div>
								</div>
								<div class="row" style="padding-top:10px">
									<div class="col-md-4 col-xs-4">
										<form method="POST" action="<?php echo base_url().'Docente/detalle_memoria'?>">
											<input hidden type="text" name="id" <?php echo 'value='.$dato->id_memoria; ?>>
											<input hidden type="text" name="ges" <?php echo 'value='.$dato->gestion; ?>>
											<input hidden type="text" name="fei" <?php echo 'value='.$dato->fecha_inicio; ?>>
											<input hidden type="text" name="fef" <?php echo 'value='.$dato->fecha_fin; ?>>
											<input hidden type="text" name="mat" <?php echo 'value="'.$dato->nombre.'"'; ?>>
											<input hidden type="text" name="sig" <?php echo 'value='.$dato->sigla; ?>>
											<input hidden type="text" name="par" <?php echo 'value='.$dato->paralelo; ?>>
											<input hidden type="text" name="com" <?php echo 'value='.$dato->comentarios; ?>>
											<button type="submit" class="btn btn-primary btn-block btn-lg" <?php if($dato->fecha_fin=="") echo 'disabled ';?> >Detalle Memoria</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		<?php
			}
		 ?>
	</div>
</body>