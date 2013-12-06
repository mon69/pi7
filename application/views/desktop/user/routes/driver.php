<?//=dump($routes)?>
<div class = 'row'>
	<div class = 'span4 offset3'>
		<h2><?=$this->title?></h2>
	</div>
</div>

<br/><br/>

	<div class = 'row'>

		<div class = 'span5 offset1'>

			<?php 
				if ( count( $routes ) < 1 ){
					echo "<h3>No hay rutas disponibles</h3>";
				}else{ ?>

					<table class = 'table table-hover'>
						<thead>
							<tr>
								<td>Nombre</td>
								<td>Dia</td>
								<td>Opciones</td>
							</tr>
						</thead>

						<tbody>
							<?php
							foreach ($routes as $route) {
								echo "
									<tr>
										<td>{$route['txt_nombreRuta']}</td>
										<td>{$route['fec_dia']}</td>
										<td>
											
										</td>
									</tr>
								";

							}
							?>
						</tbody>
					</table>	

			<?php }
			?>

		</div>

		<div class = 'span2 offset2 menu' >

			<div class ='row'>
				<div class = 'span2'>
					<button 
						type = 'button' 
						class = 'btn btn-primary btn-block btn-large' 
						<?=( !array_key_exists(3, $permissions[$screen]) ) ? " disabled = 'disabled' " : " " ?>
						<?=clickHref('user/routes/lists')?>
					>
						<i class = 'icon-th-large icon-white'></i><?=nbs(3)?>Historial
					</button>
				</div>
			</div>

		</div>

	</div> <!-- row -->