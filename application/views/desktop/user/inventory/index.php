<div class = 'row'>
	<div class = 'span4 offset3'><h2><?=$this->title?></h2></div>
</div>

<br/><br/>

<div class = 'row '>
	<div class = 'span8 offset1'>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-search"></i></span>
					<?=form_input('query',''," placeholder = 'Coca cola 600ml' class = 'input-xxlarge' ")?>
				</div>
			</div>
		</div>

		<table class = 'table table-hover' style='display:block'>

			<thead>
				<tr>
					<th>Id</th>
					<th>Marca</th>
					<th>Nombre</th>
					<th>Categoria</th>
					<th>Contenido</th>
					<th>Precio</th>
					<th>Existencia</th>
					<th colspan = '4'>Opciones</th>
				</tr>
			</thead>

			<tbody>
			</tbody>

		</table>
	</div>

	<div class = 'span2 menu' >

		<div class ='row'>
			<div class = 'span2'>
				<button 
					type = 'button' 
					class = 'btn btn-primary btn-block btn-large' 
					<?=( !array_key_exists(3, $permissions[$screen]) ) ? " disabled = 'disabled' " : " " ?>
					<?=clickHref('user/inventory/lists')?>
				>
					<i class = 'icon-th-large icon-white'></i><?=nbs(3)?>Listado
				</button>
			</div>
		</div>

		<br/>

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

<script type="text/javascript">
	$(function(){
		inventoryIndex();
	});
</script>
