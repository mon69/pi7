<?//=dump($routes)?>
<div class = 'row'>
	<div class = 'span4 offset3'>
		<h2><?=$this->title?></h2>
	</div>
</div>

<br/><br/>

<div class = 'row'>

	<div class = 'span6 offset1'>
		<h4>Nombre de ruta</h4>
		<?=form_input('nombreRuta','',"class = 'input-xxlarge'")?>
	</div>

</div>

<br/>

<div class = 'row'>
	<div class = 'span12 offset1'>
		<legend>Clientes de ruta</legend>
	</div>
</div>
<br/>

<div class = 'row'>

	<div class = 'span6 offset1'>

		<h4>Clientes</h4>
		<?=form_dropdown('client',$clients);?>
		<?=nbs(3);?>
		<button
			class = 'btn btn-primary'
			onclick = "addClientRoute()"
		>
			Agregar
		</button>

		<br><br><br>
		<button class = 'btn btn-success btn-large'>Guardar</button>
	</div>



	<div class = 'span5 offset1'>

		<table id = 'data' class = 'table table-hover' >

			<thead>
				<tr>
					<th>
						<h4>Id</h4>
					</th>
					<th>
						<h4>Cliente</h4>
					</th>
					<th></th>
				</tr>
			</thead>

			<tbody>

				<tr>
					<td>
						1
					</td>
					<td>
						Enrique Alejandro Amezcua Zuniga
					</td>
					<td>
						<button 
							class = 'btn btn-small btn-danger'
							onclick = "deleteNode('1');"
						>
							&times;
						</button>
					</td>
				</tr>

			</tbody>

		</table>

	</div>

</div>


<style type="text/css">
	.table thead tr th{
		text-align:center;
	}
</style>

<?=includeJs('jquery.tablednd')?>

<script type="text/javascript">
	$(function(){
		newRoute();
	});
</script>
