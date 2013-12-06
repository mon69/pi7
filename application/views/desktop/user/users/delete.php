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
						Nombre Usuario
					</th>

					<th>
						Nombre
					</th>

					<th>
						Password
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
						Opciones
					</th>
				</tr>

			</thead>

			<tbody>

				<?php
					foreach($users as $user):
				?>
					<tr>
						<td><?=$user->idPersonal?></td>
						<td><?=$user->txt_usuario?></td>
						<td><?=$user->txt_nombre?></td>
						<td><?=$user->txt_password?></td>
						<td><?=$user->txt_telefono?></td>
						<td><?=$user->txt_correo?></td>
						<td><?=$user->lat?></td>
						<td><?=$user->lng?></td>
						
						<td>
							<?php
								if ( array_key_exists( 4 , $permissions[$screen] ) )
									echo form_button( 'btnEdit' , '<i class="icon-search icon-white"></i>' . nbs(2) . 'Editar ', "class = 'btn btn-warning'" . clickHref( 'user/users/editUser/'.$user->idPersonal ) ) . nbs(3);

								if ( array_key_exists( 2 , $permissions[$screen] ) )
									echo form_button( 'btnEdit' , '<i class="icon-search icon-white"></i>' . nbs(2) . 'Eliminar ', "class = 'btn btn-danger'" . clickHref( 'user/users/deleteUser/'.$user->idPersonal ) );
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
					<?=clickHref('user/users/newUser')?>
				>
					<i class = 'icon-plus icon-white'></i><?=nbs(3)?>Nuevo
				</button>
			</div>
		</div>

	</div>
</div>