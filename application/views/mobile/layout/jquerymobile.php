<?php
	echo doctype('html5');
	echo "<meta charset='UTF-8'>";

	echo includeJquery();
	echo includeJqueryMobileCss();
	echo includeJqueryMobileJs();
	

?>

<div data-role="page">

	<div data-role = "header">
		<h1><?=$this->title?></h1>
	</div>

	<div data-role = "content">
		<?=$output?>
	</div>

	<div data-role = "footer">
		<h4><?=$this->footer?></h4>
	</div>

</div>