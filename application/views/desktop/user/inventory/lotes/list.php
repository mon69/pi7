<div class = 'row-fluid'>
	<div class = 'span4 offset3'><h2><?=$this->title?></h2></div>
</div>

<br/>

<div class = 'row'>
	<div class = 'span3 offset1'>
		<?= (array_key_exists(0, $lotes) ) ? $lotes[0]->txt_marca : "" ?>
	</div>
</div>

<div class = 'row'>
	<div class = 'span9 offset1'>
		<table class = 'table table-striped table-hover'>

			<thead>
				<tr>
					<th>
						Id
					</th>

					<th>
						Producto
					</th>

					<th>
						Fecha de caducidad
					</th>

					<th>
						Cantidad
					</th>

					<th>
						Opciones
					</th>
				</tr>

			</thead>

			<tbody>

				<?php					
					foreach($lotes as $lote):
				?>
					<tr>
						<td><?=$lote->idLote?></td>
						<td><?=$lote->txt_nombre?></td>
						<td><?=$lote->fec_caducidad?></td>
						<td><?=$lote->num_cantidad?></td>
						<td>
							<?php
								if ( array_key_exists( 4 , $permissions[$screen] ) )
									echo form_button( 'btnEdit' , '<i class="icon-search icon-white"></i>' . nbs(2) . 'Editar ', "class = 'btn btn-warning'" . clickHref( 'user/inventory/lotesEdit/'.$lote->idLote ) ) . nbs(3);

								if ( array_key_exists( 2 , $permissions[$screen] ) )
									echo form_button( 'btnEdit' , '<i class="icon-search icon-white"></i>' . nbs(2) . 'Eliminar ', "class = 'btn btn-danger'" . clickHref( 'user/inventory/lotesDelete/'.$lote->idLote ) );
							?>
						</td>
					</tr>
				<?php
					endforeach;
				?>
			</tbody>
		</table>

		<?=(array_key_exists(0, $lotes)) ? "" : "<b>No se encontraron registros</b>";?>

	</div>
	<br/><br/>
	<div class = 'span2 menu'>
	
		<div class ='row'>
			<div class = 'span2'>
				<button 
					type = 'button' 
					class = 'btn btn-primary btn-block btn-large' 
					<?=( !array_key_exists(1, $permissions[$screen]) ) ? " disabled = 'disabled' " : " " ?> 
					<?=clickHref("user/inventory/lotesNew/{$id}")?>
				>
					<i class = 'icon-plus icon-white'></i><?=nbs(3)?>Nuevo
				</button>
			</div>
		</div>
	</div>

</div>