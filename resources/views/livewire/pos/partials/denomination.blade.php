<div class="row mt-2">
	<div class="col-sm-12">
		<div class="connect-sorting">
			<p class="text-center mb-2">Denominaciones</p>
			<div class="container">
				<div class="row">
					@foreach($denominations as $d)
					<div class="col-sm mt-2">
						<button wire:click.prevent="Acash({{$d->value}})" class="btn btn-success btn-sm btn-block den">
							{{ $d->value > 0 ? '$'. number_format($d->value,2, '.','') : 'Exacto' }}
						</button>
					</div>
					@endforeach
				</div>
			</div>
			<div class="connect-sorting-content mt-3">
				<div class="card simple-title-task ui-sortable-handle">
					<div class="card-body">
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text input-gp hideonsm" style="background: #3B3F5C; color: white;">Efec F3
								</span>
							</div>
							<input type="number" id="cash" wire:model="efectivo"
							wire:keydown.enter="saveSale" class="form-control text-center" value="{{$efectivo}}">
							<div class="input-group-append">
								<span wire:click="$set('efectivo', 0)" class="input-group-text" style="background: #3B3F5C; color:white">
									<i class="fas fa-backspace"></i>
								</span>
							</div>
						</div>
						<p class="text-muted">Cambio: ${{number_format($change,2)}}</p>
						<div class="row justify-content-between mt-3">
							<div class="col-sm-12 col-md-12 col-lg-6">
								@if($total > 0)
								<button onclick="Confirm('','clearCart','¿Seguro de eliminar el detalle de venta?')" class="btn btn-dark mtmobile btn-sm">
									CANCELAR F2
								</button>
								@endif
							</div>
							<div class="col-sm-12 col-md-12 col-lg-6">
								@if($efectivo >= $total && $total > 0)
								<button wire:click.prevent="saveSale" class="btn btn-dark btn-sm btn-block">
									GUARDAR F9
								</button>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>