<div class = 'row-fluid'>
	<div class = 'span4 offset3'><h2><?=$this->title?></h2></div>
</div>

<br/>

<?=form_open('user/inventory/newProduct')?>
<div class = 'row-fluid'>
	<div class = 'span4 offset1'>

		<legend>Nuevo</legend>

		<div class="control-group">
			<label class = 'control-label' for = 'txt_marca'>Marca</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<?=form_input('txt_marca',''," placeholder = 'Sabritas' class = 'input-xxlarge' ")?>
				</div>
			</div>
		</div>

		<div class="control-group">
			<label class = 'control-label' for = 'txt_nombre'>Nombre</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<?=form_input('txt_nombre',''," placeholder = 'Doritos' class = 'input-xxlarge' ")?>
				</div>
			</div>
		</div>

		<div class="control-group">
			<label class = 'control-label' for = 'txt_categoria'>Categoria</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<?=form_input('txt_categoria',''," placeholder = 'Basicos' class = 'input-xxlarge' ")?>
				</div>
			</div>
		</div>

		<!--
			<div class="image-upload" >
				<label for="file-input">
					<?//=image("camera","png", "max-width:100px;")?>
				</label>
				<input id="file-input" name="txt_photo" type="file" accept="image/*" capture="camera">
			</div>
		-->

		<div class="control-group">
			<label class = 'control-label' for = 'txt_contenido'>Cantidad</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<?=form_input('txt_contenido',''," placeholder = '300g' class = 'input-xxlarge' ")?>
				</div>
			</div>
		</div>

		<div class="control-group">
			<label class = 'control-label' for = 'txt_precio'>Precio</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<?=form_input('txt_precio',''," placeholder = '$300' class = 'input-xxlarge' ")?>
				</div>
			</div>
		</div>

		<button type = 'submit' class = 'btn btn-primary'><i class = 'icon-ok icon-white'></i> Guardar</button>
		
	</div>
</div>