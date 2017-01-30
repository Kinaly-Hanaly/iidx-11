<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Lamps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Scores'), ['controller' => 'Scores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Score'), ['controller' => 'Scores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lamps form large-9 medium-8 columns content">
    <?= $this->Form->create($lamp) ?>
    <fieldset>
        <legend><?= __('Add Lamp') ?></legend>
        <?php
            echo $this->Form->input('lamp_code');
            echo $this->Form->input('lamp_name');
            echo $this->Form->input('lamp_score');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
