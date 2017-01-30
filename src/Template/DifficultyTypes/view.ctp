<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Difficulty Type'), ['action' => 'edit', $difficultyType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Difficulty Type'), ['action' => 'delete', $difficultyType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $difficultyType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Difficulty Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Difficulty Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Difficulty Themes Sheets'), ['controller' => 'DifficultyThemesSheets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Difficulty Themes Sheet'), ['controller' => 'DifficultyThemesSheets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="difficultyTypes view large-9 medium-8 columns content">
    <h3><?= h($difficultyType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type Code') ?></th>
            <td><?= h($difficultyType->type_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type Name') ?></th>
            <td><?= h($difficultyType->type_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($difficultyType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($difficultyType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($difficultyType->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Difficulty Themes Sheets') ?></h4>
        <?php if (!empty($difficultyType->difficulty_themes_sheets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Sheet Id') ?></th>
                <th scope="col"><?= __('Difficulty Theme Id') ?></th>
                <th scope="col"><?= __('Difficulty Type Id') ?></th>
                <th scope="col"><?= __('Difficulty Rank Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($difficultyType->difficulty_themes_sheets as $difficultyThemesSheets): ?>
            <tr>
                <td><?= h($difficultyThemesSheets->sheet_id) ?></td>
                <td><?= h($difficultyThemesSheets->difficulty_theme_id) ?></td>
                <td><?= h($difficultyThemesSheets->difficulty_type_id) ?></td>
                <td><?= h($difficultyThemesSheets->difficulty_rank_id) ?></td>
                <td><?= h($difficultyThemesSheets->created) ?></td>
                <td><?= h($difficultyThemesSheets->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DifficultyThemesSheets', 'action' => 'view', $difficultyThemesSheets->sheet_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DifficultyThemesSheets', 'action' => 'edit', $difficultyThemesSheets->sheet_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DifficultyThemesSheets', 'action' => 'delete', $difficultyThemesSheets->sheet_id], ['confirm' => __('Are you sure you want to delete # {0}?', $difficultyThemesSheets->sheet_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
