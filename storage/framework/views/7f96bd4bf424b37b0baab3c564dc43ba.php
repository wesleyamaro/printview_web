<div class="<?php echo e($cardClasses); ?>">
    <!--[if BLOCK]><![endif]--><?php if($header): ?>
        <?php echo e($header); ?>

    <?php elseif($title || $action): ?>
        <div class="<?php echo e($headerClasses); ?>">
            <h3 class="font-medium whitespace-normal text-md text-secondary-700 dark:text-secondary-400"><?php echo e($title); ?></h3>

            <!--[if BLOCK]><![endif]--><?php if($action): ?>
                <?php echo e($action); ?>

            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <div <?php echo e($attributes->merge(['class' => "{$padding} text-secondary-700 rounded-b-xl grow dark:text-secondary-400"])); ?>>
        <?php echo e($slot); ?>

    </div>

    <!--[if BLOCK]><![endif]--><?php if($footer): ?>
        <div class="<?php echo e($footerClasses); ?>">
            <?php echo e($footer); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH /home/u637911780/domains/printview.shop/vendor/wireui/wireui/src/Providers/../../resources/views/components/card.blade.php ENDPATH**/ ?>