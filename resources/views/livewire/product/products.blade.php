<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b style="font-size: 18px;">{{$componentName}} | {{$pageTitle}}</b>
                </h4>
                <ul class="tabs tab-pills">
                    <li style="list-style: none;">
                        <a href="javascript:void(0)" class="tabmenu btn bg-dark" data-toggle="modal" data-target="#theModal">Agregar</a>
                    </li>
                </ul>
            </div>
             @include('common.searchbox')
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background: #3B3F5C">
                            <tr>
                                <th class="table-th text-white text-center"><small>ID</small></th>
                                <th class="table-th text-white"><small>Producto</small></th>
                                <th class="table-th text-white text-center"><small>Presentacion</small></th>
                                <th class="table-th text-white text-center"><small>Costo Final</small></th>
                                <th class="table-th text-white text-center"><small>Precio Final</small></th>
                                <th class="table-th text-white text-center"><small>cant Stock</small></th>
                                <th class="table-th text-white text-center"><small>Clasificación</small></th>
                                <th class="table-th text-white text-center"><small>Acciones</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td><p class="text-center">{{$product-> id}}</p></td>
                                <td><p class="text-center">{{$product-> name}}</p></td>
                                <td><p class="text-center">{{$product-> presentation}}</p></td>
                                <td><p class="text-center">${{$product-> costIVA}}</p></td>
                                <td><p class="text-center">${{$product-> priceIVA}}</p></td>
                                <td><p class="text-center">{{$product-> quantity}}</p></td>
                                <td><p class="text-center">{{$product-> sub_category}}</p></td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-dark mtmobile" wire:click.prevent="Edit({{$product->id}})" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-danger"  onclick="Confirm('{{$product->id}}')"  title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
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
   @include('livewire.product.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
         window.livewire.on('product-added', msg=>{
            $('#theModal').modal('hide');
             swal({
             title: 'Producto Creado con Exito!',
             text: msg,
             type: 'success',
         })
        });
        window.livewire.on('product-update', msg=>{
            $('#theModal').modal('hide');
            swal({
             title: 'Producto Editado!',
             text: msg,
             type: 'success',
         })
        });
         window.livewire.on('product-deleted', msg=>{
            swal({
             title: 'Producto Eliminado!',
             text: msg,
             type: 'success',
         })
        });
         window.livewire.on('show-modal', msg=>{
            $('#theModal').modal('show');
        });
         window.livewire.on('modal-hide', msg=>{
            $('#theModal').modal('hide');
        });
    });



    function Confirm(id){
        swal({ 
            title: 'Confirmar',
            text: '¿Confirmas eliminar el registro?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar'

        }).then(function(result){
           if (result.value) {
            window.livewire.emit('deleteRow', id)
            swal.close() 
           } 
        })
    }
</script>