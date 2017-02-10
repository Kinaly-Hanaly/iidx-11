<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message error uk-alert uk-alert-danger">
    <a href="" class="uk-alert-close uk-close"></a>
    <p><?= $message ?></p>
</div>
