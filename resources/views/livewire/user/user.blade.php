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
                        <a href="javascript:void(0)" class="tabmenu btn bg-dark" data-toggle="modal" data-target="#theModal">Agregar</a>
                    </li>
                </ul>
            </div>
             @include('common.searchbox')
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background: #1B4F72;">
                            <tr>
                                <th class="table-th text-white text-center">Nombre</th>
                                <th class="table-th text-white text-center">Telefono</th>
                                <th class="table-th text-white text-center">Correo</th>
                                <th class="table-th text-white text-center">Dui</th>
                                <!--<th class="table-th text-white text-center">Estado</th>-->
                                <th class="table-th text-white text-center">Rol</th>
                                <th class="table-th text-white text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $r)
                            <tr>
                                <td class="text-center"><h6>{{$r->name}}</h6></td>
                                <td class="text-center"><h6>{{$r->phone}}</h6></td>
                                <td class="text-center"><h6>{{$r->email}}</h6></td>
                                <td class="text-center"><h6>{{$r->dui}}</h6></td>
                                <!--<td class="text-center">
                                    <span class="badge {{$r->status == 'Active' ? 'badge-success' : 'badge-danger'}} text-uppercase">{{$r->status}}</span>
                                </td>-->
                                <td><h6 class="text-center">{{$r->profile}}</h6></td>
                                <td class="text-center">
                                      <a href="javascript:void(0)" class="btn btn-dark mtmobile btn-sm" wire:click="Edit({{$r->id}})" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm"  onclick="Confirm('{{$r->id}}')" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                  {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
     @include('livewire.user.form')
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
         window.livewire.on('user-add', msg=>{
             $('#theModal').modal('hide');
        swal({
            title: 'Exito',
            text: msg,
            type: 'success',
        })

        });
          window.livewire.on('user-sale', msg=>{
        swal({
            title: 'Advertencia',
            text: msg,
            type: 'warning',
        })

        });
        window.livewire.on('user-update', msg=>{
            $('#theModal').modal('hide');
        });
          window.livewire.on('user-deleted', msg=>{
            $('#theModal').modal('hide');
        });
            window.livewire.on('hide-modal', msg=>{
            $('#theModal').modal('hide');
        });
        window.livewire.on('show-modal', msg=>{
            $('#theModal').modal('show');
        });
        window.livewire.on('user-withsales', msg=>{
         //notificacion para alertar de ticket relacionados
        });
        
    });

    function Confirm(id){
        swal({
            title: 'Confirmar',
            text: '??Confirmas eliminar el rubro?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar'

        }).then(function(result){
           if (result.value) {
            window.livewire.emit('deleteRows', id)
             swal("usuario Eliminado!", "usuario Eliminado Exitosamente", "success");
           } 
        })
    }
</script>