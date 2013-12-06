<?php

	//
	//	 INCLUDES
	//

	echo doctype('html5');
	echo "<meta charset='UTF-8'>";

	echo "<title>{$this->title}</title>";

	//
	//	 INCLUDES
	//

	if ( isset( $alert ) ){
		echo $alert;
	}

?>

<div class = 'row-fluid' >	
	<div class = 'pull-right'>
		<a id="right-menu" class = 'btn btn-large' href="#"><i class = 'icon-align-justify'></i></a> 
	</div>

	<div class = 'pull-left'>
		<a id="left-menu" class = 'btn btn-large' href="#"><i class = 'icon-align-justify'></i></a>
		<?php
			if ($this->goBackUrl != ""){
				echo nbs(5) . anchor($this->goBackUrl,'<i class="icon-arrow-left icon-white"></i>', " class = 'btn btn-large btn-primary' ");
			}
		?> 
	</div>


</div>

<div id="sidr-left">
	
	<div class = 'row-fluid'>
		<div class = 'span6'>
			<div style = 'margin:10px;padding:5px;border: #4d4d4d thin solid;'>
				<?=image('users/kike','png','width:100px;heigth:100px;')?>
			</div>
		</div>
		<br/><br/>
		<div class = 'span4 sidr-username'>
			<?=$this->session->userdata('user')?>
		</div>
	</div>

	<div class = 'row'>
		<div class = "span3 bggreydark">
			<h2>PANTALLAS</h2>
		</div>
	</div>

	<div class = 'row'>
		<div class = 'span3'>
			<ul>
			<?php
				echo "<li>" . anchor( 'user/router/go/Welcome', "<i class = 'icon-home icon-white'></i>&nbsp;&nbsp;Inicio" ) . "</li>";

				foreach ($this->session->userdata('permission') as $perm):
					
					if ( $perm[0] == 'Clientes' ) {
						echo "<li>" . anchor( "user/router/go/{$perm[0]}", "<i class = 'icon-user icon-white'></i>&nbsp;&nbsp;{$perm[0]}" ) . "</li>";
					}

					if ( $perm[0] == 'Inventario' ) {
						echo "<li>" . anchor( "user/router/go/{$perm[0]}", "<i class = 'icon-th-list icon-white'></i>&nbsp;&nbsp;{$perm[0]}" ) . "</li>";
					}

					if ( $perm[0] == 'Venta' ) {
						echo "<li>" . anchor( "user/router/go/{$perm[0]}", "<i class = 'icon-list-alt icon-white'></i>&nbsp;&nbsp;{$perm[0]}" ) . "</li>";
					}

					if ( $perm[0] == 'Cobro' ) {
						echo "<li>" . anchor( "user/router/go/{$perm[0]}", "<i class = 'icon-list-alt icon-white'></i>&nbsp;&nbsp;{$perm[0]}" ) . "</li>";
					}

					if ( $perm[0] == 'Rutas' ) {
						echo "<li>" . anchor( "user/router/go/{$perm[0]}", "<i class = 'icon-road icon-white'></i>&nbsp;&nbsp;{$perm[0]}" ) . "</li>";
					}

					if ( $perm[0] == 'Reportes' ) {
						echo "<li>" . anchor( "user/router/go/{$perm[0]}", "<i class = 'icon-edit icon-white'></i>&nbsp;&nbsp;{$perm[0]}" ) . "</li>";
					}

					if ( $perm[0] == 'Permisos' ) {
						echo "<li>" . anchor( "user/router/go/{$perm[0]}", "<i class = 'icon-eye-open icon-white'></i>&nbsp;&nbsp;{$perm[0]}" ) . "</li>";
					}

					if ( $perm[0] == 'Usuarios' ) {
						echo "<li>" . anchor( "user/router/go/{$perm[0]}", "<i class = 'icon-user icon-white'></i>&nbsp;&nbsp;{$perm[0]}" ) . "</li>";
					}
					
				endforeach;
			?>
			</ul>
		</div>
	</div>

	<div class = 'row'>
		<div class = 'span3'>
			<h2>Perfil</h2>
			<ul>
				<?="<li>" . anchor( 'session/login', "<i class = 'icon-pencil icon-white'></i>&nbsp;&nbsp;Editar perfil" ) . "</li>";?>
				<?="<li>" . anchor( 'session/logout', "<i class = 'icon-off icon-white'></i>&nbsp;&nbsp;Cerrar sesi&oacute;n" ) . "</li>";?>
			</ul>
		</div>
	</div>

	

</div>



<?php


	echo includeJquery();
	echo includeBootstrap();
	echo includeBootstrapResponsive();
	echo includeBootstrapJs();

	echo includeJs('loader');
	echo includeJs('util');
	echo includeJsBaseUrl();
	
	echo includeCss('desktop/jquery.sidr.dark');
	echo includeCss('desktop/help');
	echo includeJs('jquery.sidr.min');
	echo includeJs('loader');
	
	//// VIEW OUTPUT
	//
	echo $output;
	//
	////
	
	echo br(2);
?>

<script type="text/javascript">
	$(function(){
		layout(<?=$this->sidebar?>);
	});
</script>