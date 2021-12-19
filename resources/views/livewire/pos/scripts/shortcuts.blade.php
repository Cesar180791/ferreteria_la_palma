<script>
	var listener = new window.keypress.Listener();

	listener.simple_combo("f5", function(){
		livewire.emit('saveSale')
	})

	listener.simple_combo("f3", function(){
		document.getElementById('cash').value = ''
		document.getElementById('cash').focus()
		document.getElementById('hiddenTotal').value = ''

	})

	listener.simple_combo("f2", function(){
		var total = parseFloat(document.getElementById('hiddenTotal').value)
		if (total > 0){
			Confirm(0,'clearCart','¿Seguro de eliminar el detalle de venta?')
		} else{
			 swal({
             title: 'Advertencia',
             text: 'Agrega Productos a la Transaccion',
             type: 'warning',
         })
		}
	})
	listener.simple_combo("f1", function(){
            $('#busqueda').show();
            $('#detalle').hide();
            $('#facturacion').hide();
            document.getElementById('buscarProducto').focus()
            
	})
	listener.simple_combo("esc", function(){
          $('#busqueda').hide();
          $('#detalle').show();
          $('#facturacion').show();
          livewire.emit('reset')
	})
	
</script>