<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center">Materias Evaluadas Presente Año</h1>
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
											echo $fila->nombre.' - '.$fila->sigla.' " '.$fila->paralelo.'"'; 
							 			?>
									</h2>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<h4>
										<div class="col-md-6">
											<?php 
												echo '<strong>Docente:</strong> '.$fila->nombres.' '.$fila->apellido_paterno.' '.$fila->apellido_materno;
								 			?>
										</div>
										<div class="col-md-6">
											<?php
												echo '<strong>Puntaje del presente año:</strong> '.$fila->prom.' de 5'; 
											 ?>
										</div>
									</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<br><br>
									<button type="button" data-toggle="modal" <?php echo 'data-target=#'.$id; ?> class="btn btn-primary btn-block" <?php echo 'onClick=hist('.$id.','.$fila->id_docente.','.$fila->id_mat_paralelo.')'; ?>>Ver Información Historica</button>
									<div class="modal fade" <?php echo 'id='.$id; ?> role="dialog">
									    <div class="modal-dialog">
									    
									      <!-- Modal content-->
									      <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h2 class="model-title text-center"><strong>HISTORIAL EVALUACION</strong></h2>
									          <h3 class="modal-title"><strong>DOCENTE:</strong> </h3>
									          <h4 class="modal-title"><?php echo $fila->nombres.' '.$fila->apellido_paterno.' '.$fila->apellido_materno; ?></h4>
									          <h3 class="model-title"><strong>MATERIA:</strong></h3>
									          <div class="model-title">
									          	
									          </div>
									        </div>
									        <div class="modal-body">
												<table class="table table-bordered">
													<thead>
														<tr>
															<td>AÑO</td>
															<td>PUNTAJE</td>
														</tr>
													</thead>
													<tbody id="cuerpo">
														
													</tbody>
												</table>
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