<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Difficulty Themes Sheet'), ['action' => 'add']) ?></li>
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
<div class="difficultyThemesSheets index large-9 medium-8 columns content">
    <h3><?= __('Difficulty Themes Sheets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('sheet_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('difficulty_theme_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('difficulty_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('difficulty_rank_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($difficultyThemesSheets as $difficultyThemesSheet): ?>
            <tr>
                <td><?= $difficultyThemesSheet->has('sheet') ? $this->Html->link($difficultyThemesSheet->sheet->id, ['controller' => 'Sheets', 'action' => 'view', $difficultyThemesSheet->sheet->id]) : '' ?></td>
                <td><?= $difficultyThemesSheet->has('difficulty_theme') ? $this->Html->link($difficultyThemesSheet->difficulty_theme->id, ['controller' => 'DifficultyThemes', 'action' => 'view', $difficultyThemesSheet->difficulty_theme->id]) : '' ?></td>
                <td><?= $difficultyThemesSheet->has('difficulty_type') ? $this->Html->link($difficultyThemesSheet->difficulty_type->id, ['controller' => 'DifficultyTypes', 'action' => 'view', $difficultyThemesSheet->difficulty_type->id]) : '' ?></td>
                <td><?= $difficultyThemesSheet->has('difficulty_rank') ? $this->Html->link($difficultyThemesSheet->difficulty_rank->id, ['controller' => 'DifficultyRanks', 'action' => 'view', $difficultyThemesSheet->difficulty_rank->id]) : '' ?></td>
                <td><?= h($difficultyThemesSheet->created) ?></td>
                <td><?= h($difficultyThemesSheet->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $difficultyThemesSheet->sheet_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $difficultyThemesSheet->sheet_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $difficultyThemesSheet->sheet_id], ['confirm' => __('Are you sure you want to delete # {0}?', $difficultyThemesSheet->sheet_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
