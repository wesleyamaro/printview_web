




<!DOCTYPE html>

<?php
$totalQuantidade = 0;
$totalPedidos = 0;
$quantidadeItens = 0;
$contador = 1; // Inicializando o contador
?>

<html>

<head>
    <title>Pedidos | <?php echo e(now()->format('d/m/Y')); ?></title>
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

    <table cellspacing="0" cellpadding="1" border="1" >
        <tr>
            <td class="account p report" align="center" colspan="4">RELATÓRIO DE PEDIDOS</td>
        </tr>
        <tr>
            <td class="account p" align="left" colspan="4">MAPAS ANO - <?php echo e(now()->format('Y')); ?> - Periodo:
                <?php echo e(\Carbon\Carbon::parse($periodoInicial)->format('d/m/Y') . ' à ' . \Carbon\Carbon::parse($periodoFinal)->format('d/m/Y')); ?>

            </td>
        </tr>
    </table>

    <br>

    <table cellspacing="0" cellpadding="0" border="1" >
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

        <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="corpo uppercase" align="center"><?php echo e($contador++); ?></td>
                <td class="corpo uppercase" align="center"><?php echo e($pedido->id); ?></td>
                <td class="corpo uppercase" align="center"><?php echo e($pedido->pedido_modelo); ?></td>
                <td class="corpo uppercase" align="left"><?php echo e($pedido->user->name); ?></td>
                <td class="corpo uppercase" align="center"><?php echo e($pedido->itens->count()); ?></td>
                <td class="corpo uppercase" align="center"><?php echo e($pedido->itens->sum('quantidade')); ?></td>
                <td class="corpo capitalize" align="center"><?php echo e($pedido->status); ?></td>
                <td class="corpo" align="center"><?php echo e(\Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y')); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <tr>
            <td class="destaque" align="right" colspan="4">TOTAL</td>
            <td class="destaque" align="center"><?php echo e($totalItens); ?></td>
            <td class="destaque" align="center"><?php echo e($somaItens); ?></td>
            <td class="destaque" align="center" colspan="2">-</td>
        </tr>
    </table>

    <footer>
        <span style="font-size:9px; text-align: end"><?php echo e(now()->format('d/m/Y H:i')); ?></span>
    </footer>
</body>

</html>
<?php /**PATH /home/u637911780/domains/printview.shop/resources/views/livewire/pedidos/report-all-pedidos.blade.php ENDPATH**/ ?>