<!DOCTYPE html>




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
        
        

    <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    
    <table cellspacing="0" cellpadding="0" border="1" style="margin-left: 12PX">
      <tr>
        <td class="account" align="left" colspan="2">MAPAS ANO - <?php echo e(now()->format('Y')); ?></td>
      </tr>
      <tr>
        <td class="account uppercase" align="left">
            <NOBR>
            CLIENTE: <?php echo e($pedido->usuario->name); ?>

            
             <BR>PEDIDO: <?php echo e('#'. $pedido->id .' - ' .$pedido->pedido_modelo); ?>

            </NOBR>
        </td>
        <td width="70" class="account" align="center">
            
            <NOBR><?php echo e($pedido->created_at->format('d/m/Y H:i')); ?></NOBR>
        </td>
      </tr>
    </table>
    
    <br><br>
    
    <table cellspacing="0" cellpadding="0" border="1" style="margin-left: 12PX">
      <tr>
        <td class="cabecalho" align="center">CODIGO</td>
        <td class="cabecalho" align="center">PRODUTO</td>
        <td class="cabecalho    <?php echo e($item->correiacor != null ? 'block' : 'hidden'); ?>" align="center">COR</td>
        <td class="cabecalho <?php echo e($item->medida != null ? 'block' : 'hidden'); ?>" align="center">TAMANHO</td>
        <td class="cabecalho" align="center">QNDE</td>
  </tr>

  <tr>
  </tr>

    <?php $__currentLoopData = $pedido->itemPedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="corpo" align="left"><?php echo e($item->produtos->referencia); ?></td>
            <td class="corpo" align="left">TRANSFER</td>
            <td class="corpo <?php echo e($item->correiacor != null ? 'block' : 'hidden'); ?>" align="center"><?php echo e($item->correiacor ?? '-'); ?></td>
            <td class="corpo <?php echo e($item->medida != null ? 'block' : 'hidden'); ?>" align="center"><?php echo e($item->medida ?? '-'); ?></td>
            <td class="corpo" align="center"><?php echo e($item->quantidade); ?></td>
            </tr>
            <tr>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <tr>
        <td class="destaque" colspan="2" align="right">TOTAL </td>
        <td class="destaque" align="center"><?php echo $totalQuantidade; ?></td>
    </tr>

</table>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<footer>
    <span style="font-size:9px; text-align: end"><?php echo e(now()->format('d/m/Y H:i')); ?></span>
</footer>
</body>


</html><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/reportpedido.blade.php ENDPATH**/ ?>