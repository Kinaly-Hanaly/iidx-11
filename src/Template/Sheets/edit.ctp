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
                ['action' => 'delete', $sheet->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sheet->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sheets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tunes'), ['controller' => 'Tunes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tune'), ['controller' => 'Tunes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sheet Types'), ['controller' => 'SheetTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sheet Type'), ['controller' => 'SheetTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Scores'), ['controller' => 'Scores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Score'), ['controller' => 'Scores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Difficulty Themes'), ['controller' => 'DifficultyThemes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Difficulty Theme'), ['controller' => 'DifficultyThemes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sheets form large-9 medium-8 columns content">
    <?= $this->Form->create($sheet) ?>
    <fieldset>
        <legend><?= __('Edit Sheet') ?></legend>
        <?php
            echo $this->Form->input('sheet_code');
            echo $this->Form->input('tune_id', ['options' => $tunes]);
            echo $this->Form->input('play_type');
            echo $this->Form->input('sheet_type_id', ['options' => $sheetTypes]);
            echo $this->Form->input('notes');
            echo $this->Form->input('textage_url_1p');
            echo $this->Form->input('textage_url_2p');
            echo $this->Form->input('level');
            echo $this->Form->input('difficulty_themes._ids', ['options' => $difficultyThemes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
