<div class = 'row-fluid'>
	<div class = 'span4 offset3'><h2><?=$this->title?></h2></div>
</div>

<br/>

<?=form_open("user/inventory/lotesNew/{$id}")?>
<div class = 'row-fluid'>
	<div class = 'span4 offset1'>

		<legend>Nuevo</legend>

		<div class="control-group">
			<label class = 'control-label' for = 'txt_marca'>Marca</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<?=form_input( 'txt_marca' , $lote->txt_marca , "class = 'input-xxlarge' disabled = 'disabled' " )?>
				</div>
			</div>
		</div>

		<div class="control-group">
			<label class = 'control-label' for = 'txt_nombre'>Nombre</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<?=form_input( 'txt_nombre' , $lote->txt_nombre , "class = 'input-xxlarge' disabled = 'disabled' " )?>
				</div>
			</div>
		</div>

		<div class="control-group">
			<label class = 'control-label' for = 'txt_cantidad'>Cantidad</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<?=form_input('num_cantidad',''," placeholder = '300' class = 'input-xxlarge' ")?>
				</div>
			</div>
		</div>

		<div class="control-group">
			<label class = 'control-label' for = 'txt_cantidad'>Fecha de caducidad</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<?=form_input('fec_caducidad',''," placeholder = '06-01-2014' id = 'fec_caducidad' class = 'input-xxlarge' ")?>
				</div>
			</div>
		</div>

		<button type = 'submit' class = 'btn btn-primary'><i class = 'icon-ok icon-white'></i> Guardar</button>
		
	</div>
</div>

<?php
	echo includeJs('bootstrap-datepicker');
	echo includeCss('desktop/datepicker');
?>

<script type="text/javascript">
	$(function(){
		lotesNew();
	});
</script>
