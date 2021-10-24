<div>
   <style></style>
   <div class="row layout-top-spacing">
       <div class="col-sm-12 col-md-4">
             <!--busqueda de productos-->
           @include('livewire.pos.partials.search')
       </div>
       <div class="col-sm-12 col-md-5">
             <!--Detalle de productos-->
           @include('livewire.pos.partials.detail')
       </div>
       <div class="col-sm-12 col-md-3">
            <!--total-->
           @include('livewire.pos.partials.total')

            <!--Denomination-->
           @include('livewire.pos.partials.denomination')
       </div>
   </div>
</div>

<script>
    
</script>
