<div>
    <div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b style="font-size: 18px;">{{$componentName}} | {{$PageTitle}}</b>
                </h4>
            </div>
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background: #3B3F5C">
                            <tr>
                                <th class="table-th text-white">Valor</th>
                                <th class="table-th text-white">Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($demonimations as $demonimation)
                            <tr>
                                <td><h6>${{$demonimation->value}}</h6></td>
                                <td><h6>{{$demonimation->type}}</h6></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$demonimations->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
