<?php
	echo includeCss('desktop/help');
?>

<style type="text/css">
.center{	
	border: #000 thin solid;
	background-color: #F1F1F1;
	border-color: #E5E5E5;
	margin-top: 10%;
	padding: 40px 20px 40px 70px;

}
</style>

<div class = 'row'>

	<div class = 'span3 offset5 center'>

		<div class = 'row-fluid'>

			<div class = 'span2'>
				<h4>Login</h4>
			</div>

			<div class = 'span2 offset6'>
				<h4>PI</h4>
			</div>

		</div>

		<br/>

		<?=form_open('session/login')?>

		<div class = 'row'>
			<div class = 'span1'>
				Usuario
			</div>
		</div>

		<div class = 'row'>
			<div class = 'span3'>
				<?=form_input('user','','placeholder="tony_stark";')?>
			</div>
		</div>

		<div class = 'row'>
			<div class = 'span1'>
				Contrase&ntilde;a
			</div>
		</div>

		<div class = 'row'>
			<div class = 'span3'>
				<?=form_password('password','','placeholder=" • • • • • •"')?>
			</div>
		</div>

		<br/>

		<div class = 'row'>
			<div class = 'span3' style="width:220px;">
				<?=form_submit('login_submit',"Login","class = 'btn btn-primary btn-large btn-block'")?>
			</div>
		</div>

		<?=form_close()?>


	</div>

</div>

<script type="text/javascript">
$("[name='user']").focus();
</script>

