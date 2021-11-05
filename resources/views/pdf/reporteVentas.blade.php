<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reporte de Ventas</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/custom_pdf.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/custom_page.css') }}">
</head>
<body>
	<section class="header" style="top: -287px;">
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td colspan="2" class="text-center">
					<span style="font-size: 25px; font-weight: bold;">Ferreteria la Palma</span>
				</td>
			</tr>
			<br><br><br><br>
			<tr>
				<td width="30%" style="vertical-align: top; padding-top: 10px; position: relative;">
					 <img src="{{ asset('assets/img/logoF.png') }}" class="invoice-logo" alt="logo">
				</td>
				<td width="70%" class="text-left text-company" style="vertical-align: top; padding-top: 10px">
					@if($reportType == 0)
					<span style="font-size: 16px"><strong>Reporte de Venta del Dia</strong></span>
					@else
					<span style="font-size: 16px"><strong>Reporte de Venta por Fechas</strong></span>
					@endif
					<br>
					@if($reportType != 0)
					<span style="font-size: 16px"><strong>Fecha de Consulta: {{$dateFrom}} al {{$dateTo}}</strong></span>
					@else
					<span style="font-size: 16px"><strong>Fecha de Consulta: {{ \Carbon\Carbon::now('America/El_Salvador')->format('d-M-Y')}}</strong></span>
					@endif
					<br>
					<span style="font-size:14px">Usuario: {{$user}}</span>
				</td><br><br>
			</tr>
		</table>
	</section>
<br><br><br>
	<section style="margin-top: -110px;">
		<table cellpadding="0" cellspacing="0" class="table-items" width="100%">
			<thead>
				<tr>
					<th width="10%">Folio</th>
					<th width="12%">Importe</th>
					<th width="10%">Items</th>
					<th>Usuario</th>	
					<th width="18%">Fecha</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $item)
				<tr>
					<td align="center">{{$item->id}}</td>
					<td align="center">{{number_format($item->total,2)}}</td>
					<td align="center">{{$item->items}}</td>
					<td align="center">{{$item->user}}</td>
					<td align="center">{{$item->created_at}}</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<td class="text-center">
						<span><b>Total</b></span>
					</td>
					<td colspan="1" class="text-center">
						<span><strong>${{number_format($data->sum('total'),2)}}</strong></span>
					</td>
					<td class="text-center">
						{{$data->sum('items')}}
					</td>
					<td colspan="2"></td>
				</tr>
			</tfoot>
		</table>
	</section>
	<section class="footer">
		<table cellpadding="0" cellspacing="0" class="table-items" width="100%">
			<tr>
				<td width="20%">
					<span>Sistema de Ventas V1</span>
				</td>
				<td width="60%" class="text-center">
					<span>Ferreteria la Palma</span>
				</td>
				<td width="20%" class="text-center">
					pagina <span class="pagenum"></span>
				</td>
			</tr>
		</table>
	</section>
</body>
</html>