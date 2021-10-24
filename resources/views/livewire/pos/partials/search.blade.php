<div class="connect-sorting">
	<div class="connect-sorting-content">
		<div class="card simple-title-task ui-sortable-handle">
			<div class="card-body">
				<h6>Productos</h6>
				 @include('livewire.pos.partials.searchBox')
				<div class="table-responsive tblscroll" style="max-height: 650px; overflow: hidden;">
					<table class="table table-bordered table-striped mt-1">
						<thead class="text-white" style="background: #3B3F5C">
							<tr>
								<th class="table-th text-left text-white"><small>Producto</small></th>
								<th class="table-th text-left text-white"><small>Precio</small></th>
								<th width="10%" class="table-th text-left text-white"><small>Exis</small></th>
								<th width="10%" class="table-th text-left text-white"><small>Add</small></th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $item)
							<tr>
								<td><small>{{$item->name}}</small></td>
								<td><small>${{number_format($item->priceIVA,2)}}</small></td>
								<td><small>{{$item->quantity}}</small></td>
								<td class="text-center">
									<button onclick="Confirm('{{$item->id}}', 'removeItem', '¿Eliminar el Producto?')" 
									class="btn btn-success btn-sm mbmobile">
										<i class="fas fa-cart-plus"></i>
									</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					 {{$products->links()}}
				</div>
			</div>
		</div>
	</div>
</div>