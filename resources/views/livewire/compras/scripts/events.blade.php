<script>
	 document.addEventListener('DOMContentLoaded', function(){
         $('#busqueda').hide();

          $('#buscarbtn').on("click", function () {
                $('#busqueda').show();
                $('#detalle').hide();
                $('#facturacion').hide();
             });
          $('#cerrarbtn').on("click", function () {
                 $('#busqueda').hide();
                 $('#detalle').show();
                $('#facturacion').show();
             });

        window.livewire.on('producto-no-encontrado', msg=>{
            swal({
             title: 'Error',
             text: msg,
             type: 'warning',
         })
        });
        window.livewire.on('add-ok', msg=>{
            swal({
             title: 'Exito',
             text: msg,
             type: 'success',
         })
        });
         window.livewire.on('purchase-error', msg=>{
            swal({
             title: 'Error',
             text: msg,
             type: 'warning',
         })
        });
          window.livewire.on('purchase-ok', msg=>{
            swal({
             title: 'Exito',
             text: msg,
             type: 'success',
         })
        });
          window.livewire.on('print-ticket', msg=>{
          	window.open("print://"+saleId,'_blank')
        });
    });
</script>