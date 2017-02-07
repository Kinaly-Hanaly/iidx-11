<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sheet'), ['action' => 'add']) ?></li>
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
<div class="sheets index large-9 medium-8 columns content">
    <h3><?= __('Sheets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sheet_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tune_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sheet_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('notes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('textage_url_1p') ?></th>
                <th scope="col"><?= $this->Paginator->sort('textage_url_2p') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sheets as $sheet): ?>
            <tr>
                <td><?= $this->Number->format($sheet->id) ?></td>
                <td><?= h($sheet->sheet_code) ?></td>
                <td><?= $sheet->has('tune') ? $this->Html->link($sheet->tune->title, ['controller' => 'Tunes', 'action' => 'view', $sheet->tune->id]) : '' ?></td>
                <td><?= $sheet->has('sheet_type') ? $this->Html->link($sheet->sheet_type->sheet_type_name, ['controller' => 'SheetTypes', 'action' => 'view', $sheet->sheet_type->id]) : '' ?></td>
                <td><?= $this->Number->format($sheet->notes) ?></td>
                <td><?= h($sheet->textage_url_1p) ?></td>
                <td><?= h($sheet->textage_url_2p) ?></td>
                <td><?= $this->Number->format($sheet->level) ?></td>
                <td><?= h($sheet->created) ?></td>
                <td><?= h($sheet->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sheet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sheet->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sheet->id)]) ?>
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
