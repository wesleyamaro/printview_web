<div name="wireui.select.option">
    <span name="wireui.select.option.data"><?php if (is_object($toArray()) || is_array($toArray())) { echo "JSON.parse(atob('".base64_encode(json_encode($toArray()))."'))"; } elseif (is_string($toArray())) { echo "'".str_replace("'", "\'", $toArray())."'"; } else { echo json_encode($toArray()); } ?></span>
    <!--[if BLOCK]><![endif]--><?php if(app()->runningUnitTests()): ?>
        <div dusk="select.option">
            <?php echo json_encode($toArray()); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($slot->isNotEmpty()): ?>
        <span name="wireui.select.slot"><?php echo e($slot); ?></span>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH /home/u637911780/domains/printview.shop/vendor/wireui/wireui/src/Providers/../../resources/views/components/select/option.blade.php ENDPATH**/ ?>