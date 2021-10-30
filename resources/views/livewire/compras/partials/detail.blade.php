<div class="connect-sorting">
    <button class="btn btn-primary mbmobile mb-2" id="buscarbtn" wire:click.prevent="resetUI()">Buscar F1</button>
    <div class="connect-sorting-content">
        <div class="card simple-title-task ui-sortable-handle">
            <div class="card-body">
                <h6>Detalle de Compra</h6>
                
                <div class="table-responsive tblscroll" style="max-height: 650px; overflow: hidden;">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background: #3B3F5C">
                            <tr>
                                <th class="table-th text-center text-white">Eliminar</th>
                                <th class="table-th text-center text-white">Cantidad</th>
                                <th class="table-th text-white">Producto</th>
                                <th class="table-th text-center text-white">Costo</th>
                                <th class="table-th text-center text-white">C+IVA</th>
                                <th class="table-th text-center text-white">C+IVA*CANT</th>
                                <th class="table-th text-center text-white">P. Venta</th>
                                <th class="table-th text-center text-white">P. Venta + IVA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)

                            <tr>
                                <td>
                                    <button onclick="Confirm('{{$item->id}}', 'removeItem', '¿Eliminar el Producto?')" 
                                        class="btn btn-danger btn-sm mbmobile">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                </td>
                                <td>
                                    <input type="number" id="r{{$item->id}}"
                                        wire:change="updateCant({{$item->id}}, $('#r'+ {{$item->id}}).val() )"
                                        class="form-control text-center" value="{{$item->quantity}}">
                                </td>
                                <td>
                                    <p>{{$item->name}}</p>
                                </td>
                                <td>
                                    <input type="number" id="c{{$item->id}}"
                                        wire:change="updateCost({{$item->id}}, $('#c'+ {{$item->id}}).val() )"
                                        class="form-control text-center" value="{{$item->attributes[0]}}">
                                </td>
                                <td class="text-center">
                                    <p>
                                        ${{number_format($item->attributes[2],2)}}
                                    </p>
                                </td>
                                <td class="text-center">
                                    <p>
                                        ${{number_format($item->attributes[2] * $item->quantity,2)}}
                                    </p>
                                </td>

                                <td>
                                    <input type="number" id="p{{$item->id}}"
                                        wire:change="updatePrice({{$item->id}}, $('#p'+ {{$item->id}}).val() )"
                                        class="form-control text-center" value="{{$item->attributes[3]}}">
                                </td>
                                <td>
                                    <p>${{number_format($item->attributes[5],2)}}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            
                <h6 class="text-center text-muted">Agrega Productos al Detalle</h6>
               
                <div wire:loading.inline wire:target="saveSale">
                    <h6 class="text-danger text-center">Guardando venta...</h6>
                </div>
            </div>
        </div>
    </div>
</div>
