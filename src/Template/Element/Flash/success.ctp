<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message success uk-alert uk-alert-success">
    <a href="" class="uk-alert-close uk-close"></a>
    <p><?= $message ?></p>
</div>
