<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lamp'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Scores'), ['controller' => 'Scores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Score'), ['controller' => 'Scores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lamps index large-9 medium-8 columns content">
    <h3><?= __('Lamps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lamp_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lamp_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lamp_score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lamps as $lamp): ?>
            <tr>
                <td><?= $this->Number->format($lamp->id) ?></td>
                <td><?= h($lamp->lamp_code) ?></td>
                <td><?= h($lamp->lamp_name) ?></td>
                <td><?= $this->Number->format($lamp->lamp_score) ?></td>
                <td><?= h($lamp->created) ?></td>
                <td><?= h($lamp->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lamp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lamp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lamp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lamp->id)]) ?>
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
