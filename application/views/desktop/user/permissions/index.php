<div class = 'row-fluid'>
	<div class = 'span2 offset3'><h2><?=$this->title?></h2></div>
</div>

<br/><br/>

<?=form_open('user/permissions')?>
<div class = 'row-fluid'>
	<div class = 'span6 offset1'>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-search"></i></span>
					<?=form_input('query',''," placeholder = 'Vendedor' class = 'input-xxlarge' ")?>
				</div>
			</div>
		</div>
	</div>
</div>
<?=form_close()?>

<div class = 'row-fluid'>
	<div class = 'span6 offset1 '>
		resultados
	</div>
</div>

<br/>


<div class = 'row-fluid'>
	<div class = 'span6 offset1 bggrey'>
		<div class = 'row-fluid '>

			
			<?php
				if ( array_key_exists(3, $permissions[$screen]) )
					echo "<div class = 'span6 bggreen' id = 'list' onclick=\"redirect('user/permissions/list')\">";
				else
					echo "<div class = 'span6 bgred notallow'>";
			?>

				<br/>
				<div class = 'row-fluid '>
					<div class = 'span3 offset1'>
						<?=image('list','png','width:60px;height:60px;')?>
					</div>
					<div class = 'span3'>
						<h3>Listar</h3>
					</div>
				</div>
				<br/>

			</div>			

			<?php
				if ( array_key_exists(1, $permissions[$screen]) )
					echo "<div class = 'span6 bggreen' id = 'new' onclick=\"redirect('user/permissions/new')\">";
				else
					echo "<div class = 'span6 bgred notallow'>";
			?>

				<br/>
				<div class = 'row-fluid '>
					<div class = 'span3 offset1'>
						<?=image('new','png','width:60px;height:60px;')?>
					</div>
					
					<div class = 'span3'>
						<h3>Nuevo</h3>
					</div>
				</div>
				<br/>

			</div>
			
		</div>
		<div class = 'row-fluid' >

			<?php
				if ( array_key_exists(4, $permissions[$screen]) )
					echo "<div class = 'span6 bggreen' id = 'edit' onclick=\"redirect('user/permissions/edit')\">";
				else
					echo "<div class = 'span6 bgred notallow'>";
			?>

				<br/>
				<div class = 'row-fluid '>
					<div class = 'span3 offset1'>
						<?=image('edit','png','width:60px;height:60px;')?>
					</div>
					<div class = 'span3'>
						<h3>Editar</h3>
					</div>
				</div>
				<br/>

			</div>

			<?php
				if ( array_key_exists(2, $permissions[$screen]) )
					echo "<div class = 'span6 bggreen' id = 'delete' onclick=\"redirect('user/permissions/delete')\">";
				else
					echo "<div class = 'span6 bgred notallow'>";
			?>

				<br/>
				<div class = 'row-fluid '>
					<div class = 'span3 offset1'>
						<?=image('cross','png','width:60px;height:60px;')?>
					</div>
					<div class = 'span3'>
						<h3>Eliminar</h3>
					</div>
				</div>
				<br/>

			</div>
			
		</div>
	</div>
</div>
	




<?php
	echo includeCss('desktop/help');
?>

