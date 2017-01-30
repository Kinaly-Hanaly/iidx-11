<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Difficulty Themes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sheets'), ['controller' => 'Sheets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sheet'), ['controller' => 'Sheets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="difficultyThemes form large-9 medium-8 columns content">
    <?= $this->Form->create($difficultyTheme) ?>
    <fieldset>
        <legend><?= __('Add Difficulty Theme') ?></legend>
        <?php
            echo $this->Form->input('theme_code');
            echo $this->Form->input('theme_name');
            echo $this->Form->input('sheets._ids', ['options' => $sheets]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
