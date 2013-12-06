<?php

	//
	//	 INCLUDES
	//

	echo doctype('html5');
	echo "<meta charset='UTF-8'>";



	//
	//	 INCLUDES
	//

	if ( isset( $alert ) ){
		echo $alert;
	}

	echo includeJquery();
	echo includeBootstrap();
	echo includeBootstrapResponsive();
	echo includeBootstrapJs();

	// echo includeJs('layout');
	
	echo includeCss('desktop/jquery.sidr.dark');
	echo includeCss('desktop/help');

	echo $output;
	echo br(2);
	
?>
