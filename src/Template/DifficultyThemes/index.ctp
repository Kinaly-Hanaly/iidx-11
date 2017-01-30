<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Difficulty Theme'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sheets'), ['controller' => 'Sheets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sheet'), ['controller' => 'Sheets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="difficultyThemes index large-9 medium-8 columns content">
    <h3><?= __('Difficulty Themes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('theme_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('theme_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($difficultyThemes as $difficultyTheme): ?>
            <tr>
                <td><?= $this->Number->format($difficultyTheme->id) ?></td>
                <td><?= h($difficultyTheme->theme_code) ?></td>
                <td><?= h($difficultyTheme->theme_name) ?></td>
                <td><?= h($difficultyTheme->created) ?></td>
                <td><?= h($difficultyTheme->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $difficultyTheme->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $difficultyTheme->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $difficultyTheme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $difficultyTheme->id)]) ?>
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
