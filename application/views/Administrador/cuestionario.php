<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center">Cuestionarios Almacenados</h1>
			</div>
		</div>
		<br>
		<?php 
		 $id=1;
			foreach ($info as $fila) 
			{
		?>
				<div class="panel panel-primary">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<h2>
										<?php
											echo 'Cuestionario: #'.$fila->id_cuestionario; 
							 			?>
									</h2>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<h4>
										<div class="col-md-6">
											<?php 
												echo '<strong>Resolución:</strong> '.$fila->resolucion;
								 			?>
										</div>
										<div class="col-md-6">
											<?php
												echo '<strong>Fecha Aprobación:</strong> '.$fila->fecha_aprobacion; 
											 ?>
										</div>
									</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<br><br>
									<button type="button" data-toggle="modal" <?php echo 'data-target=#'.$id; ?> class="btn btn-primary btn-block" <?php echo 'onClick=preg('.$fila->id_cuestionario.')'; ?>>Ver Preguntas</button>
									<div class="modal fade" <?php echo 'id='.$id; ?> role="dialog">
									    <div class="modal-dialog">
									    
									      <!-- Modal content-->
									      	<div class="modal-content">
									        	<div class="modal-header">
									          		<button type="button" class="close" data-dismiss="modal">&times;</button>
									          		<h2 class="model-title text-center"><strong><?php echo 'Encuesta #'.$fila->id_cuestionario; ?></strong></h2>
									        		<h3 class="model-title text-center">PREGUNTAS DEL CUESTIONARIO</h3>
									        	</div>
									       
									        	<div class="modal-body" >
													<div class="row">
														<table class="table table-bordered">
															<thead>
																<tr>
																	<td><strong>#</strong></td>
																	<td><strong>PREGUNTA</strong></td>
																</tr>
															</thead>
															<tbody id="cuerpo" >
																
															</tbody>
														</table>
													</div>
									        	</div>
									        	<div class="modal-footer">
									          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									        	</div>
									      </div>
									       </div>
									    </div>
								</div>
							</div>
						</div>
				</div>

		<?php
				$id=$id+1;
			}
		 ?>
	</div>
</body>