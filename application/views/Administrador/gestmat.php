<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php 
					foreach ($info as $fila)
					{	
				?>
						<div class="panel panel-primary">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-3 col-xs-3">
										<h2><?php echo $fila->sigla; ?></h2>
									</div>
									<div class="col-md-9 col-xs-9">
										<h2><?php echo $fila->nombre; ?></h2>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr><td colspan=5><h3 class="text-center">Cantidad de Horas que lleva cada mensión la materia</h3></td></tr>
												<tr>
													<td><strong>Dir. y Gestión Empresarial</strong></td>
													<td><strong>Gestión de la Información</strong></td>
													<td><strong>Modelamiento y Optimización</strong></td>
													<td><strong>Desarrollo de Software</strong></td>
													<td><strong>Telematica</strong></td>
												</tr>
											</thead>
											<tbody>
												<?php 
													echo '<tr><td>'.$fila->sis_dgse.'</td><td>'.$fila->sis_gei.'</td><td>'.$fila->sis_morp.'</td><td>'.$fila->inf_ds.'</td><td>'.$fila->inf_tel.'</td></tr>';					
												 ?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-xs-4">
										<?php if($fila->estado==1) 
													{
										?>
														<a type="button" class="btn btn-danger btn-block btn-lg" <?php echo 'onclick=alert('.$fila->estado.')'; ?>>
															<?php  echo '<strong>Desabilitar materia</strong>';?>
														</a>
										<?php 			
													}
										  		else
										 	  		{
										?>
										 	  			<a type="button" class="btn btn-success btn-block btn-lg" <?php echo 'onclick=alert('.$fila->estado.')'; ?>>
										 	  				<?php  echo '<strong>Habilitar materia</strong>';?>
										 	  			</a>
										 	 <?php 
										 	  		}
											 ?>
									</div>
									<div class="col-md-4 col-xs-4">
										<button class="btn btn-primary btn-block btn-lg" data-toggle="modal" <?php echo 'data-target=#'.$fila->idmat;?>><strong>Ver Contenido</strong></button>
									</div>
									<div class="col-md-4 col-xs-4">
										<button class="btn btn-primary btn-block btn-lg" data-toggle="modal" <?php if($fila->estado==0) echo 'disabled '; echo 'data-target=#'.$fila->idmat.'p'; echo ' onclick=paral('.$fila->idmat.')';?>><strong>Ver Paralelos</strong></button>
									</div>

									<div class="modal fade" <?php echo 'id='.$fila->idmat; ?> role="dialog">
									    <div class="modal-dialog">
									    
									      <!-- Modal content-->
									      <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h2 class="model-title text-center"><strong>CONTENIDO ANALITICO</strong></h2>
									        </div>
									        <div class="modal-body">
												<table class="table table-bordered">
													<thead>
														<tr>
															<td><strong>AÑO</strong></td>
															<td><strong>PUNTAJE</strong></td>
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

									 <div class="modal fade" <?php echo 'id='.$fila->idmat.'p'; ?> role="dialog">
									    <div class="modal-dialog">
									    
									      <!-- Modal content-->
									      <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h2 class="model-title text-center"><strong>PARALELOS DISPONIBLES</strong></h2>
									        </div>
									        <div class="modal-body">
												<table class="table table-bordered">
													<thead>
														<tr>
															<td><strong>PARALELO</strong></td>
															<td colspan=3><strong><p class="text-center">DOCENTE</p></strong></td>
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
				<?php
					}
				 ?>
			</div>
		</div>
	</div>
</body>