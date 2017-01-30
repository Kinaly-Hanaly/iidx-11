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
                ['action' => 'delete', $difficultyRank->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $difficultyRank->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Difficulty Ranks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Difficulty Themes Sheets'), ['controller' => 'DifficultyThemesSheets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Difficulty Themes Sheet'), ['controller' => 'DifficultyThemesSheets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="difficultyRanks form large-9 medium-8 columns content">
    <?= $this->Form->create($difficultyRank) ?>
    <fieldset>
        <legend><?= __('Edit Difficulty Rank') ?></legend>
        <?php
            echo $this->Form->input('rank_code');
            echo $this->Form->input('rank_name');
            echo $this->Form->input('rank_score');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
