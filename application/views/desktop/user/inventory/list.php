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
						Marca
					</th>

					<th>
						Nombre
					</th>

					<th>
						Categoria
					</th>

					<th>
						Contenido
					</th>

					<th>
						Precio
					</th>

					<th>
						Total
					</th>

					<th>
						Lotes
					</th>

					<th>
						Opciones
					</th>
				</tr>

			</thead>

			<tbody>

				<?php
					foreach($products as $product):
				?>
					<tr>
						<td><?=$product->idProducto?></td>
						<td><?=$product->marca?></td>
						<td><?=$product->nombre?></td>
						<td><?=$product->categoria?></td>
						<td><?=$product->contenido?></td>
						<td><?=$product->precio?></td>
						<td><?= (is_null( $product->total ) ) ? "0" : $product->total ?></td>
						<td><?=form_button('btnLote','<i class="icon-search icon-white"></i>' . nbs(2) . 'Ver ', "class = 'btn btn-primary'" . clickHref('user/inventory/lotes/'.$product->idProducto) )?></td>

						<td>
							<?php
								if ( array_key_exists( 4 , $permissions[$screen] ) )
									echo form_button( 'btnEdit' , '<i class="icon-search icon-white"></i>' . nbs(2) . 'Editar ', "class = 'btn btn-warning'" . clickHref( 'user/inventory/editProduct/'.$product->idProducto ) ) . nbs(3);

								if ( array_key_exists( 2 , $permissions[$screen] ) )
									echo form_button( 'btnEdit' , '<i class="icon-search icon-white"></i>' . nbs(2) . 'Eliminar ', "class = 'btn btn-danger'" . clickHref( 'user/inventory/deleteProduct/'.$product->idProducto ) );
							?>
						</td>
					</tr>
				<?php
					endforeach;
				?>

			</tbody>

		</table>

	</div>

</div>

<br><br>
<div class = 'row'>
	<div class = 'span2 offset1 menu' >

		<div class ='row'>
			<div class = 'span2'>
				<button 
					type = 'button' 
					class = 'btn btn-primary btn-block btn-large' 
					<?=( !array_key_exists(1, $permissions[$screen]) ) ? " disabled = 'disabled' " : " " ?> 
					<?=clickHref('user/inventory/newProduct')?>
				>
					<i class = 'icon-plus icon-white'></i><?=nbs(3)?>Nuevo
				</button>
			</div>
		</div>
	</div>
</div>