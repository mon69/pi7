<div class = 'row'>
	<div class = 'span4 offset3'>
		<h2><?=$this->title?></h2>
	</div>
</div>

<br/><br/>

<?=form_open('user/sell/active')?>
	<div class = 'row'>
		<div class = 'span3 offset1 '>

			<label>Cliente</label>
			<?=form_dropdown( 'client' , $clients )?>

		</div>

		<div class = 'span3  '>

			<label>Producto</label>
			<?=form_input( 'product' , '' , ' placeholder = "" ; class = "input-xlarge" ' )?>

		</div>

		<div class = 'span3 '>

			<label>&nbsp;</label>
			<button
				class = 'btn btn-info'
				>
				Lista productos
			</button>

		</div>

	</div> <!-- row -->

	<div class = 'row'>
		<div class = 'span12 offset1'>

			<table class = 'table table-hover'>
				<thead>
					<tr>
						<th>Id</th>
						<th>Producto</th>
						<th>Marca</th>
						<th>Contenido</th>
						<th>Cantidad</th>
						<th>Precio unitario</th>
						<th>Precio subtotal</th>
					</tr>
				</thead>

				<tbody>
				</tbody>

				<tfoot>
					<tr>
						<td colspan='6' class = 'subtotal'>Subtotal</td>
						<td>$ 0.00</td>
					</tr>
					<tr>
						<td colspan='6' class = 'total'>Total</td>
						<td>$ 0.00</td>
					</tr>
				</tfoot>
			</table>

		</div>
	</div>
<?=form_close()?>

<script type="text/javascript">
	sellActive();
	var productos = <?=$products?>;
	console.log(productos);
</script>