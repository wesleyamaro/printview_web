{{-- <!DOCTYPE html>

<html>

<head>

</head>
<style type="text/css">
    td {
        background-color: #FFFFFF;
        font-weight: bold;
        font-family: courie prime;
        font-size: 1Opx;
        font-weight: 500;
    }

    .account {
        background-color: #EEEEEE;
        font-weight: bold;
        font-family: courie prime;
        color: #0066FF;
        font-size: 12PX;
    }

    .titulo {
        letter-spacing: normal;
        text-align: center;
        background-color: #FF7F00;
        font-family: courie prime;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 12PX;
    }

    .cabecalho {
        background-color: #FFCC33;
        font-weight: bold;
        font-family: Verdana, Arial, Helvetica, sans-serif;
        color: #0066FF;
        font-size: 12px;
        padding-left: 4px;
        padding-right: 4px;
    }

    .destaque {
        background-color: #FFFF99;
        font-family: courie prime;
        font-size: 12PX;
        font-weight: bold;
        padding-left: 12PX;
        padding-right: 12PX;
    }

    .destaque_aux {
        background-color: #FFCC33;
        font-family: courie prime;
        font-size: 12PX;
        font-weight: bold;
        padding-left: 12PX;
        padding-right: 12PX;
    }

    .corpo {
        background-color: #FFFFDD;
        font-family: courie prime;
        font-size: 12PX;
        font-weight: 500;
        padding-left: 12PX;
        padding-right: 12PX;
    }

    .uppercase {
        text-transform: uppercase;
    }

    div {
        left: 43px;
        position: relative;
    }
</style>

<body bgcolor=#ffffff>

    <table cellspacing="0" cellpadding="0" border="1" style="margin-left: 12PX">
        <tr>
            <td class="cabecalho" align="center">Nº MODELO</td>
            <td class="cabecalho" align="center">CLIENTE</td>
            <td class="cabecalho" align="center">STATUS</td>
            <td class="cabecalho" align="center">CADASTRADO EM</td>
        </tr>

        <tr>
        </tr>

        @foreach ($pedidos as $pedido)
            <tr>
                <td class="corpo" align="left">{{ $pedido->pedido_modelo }}</td>
                <td class="corpo uppercase" align="left">{{ $pedido->usuario->name }}</td>
                <td class="corpo uppercase" align="left">{{ $pedido->quantidade }}</td>
                <td class="corpo uppercase" align="left">{{ $pedido->total_itens }}</td>
                <td class="corpo uppercase" align="left">{{ $pedido->status }}</td>
                <td class="corpo" align="center">{{ $pedido->created_at->format('d/m/Y H:i') }}</td>

            </tr>
            <tr>
            </tr>
        @endforeach

        <tr>
            <td class="destaque" colspan="2" align="right">TOTAL PEDIDOS</td>
            <td class="destaque" colspan="2" align="left">{{ $pedidos->count() }} </td>
            
        </tr>

    </table>


    <footer>
        <span style="font-size:9px; text-align: end">{{ now()->format('d/m/Y H:i') }}</span>
    </footer>
</body>


</html>
 --}}




<!DOCTYPE html>

<?php
$totalQuantidade = 0;
$totalPedidos = 0;
$quantidadeItens = 0;
$contador = 1; // Inicializando o contador
?>

<html>

<head>
    <title>Pedidos | {{ now()->format('d/m/Y') }}</title>
</head>
<style type="text/css">
    td {
        background-color: #FFFFFF;
        font-weight: bold;
        font-family: courie prime;
        font-size: 1Opx;
        font-weight: 500;
    }

    .account {
        background-color: #EEEEEE;
        font-weight: bold;
        font-family: courie prime;
        color: #0066FF;
        font-size: 12PX;
    }

    .titulo {
        letter-spacing: normal;
        text-align: center;
        background-color: #FF7F00;
        font-family: courie prime;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 12PX;
    }

    .cabecalho {
        background-color: #FFCC33;
        font-weight: bold;
        font-family: Verdana, Arial, Helvetica, sans-serif;
        color: #0066FF;
        font-size: 12px;
        padding-left: 4px;
        padding-right: 4px;
    }

    .destaque {
        background-color: #FFFF99;
        font-family: courie prime;
        font-size: 12PX;
        font-weight: bold;
        padding-left: 12PX;
        padding-right: 12PX;
    }

    .destaque_aux {
        background-color: #FFCC33;
        font-family: courie prime;
        font-size: 12PX;
        font-weight: bold;
        padding-left: 12PX;
        padding-right: 12PX;
    }

    .corpo {
        background-color: #FFFFDD;
        font-family: courie prime;
        font-size: 12PX;
        font-weight: 500;
        padding-left: 12PX;
        padding-right: 12PX;
    }

    .uppercase {
        text-transform: uppercase;
    }

    .capitalize {
        text-transform: capitalize;
    }

    .p {
        padding-left: 10px;
        padding-right: 10px;
    }

    .report {
        font-size: 16px;
        color: black;
    }

    div {
        left: 43px;
        position: relative;
    }
</style>

<body bgcolor=#ffffff>

    <table cellspacing="0" cellpadding="1" border="1" {{-- style="margin-left: 12PX" --}}>
        <tr>
            <td class="account p report" align="center" colspan="4">RELATÓRIO DE PEDIDOS</td>
        </tr>
        <tr>
            <td class="account p" align="left" colspan="4">MAPAS ANO - {{ now()->format('Y') }} - Periodo:
                {{ \Carbon\Carbon::parse($periodoInicial)->format('d/m/Y') . ' à ' . \Carbon\Carbon::parse($periodoFinal)->format('d/m/Y') }}
            </td>
        </tr>
    </table>

    <br>

    <table cellspacing="0" cellpadding="0" border="1" {{-- style="margin-left: 12PX" --}}>
        <tr>
            <td class="cabecalho" align="center">*</td>
            <td class="cabecalho" align="center">ID</td>
            <td class="cabecalho" align="center">Nº MODELO</td>
            <td class="cabecalho" align="center">CLIENTE</td>
            <td class="cabecalho" align="center">ITENS</td>
            <td class="cabecalho" align="center">PARES</td>
            <td class="cabecalho" align="center">STATUS</td>
            <td class="cabecalho" align="center">CRIADO</td>
        </tr>

        @foreach ($pedidos as $pedido)
            <tr>
                <td class="corpo uppercase" align="center">{{ $contador++ }}</td>
                <td class="corpo uppercase" align="center">{{ $pedido->id }}</td>
                <td class="corpo uppercase" align="center">{{ $pedido->pedido_modelo }}</td>
                <td class="corpo uppercase" align="left">{{ $pedido->user->name }}</td>
                <td class="corpo uppercase" align="center">{{ $pedido->itens->count() }}</td>
                <td class="corpo uppercase" align="center">{{ $pedido->itens->sum('quantidade') }}</td>
                <td class="corpo capitalize" align="center">{{ $pedido->status }}</td>
                <td class="corpo" align="center">{{ \Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y') }}
                </td>
            </tr>
        @endforeach

        <tr>
            <td class="destaque" align="right" colspan="4">TOTAL</td>
            <td class="destaque" align="center">{{ $totalItens }}</td>
            <td class="destaque" align="center">{{ $somaItens }}</td>
            <td class="destaque" align="center" colspan="2">-</td>
        </tr>
    </table>

    <footer>
        <span style="font-size:9px; text-align: end">{{ now()->format('d/m/Y H:i') }}</span>
    </footer>
</body>

</html>
