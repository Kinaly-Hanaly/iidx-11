<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Difficulty Themes Sheets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sheets'), ['controller' => 'Sheets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sheet'), ['controller' => 'Sheets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Difficulty Themes'), ['controller' => 'DifficultyThemes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Difficulty Theme'), ['controller' => 'DifficultyThemes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Difficulty Types'), ['controller' => 'DifficultyTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Difficulty Type'), ['controller' => 'DifficultyTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Difficulty Ranks'), ['controller' => 'DifficultyRanks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Difficulty Rank'), ['controller' => 'DifficultyRanks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="difficultyThemesSheets form large-9 medium-8 columns content">
    <?= $this->Form->create($difficultyThemesSheet) ?>
    <fieldset>
        <legend><?= __('Add Difficulty Themes Sheet') ?></legend>
        <?php
            echo $this->Form->input('difficulty_type_id', ['options' => $difficultyTypes, 'empty' => true]);
            echo $this->Form->input('difficulty_rank_id', ['options' => $difficultyRanks, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
