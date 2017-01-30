<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sheetType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sheetType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sheet Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sheets'), ['controller' => 'Sheets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sheet'), ['controller' => 'Sheets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sheetTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($sheetType) ?>
    <fieldset>
        <legend><?= __('Edit Sheet Type') ?></legend>
        <?php
            echo $this->Form->input('sheet_type_code');
            echo $this->Form->input('sheet_type_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
