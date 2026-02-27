{{-- <!DOCTYPE html>



    <head>

    </head>
    <style type="text/css">
    td {background-color:#FFFFFF; font-weight:bold; font-family:courie prime; font-size:1Opx;font-weight:500;}
    .account {background-color:#EEEEEE; font-weight:bold; font-family:courie prime; color:#0066FF; font-size:12PX;}
    .titulo { letter-spacing:normal; text-align:center; background-color:#FF7F00; font-family:courie prime; color:#FFFFFF; font-weight:bold; font-size:12PX;}
    .cabecalho {background-color:#FFCC33; font-weight:bold; font-family:Verdana, Arial, Helvetica, sans-serif; color:#0066FF; font-size:12px;padding-left: 4px;padding-right: 4px;}
    .destaque {background-color:#FFFF99; font-family:courie prime; font-size:12PX; font-weight:bold;padding-left: 12PX;padding-right: 12PX;}
    .destaque_aux {background-color:#FFCC33; font-family:courie prime; font-size:12PX; font-weight:bold;padding-left: 12PX;padding-right: 12PX;}
    .corpo {background-color:#FFFFDD; font-family:courie prime; font-size:12PX;font-weight:500;padding-left: 12PX;padding-right: 12PX;}
    .uppercase {text-transform: uppercase;}
    div {left:43px; position:relative;}
    </style>
    <body bgcolor=#ffffff>


    <br><br>
    
    <table cellspacing="0" cellpadding="0" border="1" style="margin-left: 12PX">
      <tr>
            <td class="cabecalho" align="center">CLIENTE</td>
            <td class="cabecalho" align="center">PEDIDOS</td>
            <td class="cabecalho" align="center">TOTAL PARES</td>
            <td class="cabecalho" align="center">ULTIMO PEDIDO</td>
        </tr>

  <tr>
  </tr>

    @foreach ($topClientes as $item)
        <tr>
            <td class="corpo uppercase" align="left">{{ $item->name }}</td>
            <td class="corpo" align="center">{{ $item->total_pedidos  }}</td>
            <td class="corpo" align="center"> {{ $item->total_items  }}</td>
            <td class="corpo" align="center"> {{ \Carbon\Carbon::parse($item->ultimo_pedido)->format('d/m/Y') }}</td>
            </tr>
            <tr>
        </tr>
    @endforeach
    
    <tr>
        <td class="destaque" colspan="2" align="right">TOTAL </td>
        <td class="destaque" align="center"><?php echo $totalQuantidade; ?></td>
    </tr>

</table>


</body>

</html> --}}


<!DOCTYPE html>

<?php
$totalQuantidade = 0;
$totalPedidos = 0;

foreach ($topClientes as $item) {
    $totalQuantidade += $item->total_items;
    $totalPedidos += $item->total_pedidos;
}
?>

<html>
    <head>
        {{--<title>| </title>--}}
    </head>
    <style type="text/css">
        td {background-color:#FFFFFF; font-weight:bold; font-family:courie prime; font-size:1Opx;font-weight:500;}
        .account {background-color:#EEEEEE; font-weight:bold; font-family:courie prime; color:#0066FF; font-size:12PX;}
        .titulo { letter-spacing:normal; text-align:center; background-color:#FF7F00; font-family:courie prime; color:#FFFFFF; font-weight:bold; font-size:12PX;}
        .cabecalho {background-color:#FFCC33; font-weight:bold; font-family:Verdana, Arial, Helvetica, sans-serif; color:#0066FF; font-size:12px;padding-left: 4px;padding-right: 4px;}
        .destaque {background-color:#FFFF99; font-family:courie prime; font-size:12PX; font-weight:bold;padding-left: 12PX;padding-right: 12PX;}
        .destaque_aux {background-color:#FFCC33; font-family:courie prime; font-size:12PX; font-weight:bold;padding-left: 12PX;padding-right: 12PX;}
        .corpo {background-color:#FFFFDD; font-family:courie prime; font-size:12PX;font-weight:500;padding-left: 12PX;padding-right: 12PX;}
        .uppercase {text-transform: uppercase;}
        div {left:43px; position:relative;}
    </style>
    <body bgcolor=#ffffff>
    
    <br><br>
    
    <table cellspacing="0" cellpadding="0" border="1" style="margin-left: 12PX">
        <tr>
            <td class="cabecalho" align="center">CLIENTE</td>
            <td class="cabecalho" align="center">PEDIDOS</td>
            <td class="cabecalho" align="center">TOTAL PARES</td>
            <td class="cabecalho" align="center">ULTIMO PEDIDO</td>
        </tr>

        <tr>
        </tr>

        @foreach ($topClientes as $item)
            <tr>
                <td class="corpo uppercase" align="left">{{ $item->name }}</td>
                <td class="corpo" align="center">{{ $item->total_pedidos }}</td>
                <td class="corpo" align="center">{{ $item->total_items }}</td>
                <td class="corpo" align="center">{{ \Carbon\Carbon::parse($item->ultimo_pedido)->format('d/m/Y') }}</td>
            </tr>
            <tr>
            </tr>
        @endforeach
    
        <tr>
            <td class="destaque" colspan="1" align="right">TOTAL PEDIDOS</td>
            <td class="destaque" align="center">{{ $totalPedidos }}</td>
            <td class="destaque" colspan="1" align="right">TOTAL PARES</td>
            <td class="destaque" align="center">{{ $totalQuantidade }}</td>
        </tr>

    </table>

    </body>
</html>