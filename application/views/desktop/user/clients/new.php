<div class = 'row-fluid'>
	<div class = 'span4 offset3'><h2><?=$this->title?></h2></div>
</div>

<br/>

<?=form_open('user/clients/newClient')?>
<div class = 'row-fluid'>
	<div class = 'span7 offset1'>

		<legend>Nuevo</legend>
		<div class="control-group">
			<label class = 'control-label' for = 'txt_nombre'>Nombre</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<?=form_input('txt_nombre',''," placeholder = 'Peter Parker' class = 'input-xxlarge' ")?>
				</div>
			</div>
		</div>

		<div class="control-group">
			<label class = 'control-label' for = 'txt_telefono'>Teléfono</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-bullhorn"></i></span>
					<?=form_input('txt_telefono',''," placeholder = '3121364479' class = 'input-xxlarge' maxlength='10' ")?>
				</div>
			</div>
		</div>

		<div class="control-group">
			<label class = 'control-label' for = 'txt_correo'>Correo</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-envelope"></i></span>
					<?=form_input('txt_correo',''," placeholder = 'algo@hotmail.com' class = 'input-xxlarge' maxlength='50' ")?>
				</div>
			</div>
		</div>

	</div>
</div>

<br/>

<div class = 'row-fluid'>
	<div class = 'span7 offset1'>
		<legend>Ubicaci&oacute;n</legend>
	</div>
</div>

<div class = 'row-fluid'>

	<div class = 'span2 offset1'>

		<div class="control-group">
			<label class = 'control-label' for = 'lat'>Latitud</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-map-marker"></i></span>
					<?=form_input('lat',''," placeholder = '19.256' class = 'input-small' ")?>
				</div>
			</div>
			<br/>
			<label class = 'control-label' for = 'lng'>Longitud</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-map-marker"></i></span>
					<?=form_input('lng',''," placeholder = '-103.546' class = 'input-small' ")?>
				</div>
			</div>
		</div>
		<br/>
		<button type = 'submit' class = 'btn btn-large btn-primary'><i class = 'icon-ok icon-white'></i> Guardar</button>

	</div>

	<div class = 'span5'>
		<?=mapCanvas('','width:100%;height:400px;')?>
	</div>
</div>
<?=form_close()?>

<?=includeGMaps('AIzaSyBg15TH4AA_8DcvIbP8xyG9Z-CnqWwky0g')?>
<?=includeJs('gmaps')?>
<?=includeJs('loader')?>

<script type="text/javascript">
	$(function(){
		clientNew();
	});
</script>