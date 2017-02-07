<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Difficulty Rank'), ['action' => 'edit', $difficultyRank->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Difficulty Rank'), ['action' => 'delete', $difficultyRank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $difficultyRank->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Difficulty Ranks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Difficulty Rank'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Difficulty Themes Sheets'), ['controller' => 'DifficultyThemesSheets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Difficulty Themes Sheet'), ['controller' => 'DifficultyThemesSheets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="difficultyRanks view large-9 medium-8 columns content">
    <h3><?= h($difficultyRank->rank_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rank Code') ?></th>
            <td><?= h($difficultyRank->rank_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rank Name') ?></th>
            <td><?= h($difficultyRank->rank_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($difficultyRank->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rank Score') ?></th>
            <td><?= $this->Number->format($difficultyRank->rank_score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($difficultyRank->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($difficultyRank->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Difficulty Themes Sheets') ?></h4>
        <?php if (!empty($difficultyRank->difficulty_themes_sheets)): ?>
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
            <?php foreach ($difficultyRank->difficulty_themes_sheets as $difficultyThemesSheets): ?>
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
