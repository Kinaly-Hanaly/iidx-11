<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Difficulty Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Difficulty Themes Sheets'), ['controller' => 'DifficultyThemesSheets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Difficulty Themes Sheet'), ['controller' => 'DifficultyThemesSheets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="difficultyTypes index large-9 medium-8 columns content">
    <h3><?= __('Difficulty Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($difficultyTypes as $difficultyType): ?>
            <tr>
                <td><?= $this->Number->format($difficultyType->id) ?></td>
                <td><?= h($difficultyType->type_code) ?></td>
                <td><?= h($difficultyType->type_name) ?></td>
                <td><?= h($difficultyType->created) ?></td>
                <td><?= h($difficultyType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $difficultyType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $difficultyType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $difficultyType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $difficultyType->id)]) ?>
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
