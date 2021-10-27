<div class="connect-sorting">
	<button class="btn btn-primary mbmobile mb-2" id="buscarbtn" wire:click.prevent="resetUI()">Buscar F1</button>
	<div class="connect-sorting-content">
		<div class="card simple-title-task ui-sortable-handle">
			<div class="card-body">
				<h6>Detalle</h6>
				@if($total > 0)
				<div class="table-responsive tblscroll" style="max-height: 650px; overflow: hidden;">
					<table class="table table-bordered table-striped mt-1">
						<thead class="text-white" style="background: #3B3F5C">
							<tr>
								<th class="table-th text-left text-white"><small>Producto</small></th>
								<th class="table-th text-left text-white"><small>Precio</small></th>
								<th width="20%" class="table-th text-left text-white"><small>Cant</small></th>
								<th class="table-th text-left text-white"><small>Importe</small></th>
								<th class="table-th text-left text-white"><small>Acciones</small></th>
							</tr>
						</thead>
						<tbody>
							@foreach($cart as $item)
							<tr>
								<td><h6>{{$item->name}}</h6></td>
								<td><h6>${{number_format($item->price,2)}}</h6></td>
								<td>
									<input type="number" id="r{{$item->id}}" 
									wire:change="updateQty({{$item->id}}, $('#r'+ {{$item->id}}).val() )"
									class="form-control text-center" 
									value="{{$item->quantity}}"
									>
								</td>
								<td class="text-center">
									<h6>
										${{number_format($item->price * $item->quantity,2)}}
									</h6>
								</td>
								<td class="text-center">
									<button onclick="Confirm('{{$item->id}}', 'removeItem', '¿Eliminar el Producto?')" 
									class="btn btn-danger btn-sm mbmobile">
										<i class="fas fa-trash-alt"></i>
									</button>
									<button wire:click.prevent="decreaseQty({{$item->id}})"
									class="btn btn-success btn-sm">
										<i class="fas fa-minus"></i>
									</button>
									<button wire:click.prevent="increaseQty({{$item->id}})"
									class="btn btn-success btn-sm">
										<i class="fas fa-plus"></i>
									</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@else
				<h6 class="text-center text-muted">Agrega Productos al Detalle</h6>
				@endif
				<div wire:loading.inline wire:target="saveSale">
					<h6 class="text-danger text-center">Guardando venta...</h6>
				</div>
			</div>
		</div>
	</div>
</div>