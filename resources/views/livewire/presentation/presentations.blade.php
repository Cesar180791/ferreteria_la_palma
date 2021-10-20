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
                                <th class="table-th text-white">Presentaciones</th>
                                <th class="table-th text-white">Descripcion</th>
                                <th class="table-th text-white">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($presentations as $presentation)
                            <tr>
                                <td><h6>{{$presentation->name}}</h6></td>
                                <td><h6>{{$presentation->description}}</h6></td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" wire:click.prevent="Edit({{$presentation->id}})" class="btn btn-dark mtmobile" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="Confirm('{{$presentation->id}}' ,'{{$presentation->products->count()}}')"  title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$presentations->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.presentation.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
         window.livewire.on('presentation-added', msg=>{
            $('#theModal').modal('hide');
        });
        window.livewire.on('presentation-update', msg=>{
            $('#theModal').modal('hide');
        });
         window.livewire.on('presentation-deleted', msg=>{
            //notificacion
        });
         window.livewire.on('show-modal', msg=>{
            $('#theModal').modal('show');
        });
         window.livewire.on('modal-hide', msg=>{
            $('#theModal').modal('hide');
        });
         window.livewire.on('hidden.bs.modal', msg=>{
            $('.er').css('display','none')
        });
    });

     function Confirm(id, products){
        if (products >0){
            swal({
                type: 'error',
                 text: 'No se puede eliminar la presentación por que tiene productos asignados'})
            return;
        }
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