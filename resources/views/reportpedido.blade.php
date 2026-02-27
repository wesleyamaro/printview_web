<!DOCTYPE html>

{{--
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        .title{
            font: 800;
            font-size: 20px;
            color: blue;
        }
        .w-full {
            width: 100%;
        }
        .flex {
            display: flex;
        }
        .justify-between {
            justify-content: space-between;
        }
        
        .flex-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .flex-container h3 {
            margin: 0; /* Remover margens padrão dos h3 */
        }


    </style>
</head>
<body>
    <div>
        @foreach ($pedidos as $pedido)
        <div class="w-full">
            <h1 class="title">Pedido: #{{ $pedido->id }}</h1>
        </div>

        <p>Nº Modelo: {{ $pedido->pedido_modelo }}</p>

        <div class="flex-container">
            <h3>Cliente: {{ $pedido->usuario->name }}</h3>
            <h3>Marca:<span> {{ $pedido->marca }}</span></h3>
        </div>

        <p>Observação: {{ $pedido->observacao }}</p>
       
        
        <!-- Exibir outros campos do pedido -->

        <h3>Itens do Pedido</h3>
        <ul>
            @foreach ($pedido->itemPedidos as $item)
                <li>
                    {{  $item->produto->referencia }} - Quantidade: {{ $item->quantidade }}
                    <hr>
                </li>              
            @endforeach
        </ul>
    @endforeach
    </div>
</body>
</html>

--}}


<?php
$totalQuantidade = 0;

foreach ($pedidos as $pedido) {
    foreach ($pedido->itemPedidos as $item) {
        $totalQuantidade += $item->quantidade;
    }
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
    .hidden {display: none;}
    .block {display: block;}
    </style>
    <body bgcolor=#ffffff>
        
        

    @foreach ($pedidos as $pedido)

    {{-- <table cellspacing="0" cellpadding="0" border="0" style="margin-left: 12PX" width="500"> --}}
    <table cellspacing="0" cellpadding="0" border="1" style="margin-left: 12PX">
      <tr>
        <td class="account" align="left" colspan="2">MAPAS ANO - {{ now()->format('Y') }}</td>
      </tr>
      <tr>
        <td class="account uppercase" align="left">
            <NOBR>
            CLIENTE: {{ $pedido->usuario->name }}
            {{-- <BR>PEDIDO: {{ $pedido->pedido_modelo }} --}}
             <BR>PEDIDO: {{'#'. $pedido->id .' - ' .$pedido->pedido_modelo }}
            </NOBR>
        </td>
        <td width="70" class="account" align="center">
            {{-- <NOBR>{{ now()->format('d/m/Y H:i') }}</NOBR> --}}
            <NOBR>{{ $pedido->created_at->format('d/m/Y H:i') }}</NOBR>
        </td>
      </tr>
    </table>
    
    <br><br>
    
    <table cellspacing="0" cellpadding="0" border="1" style="margin-left: 12PX">
      <tr>
        <td class="cabecalho" align="center">CODIGO</td>
        <td class="cabecalho" align="center">PRODUTO</td>
        <td class="cabecalho    {{ $item->correiacor != null ? 'block' : 'hidden' }}" align="center">COR</td>
        <td class="cabecalho {{ $item->medida != null ? 'block' : 'hidden' }}" align="center">TAMANHO</td>
        <td class="cabecalho" align="center">QNDE</td>
  </tr>

  <tr>
  </tr>

    @foreach ($pedido->itemPedidos as $item)
        <tr>
            <td class="corpo" align="left">{{ $item->produtos->referencia }}</td>
            <td class="corpo" align="left">TRANSFER</td>
            <td class="corpo {{ $item->correiacor != null ? 'block' : 'hidden' }}" align="center">{{ $item->correiacor ?? '-' }}</td>
            <td class="corpo {{ $item->medida != null ? 'block' : 'hidden' }}" align="center">{{ $item->medida ?? '-' }}</td>
            <td class="corpo" align="center">{{ $item->quantidade }}</td>
            </tr>
            <tr>
        </tr>
    @endforeach
    
    <tr>
        <td class="destaque" colspan="2" align="right">TOTAL </td>
        <td class="destaque" align="center"><?php echo $totalQuantidade; ?></td>
    </tr>

</table>
@endforeach

<footer>
    <span style="font-size:9px; text-align: end">{{ now()->format('d/m/Y H:i') }}</span>
</footer>
</body>


</html>