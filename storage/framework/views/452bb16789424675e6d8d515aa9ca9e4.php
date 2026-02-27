


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

        <?php $__currentLoopData = $topClientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="corpo uppercase" align="left"><?php echo e($item->name); ?></td>
                <td class="corpo" align="center"><?php echo e($item->total_pedidos); ?></td>
                <td class="corpo" align="center"><?php echo e($item->total_items); ?></td>
                <td class="corpo" align="center"><?php echo e(\Carbon\Carbon::parse($item->ultimo_pedido)->format('d/m/Y')); ?></td>
            </tr>
            <tr>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
        <tr>
            <td class="destaque" colspan="1" align="right">TOTAL PEDIDOS</td>
            <td class="destaque" align="center"><?php echo e($totalPedidos); ?></td>
            <td class="destaque" colspan="1" align="right">TOTAL PARES</td>
            <td class="destaque" align="center"><?php echo e($totalQuantidade); ?></td>
        </tr>

    </table>

    </body>
</html><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/reporttopcliente.blade.php ENDPATH**/ ?>