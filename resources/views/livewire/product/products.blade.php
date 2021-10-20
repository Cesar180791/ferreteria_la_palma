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
                                <th class="table-th text-white">Producto</th>
                                <th class="table-th text-white">Codigo</th>
                                <th class="table-th text-white">Costo</th>
                                <th class="table-th text-white">Precio Venta</th>
                                <th class="table-th text-white">Presentacion</th>
                                <th class="table-th text-white">Clasificación</th>
                                <th class="table-th text-white">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td><h6>{{$product-> name}}</h6></td>
                                <td><h6>{{$product-> barCode}}</h6></td>
                                <td><h6>{{$product-> cost}}</h6></td>
                                <td><h6>{{$product-> price}}</h6></td>
                                <td><h6>{{$product-> presentation}}</h6></td>
                                <td><h6>{{$product-> sub_category}}</h6></td>
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
        });
        window.livewire.on('product-update', msg=>{
            $('#theModal').modal('hide');
        });
         window.livewire.on('product-deleted', msg=>{
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
</script>