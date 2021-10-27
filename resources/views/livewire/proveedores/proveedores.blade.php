<div>
   <div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b style="font-size: 18px;">{{$componentName}} | {{$pageTitle}}</b>

                </h4>
                <ul class="tabs tab-pills">
                    <li style="list-style: none;">
                        <a href="javascript:void(0)" class="tabmenu btn bg-primary" data-toggle="modal" data-target="#theModal">Agregar</a>
                    </li>
                </ul>
            </div>
            @include('common.searchbox')
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background: #3B3F5C">
                            <tr>
                                <th class="table-th text-white">Proveedor</th>
                                <th class="table-th text-white">Telefono</th>
                                <th class="table-th text-white">Direccion</th>
                                <th class="table-th text-white">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($Proveedores as $proveedor)
                            <tr>
                                <td><h6>{{$proveedor->nombreProveedor}}</h6></td>
                                <td><h6>{{$proveedor->telefonoProveedor}}</h6></td>
                                <td><h6>{{$proveedor->direccionProveedor}}</h6></td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" wire:click.prevent="Edit({{$proveedor->id}})" class="btn btn-dark mtmobile" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="Confirm('{{$proveedor->id}}')" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                     {{$Proveedores->links()}}
                </div>
            </div>
        </div>
    </div>
       @include('livewire.proveedores.form')
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('show-modal', msg=>{
            $('#theModal').modal('show');
        });
        window.livewire.on('proveedor-added', msg=>{
            $('#theModal').modal('hide');
              swal({
             title: 'Agregado!',
             text: msg,
             type: 'success',
         })
        });
        window.livewire.on('proveedor-update', msg=>{
            $('#theModal').modal('hide');
              swal({
             title: 'Actualizado!',
             text: msg,
             type: 'success',
         })
        });
        window.livewire.on('category-delete', msg=>{
            swal({
             title: 'Eliminado!',
             text: msg,
             type: 'success',
         })
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