<?php
$historial = array();
$historial_cancular_transaccion = array();

$historial =  historial::getAll();

$numero_historial_ayuda=0;
$numero_historial_cancular_transaccion=0;
$numero_historial_abandonadas=0;
$numero_historial_accedidas=0;
$numero_historial_error=0;
			foreach($historial as  $valor)
			{
				if($valor->tipo_operacion==1)
				{
					$numero_historial_ayuda++;	
				}
			}
			foreach($historial as  $valor)
			{
				if($valor->tipo_operacion==4)
				{
					$numero_historial_cancular_transaccion++;	
				}
			}
			//avandonadas
			foreach($historial as  $valor)
			{
				if($valor->tipo_operacion==6)
				{
					$numero_historial_abandonadas++;	
				}
			}
			//accedidas
			foreach($historial as  $valor)
			{
				if($valor->tipo_operacion==7)
				{
					$numero_historial_accedidas++;	
				}
			}
			//error
			foreach($historial as  $valor)
			{
				if($valor->tipo_operacion==3)
				{
					$numero_historial_error++;	
				}
			}

?>


<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" />


        <!-- Main Content -->

		 
			<div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsAntecedentes">
                        Número de veces que se accede ayuda en linea (<?php echo $numero_historial_ayuda; ?>)
                    </a>
                </h4>
            </div>
		    <div id="collapsAntecedentes" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table table-responsive col-lg-12">
                                <div class="row">
									<table id="example" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Usuario</th>
											<th>Tipo</th>
											<th>Observacion</th>
										</tr>
									</thead>
			
									<tbody>
										<?php
										foreach($historial as  $valor)
										{
											if($valor->tipo_operacion==1)
											{
												echo '<tr>
														<td>'.$valor->usuario.'</td>
														<td>Ayuda</td>
														<td>'.$valor->observacion.'</td>
													</tr>';
											}
										}
										?>
									</tbody>
									</table>
                                </div>
                            </div>
                        </div>
            </div>
			<div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsAntecedentes1">
                        Número Transacciones abandonadas (<?php echo $numero_historial_cancular_transaccion; ?>)
                    </a>
                </h4>
            </div>
			<div id="collapsAntecedentes1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table table-responsive col-lg-12">
                                <div class="row">
									<table id="example" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Usuario</th>
											<th>Tipo</th>
											<th>Observacion</th>
										</tr>
									</thead>
			
									<tbody>
										<?php
										foreach($historial as  $valor)
										{
											if($valor->tipo_operacion==4)
											{
												echo '<tr>
														<td>'.$valor->usuario.'</td>
														<td>Ayuda</td>
														<td>'.$valor->observacion.'</td>
													</tr>';
											}
										}
										?>
									</tbody>
									</table>
                                </div>
                            </div>
                        </div>
            </div>
			
			<div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsAntecedentes12">
                        Número Paginas Accedidas (<?php echo $numero_historial_accedidas; ?>)
                    </a>
                </h4>
            </div>
			<div id="collapsAntecedentes12" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table table-responsive col-lg-12">
                                <div class="row">
									<table id="example" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Usuario</th>
											<th>Tipo</th>
											<th>Observacion</th>
										</tr>
									</thead>
			
									<tbody>
										<?php
										foreach($historial as  $valor)
										{
											if($valor->tipo_operacion==7)
											{
												echo '<tr>
														<td>'.$valor->usuario.'</td>
														<td>Ayuda</td>
														<td>'.$valor->observacion.'</td>
													</tr>';
											}
										}
										?>
									</tbody>
									</table>
                                </div>
                            </div>
                        </div>
            </div>
			<div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsAntecedentes11">
                        Número Páginas Abandonadas (<?php echo $numero_historial_abandonadas; ?>)
                    </a>
                </h4>
            </div>
			<div id="collapsAntecedentes11" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table table-responsive col-lg-12">
                                <div class="row">
									<table id="example" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Usuario</th>
											<th>Tipo</th>
											<th>Observacion</th>
										</tr>
									</thead>
			
									<tbody>
										<?php
										foreach($historial as  $valor)
										{
											if($valor->tipo_operacion==6)
											{
												echo '<tr>
														<td>'.$valor->usuario.'</td>
														<td>Ayuda</td>
														<td>'.$valor->observacion.'</td>
													</tr>';
											}
										}
										?>
									</tbody>
									</table>
                                </div>
                            </div>
                        </div>
            </div>
		    <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsAntecedentes11r">
                        Número Errores (<?php echo $numero_historial_error; ?>)
                    </a>
                </h4>
            </div>
			<div id="collapsAntecedentes11r" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table table-responsive col-lg-12">
                                <div class="row">
									<table id="example" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Usuario</th>
											<th>Tipo</th>
											<th>Observacion</th>
										</tr>
									</thead>
			
									<tbody>
										<?php
										foreach($historial as  $valor)
										{
											if($valor->tipo_operacion==3)
											{
												echo '<tr>
														<td>'.$valor->usuario.'</td>
														<td>Ayuda</td>
														<td>'.$valor->observacion.'</td>
													</tr>';
											}
										}
										?>
									</tbody>
									</table>
                                </div>
                            </div>
                        </div>
            </div>
		

