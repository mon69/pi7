<div class = 'row-fluid'>
	<div class = 'span4 offset3'><h2><?=$this->title?></h2></div>
</div>

<br/><br/>

<div class = 'row'>
	<div class = 'span12 offset1'>
		<table class = 'table table-striped table-hover'>

			<thead>
				<tr>
					<th>
						Id
					</th>

					<th>
						Nombre
					</th>

					<th>
						Teléfono
					</th>

					<th>
						Correo
					</th>

					<th>
						Latitud
					</th>

					<th>
						Longitud
					</th>

					<th>
						Mapa
					</th>

					<th>
						Productos favoritos
					</th>

					<th>
						Siguiente visita
					</th>

					<th>
						Opciones
					</th>
				</tr>

			</thead>

			<tbody>

				<?php
					foreach($clients as $client):
				?>
					<tr>
						<td><?=$client->idCliente?></td>
						<td><?=$client->txt_nombre?></td>
						<td><?=$client->txt_telefono?></td>
						<td><?=$client->txt_correo?></td>
						<td><?=$client->lat?></td>
						<td><?=$client->lng?></td>
						<td><?=form_button('btnMap','<i class="icon-search icon-white"></i>' . nbs(2) . 'Ver ', "class = 'btn btn-primary'" . clickHref('user/clients/map/1') )?></td>
						<td><?=$client->idProductosFavoritos?></td>
						<td>
							<?= ($client->fec_sigVenta != null) ? $client->fec_sigVenta : "No programada" ?>							
						</td>
						<td>
							<?php
								if ( array_key_exists( 4 , $permissions[$screen] ) )
									echo form_button( 'btnEdit' , '<i class="icon-search icon-white"></i>' . nbs(2) . 'Editar ', "class = 'btn btn-warning'" . clickHref( 'user/clients/editClient/'.$client->idCliente ) ) . nbs(3);

								if ( array_key_exists( 2 , $permissions[$screen] ) )
									echo form_button( 'btnEdit' , '<i class="icon-search icon-white"></i>' . nbs(2) . 'Eliminar ', "class = 'btn btn-danger'" . clickHref( 'user/clients/deleteClient/'.$client->idCliente ) );
							?>
						</td>
					</tr>
				<?php
					endforeach;
				?>

			</tbody>


		</table>

	</div>

</div> <!-- Row -->

<br><br>

<div class = 'row'>
	<div class = 'span2 offset1 menu' >

		<div class ='row'>
			<div class = 'span2'>
				<button 
					type = 'button' 
					class = 'btn btn-primary btn-block btn-large' 
					<?=( !array_key_exists(1, $permissions[$screen]) ) ? " disabled = 'disabled' " : " " ?> 
					<?=clickHref('user/clients/newClient')?>
				>
					<i class = 'icon-plus icon-white'></i><?=nbs(3)?>Nuevo
				</button>
			</div>
		</div>

	</div>
</div>