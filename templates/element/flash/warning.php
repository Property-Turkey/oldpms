<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message warning" onclick="this.classList.add('hidden');">
    <span>
        <h3><?=__('system_message')?></h3> 
        <i class="fas fa-times"></i> 
        <?= $message ?>
    </span>
</div>
