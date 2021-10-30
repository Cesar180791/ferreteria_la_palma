<div>
  <style></style>
   <div class="row layout-top-spacing">
       <div class="col-sm-12 col-md-12" id="busqueda" wire:ignore.self>
             <!--busqueda de productos-->
           @include('livewire.compras.partials.search')
       </div>
       <div class="col-sm-12 col-md-8" id="detalle" wire:ignore.self>
             <!--Detalle de productos-->
           @include('livewire.compras.partials.detail')
       </div>
       <div class="col-sm-12 col-md-4" id="facturacion" wire:ignore.self>
            <!--total-->
           @include('livewire.compras.partials.total')
       </div>
   </div>
</div>
<script src="{{ asset('js/keypress.js') }}"></script>

@include('livewire.compras.scripts.shortcuts')
@include('livewire.compras.scripts.events')
@include('livewire.compras.scripts.general')