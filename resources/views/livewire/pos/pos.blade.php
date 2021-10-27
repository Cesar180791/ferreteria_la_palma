<div>
   <style></style>
   <div class="row layout-top-spacing">
       <div class="col-sm-12 col-md-12" id="busqueda" wire:ignore.self>
             <!--busqueda de productos-->
           @include('livewire.pos.partials.search')
       </div>
       <div class="col-sm-12 col-md-9" id="detalle" wire:ignore.self>
             <!--Detalle de productos-->
           @include('livewire.pos.partials.detail')
       </div>
       <div class="col-sm-12 col-md-3" id="facturacion" wire:ignore.self>
            <!--total-->
           @include('livewire.pos.partials.total')

            <!--Denomination-->
           @include('livewire.pos.partials.denomination')
       </div>
   </div>
</div>

<script src="{{ asset('js/keypress.js') }}"></script>

@include('livewire.pos.scripts.shortcuts')
@include('livewire.pos.scripts.events')
@include('livewire.pos.scripts.general')

