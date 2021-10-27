<div class="connect-sorting" wire:ignore.self>
	<button class="btn btn-primary mbmobile mb-2" id="cerrarbtn">Cerrar ESC</button>
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
								<td><h6>{{$item->name}}</h6></td>
								<td><h6>${{number_format($item->priceIVA,2)}}</h6></td>
								<td><h6>{{$item->quantity}}</h6></td>
								<td class="text-center">
									<button href="javascript:void(0)"
                                    wire:click.prevent="$emit('add-item',{{$item->id}})"
                                    class="btn btn-success mtmobile btn-sm" title="Edit">
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