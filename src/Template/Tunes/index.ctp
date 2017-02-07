<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tune'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Versions'), ['controller' => 'Versions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Version'), ['controller' => 'Versions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sheets'), ['controller' => 'Sheets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sheet'), ['controller' => 'Sheets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tunes index large-9 medium-8 columns content">
    <h3><?= __('Tunes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tune_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('version_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tunes as $tune): ?>
            <tr>
                <td><?= $this->Number->format($tune->id) ?></td>
                <td><?= h($tune->tune_code) ?></td>
                <td><?= h($tune->title) ?></td>
                <td><?= $tune->has('version') ? $this->Html->link($tune->version->version_name, ['controller' => 'Versions', 'action' => 'view', $tune->version->id]) : '' ?></td>
                <td><?= h($tune->created) ?></td>
                <td><?= h($tune->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tune->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tune->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tune->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tune->id)]) ?>
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
