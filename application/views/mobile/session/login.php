<?=form_open("session/login")?>
			
	<div data-role = "fieldcontain" >
		<label for = "user" > Usuario </label>
		<?=form_input('user')?>
	</div>

	<div data-role = "fieldcontain" >
		<label for = "password"> Contrase&ntilde;a </label>
		<?=form_password()?>
	</div>

	<?=form_submit("submit","Entrar")?>

<?=form_close();?>