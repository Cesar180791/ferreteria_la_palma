<div wire:ignore.self class="modal fade" id="modalDetails" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background: #3B3F5C">
          <h5 class="modal-title text-white">
              <b>Detalle de Venta # {{$saleId}}</b>
          </h5>
          <h6 class="text-center text-warning" wire:loading>Por Favor Espere</h6>
        </div>
        <div class="modal-body">
  
          <div class="table-responsive">
                      <table class="table table-bordered table-striped mt-1">
                          <thead class="text-white" style="background: #3B3F5C">
                              <tr>
                                  <th class="table-th text-white text-center">Folio</th>
                                  <th class="table-th text-white text-center">Producto</th>
                                  <th class="table-th text-white text-center">Costo</th>
                                  <th class="table-th text-white text-center">Costo + IVA</th>
                                  <th class="table-th text-white text-center">Cant</th>
                                  <th class="table-th text-white text-center">Total</th>
                                  <th class="table-th text-white text-center">Total + IVA</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($details as $d)
                              <tr>
                                  <td class="text-center"><h6>{{$d->id}}</h6></td>
                                  <td class="text-center"><h6>{{$d->product}}</h6></td>
                                  <td class="text-center"><h6>${{number_format($d->cost,2)}}</h6></td>
                                  <td class="text-center"><h6>${{number_format($d->costIVA,2)}}</h6></td>
                                  <td class="text-center"><h6>{{number_format($d->quantity,0)}}</h6></td>
                                  <td class="text-center"><h6>${{number_format($d->cost * $d->quantity,2)}}</h6></td>
                                  <td class="text-center"><h6>${{number_format($d->costIVA * $d->quantity,2)}}</h6></td>
                              </tr>
                              @endforeach
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="4"> <h6 class="text-center font-weight-bold">Sub Total</h6></td>
                              <td><h7 class="text-center">{{$countDetails}} Items</h7></td>
                              <td><h7 class="text-center">${{number_format($sumDetails,2)}}</h7></td>
                            </tr>

                            <tr>
                              <td colspan="5"> <h6 class="text-center font-weight-bold">IVA</h6></td>
                              <td><h7 class="text-center">${{number_format($IVACost,2)}}</h7></td>
                            </tr>
                            <tr>
                              <td colspan="5"> <h6 class="text-center font-weight-bold">Total</h6></td>
                              <td><h7 class="text-center">${{number_format($total,2)}}</h7></td>
                            </tr>
          
                          </tfoot>
                      </table>
                  </div>
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark close-btn text-info" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>