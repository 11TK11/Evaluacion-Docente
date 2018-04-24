<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php 
					foreach ($info as $dato)
					{
				?>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-body">
										<div class="row">
											<div class="col-md-2 col-xs-2">
												<label for="">COD.</label>
											</div>
											<div class="col-md-1 col-xs-1">
												<?php echo $dato->idmat; ?>
											</div>
											<div class="col-md-2 col-xs-2">
												<label for="">MATERIA:</label>
											</div>
											<div class="col-md-4 col-xs-10">
												<?php echo $dato->nombre; ?>
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