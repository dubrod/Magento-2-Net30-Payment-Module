<?php

$instructions = $block->getInstructions();
?>
<?php if ($instructions) : ?>
    <?php $methodCode = $block->escapeHtml($block->getMethodCode());?>
    <div class="items <?= /* @noEscape */ $methodCode ?> instructions agreement" id="payment_form_<?= /* @noEscape */ $methodCode ?>" style="display: none;">
        <?= /* @noEscape */ nl2br($block->escapeHtml($instructions)) ?>
    </div>
<?php endif; ?>
