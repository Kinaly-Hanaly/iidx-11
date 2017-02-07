<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Difficulty Themes Sheet'), ['action' => 'edit', $difficultyThemesSheet->sheet_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Difficulty Themes Sheet'), ['action' => 'delete', $difficultyThemesSheet->sheet_id], ['confirm' => __('Are you sure you want to delete # {0}?', $difficultyThemesSheet->sheet_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Difficulty Themes Sheets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Difficulty Themes Sheet'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sheets'), ['controller' => 'Sheets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sheet'), ['controller' => 'Sheets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Difficulty Themes'), ['controller' => 'DifficultyThemes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Difficulty Theme'), ['controller' => 'DifficultyThemes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Difficulty Types'), ['controller' => 'DifficultyTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Difficulty Type'), ['controller' => 'DifficultyTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Difficulty Ranks'), ['controller' => 'DifficultyRanks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Difficulty Rank'), ['controller' => 'DifficultyRanks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="difficultyThemesSheets view large-9 medium-8 columns content">
    <h3><?= h($difficultyThemesSheet->sheet_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sheet') ?></th>
            <td><?= $difficultyThemesSheet->has('sheet') ? $this->Html->link($difficultyThemesSheet->sheet->display_name, ['controller' => 'Sheets', 'action' => 'view', $difficultyThemesSheet->sheet->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Difficulty Theme') ?></th>
            <td><?= $difficultyThemesSheet->has('difficulty_theme') ? $this->Html->link($difficultyThemesSheet->difficulty_theme->theme_name, ['controller' => 'DifficultyThemes', 'action' => 'view', $difficultyThemesSheet->difficulty_theme->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Difficulty Type') ?></th>
            <td><?= $difficultyThemesSheet->has('difficulty_type') ? $this->Html->link($difficultyThemesSheet->difficulty_type->type_name, ['controller' => 'DifficultyTypes', 'action' => 'view', $difficultyThemesSheet->difficulty_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Difficulty Rank') ?></th>
            <td><?= $difficultyThemesSheet->has('difficulty_rank') ? $this->Html->link($difficultyThemesSheet->difficulty_rank->rank_name, ['controller' => 'DifficultyRanks', 'action' => 'view', $difficultyThemesSheet->difficulty_rank->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($difficultyThemesSheet->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($difficultyThemesSheet->modified) ?></td>
        </tr>
    </table>
</div>
