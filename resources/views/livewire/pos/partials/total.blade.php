<div class="row">
	<div class="col-sm-12">
		<div>
			 <div class="connect-sorting">
			 	<p class="text-center mb-3">Resumen de Venta</p>
			 	<div class="connect-sorting-content">
			 		<div class="card simple-title-task ui-sortable-handle">
			 			<div class="card-body">
			 				<div class="task-header">
			 					<div>
			 						<h4>Total: ${{number_format($total,2)}}</h4>
			 						<input type="hidden" id="hiddenTotal" value="{{$total}}">
			 						<h6 class="text-muted">Cambio: ${{number_format($change,2)}}</h6>
			 					</div>
			 					<div>
			 						<h5 class="mt-3">Articulos: {{$itemsQuantity}}</h5>
			 					</div>
			 				</div>
			 			</div>
			 		</div>
			 	</div>
			 </div>
		</div>
	</div>
</div>