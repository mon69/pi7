<div class = 'row'>
	<div class = 'span4 offset3'>
		<h2><?=$this->title?></h2>
	</div>
</div>

<br/><br/>

<?=form_open('user/sell/index')?>
	<div class = 'row'>
		<div class = 'span4 offset2 '>

			<div class = 'row'>

				<div class = 'span4 '>
					<label>Ingrese contrase&ntilde;a</label>
					<div class = 'control-group'>
						<div class = 'input-prepend'>
							<span class = 'add-on'><i class = 'icon-user'></i></span>
							<?=form_password( 'password' , '' , 'placeholder=" • • • • • •" ; class = "input-large" ' )?>
						</div>
					</div>
				</div>

			</div>
			<br/>
			<div class = 'row'>

				<div class = 'span3'>
					<button class = 'btn btn-primary btn-large btn-block'>Empezar venta</button>
				</div>

			</div>

		</div>

		<div class = 'span2 offset1 menu' >

			<div class ='row'>
				<div class = 'span2'>
					<button 
						type = 'button' 
						class = 'btn btn-primary btn-block btn-large' 
						<?=( !array_key_exists(3, $permissions[$screen]) ) ? " disabled = 'disabled' " : " " ?>
						<?=clickHref('user/clients/lists')?>
					>
						<i class = 'icon-th-large icon-white'></i><?=nbs(3)?>Historial
					</button>
				</div>
			</div>

		</div>

	</div> <!-- row -->
<?=form_close()?>

<script type="text/javascript">
	$(function(){
		sellIndex();
	});
</script>
