<div class = 'row'>
	<div class = 'span4 offset3'>
		<h2><?=$this->title?></h2>
	</div>
</div>
<br/><br/>

<?=form_open('user/sell/active/'.$clientName)?>
	<div class = 'row'>
		<div class = 'span3 offset1 '>

			<label>Cliente</label>
			<?=form_dropdown( 'client' , $clients , $clientName )?>

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
					<?php
						$total_venta = 0;
						if ($venta != null) {
							
							
							foreach ($venta as $key => $venta_producto):
								$total_venta += $venta_producto->cantidad * $venta_producto->precio;
						?>
							<tr>
								<td><?=$venta_producto->id?></td>
								<td><?=$venta_producto->producto?></td>
								<td><?=$venta_producto->marca?></td>
								<td><?=$venta_producto->contenido?></td>
								<td><?=$venta_producto->cantidad?></td>
								<td><?=$venta_producto->precio?></td>
								<td>$ <?=$venta_producto->cantidad * $venta_producto->precio?></td>
							</tr>
						<?php endforeach;}?>
				</tbody>

				<tfoot>
					<!-- <tr>
						<td colspan='6' class = 'subtotal'>Subtotal</td>
						<td>$ 0.00</td>
					</tr> -->
					<tr>
						<td colspan='6' class = 'total'>Total</td>
						<td>$ <?=$total_venta?></td>
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