<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="<?= h($class) ?> uk-alert">
    <a href="" class="uk-alert-close uk-close"></a>
    <p><?= $message ?></p>
</div>
