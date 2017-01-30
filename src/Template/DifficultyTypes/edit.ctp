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
                ['action' => 'delete', $difficultyType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $difficultyType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Difficulty Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Difficulty Themes Sheets'), ['controller' => 'DifficultyThemesSheets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Difficulty Themes Sheet'), ['controller' => 'DifficultyThemesSheets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="difficultyTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($difficultyType) ?>
    <fieldset>
        <legend><?= __('Edit Difficulty Type') ?></legend>
        <?php
            echo $this->Form->input('type_code');
            echo $this->Form->input('type_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
