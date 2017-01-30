<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Score'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sheets'), ['controller' => 'Sheets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sheet'), ['controller' => 'Sheets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Versions'), ['controller' => 'Versions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Version'), ['controller' => 'Versions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lamps'), ['controller' => 'Lamps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lamp'), ['controller' => 'Lamps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="scores index large-9 medium-8 columns content">
    <h3><?= __('Scores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sheet_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('version_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lamp_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scores as $score): ?>
            <tr>
                <td><?= $this->Number->format($score->id) ?></td>
                <td><?= $score->has('user') ? $this->Html->link($score->user->id, ['controller' => 'Users', 'action' => 'view', $score->user->id]) : '' ?></td>
                <td><?= $score->has('sheet') ? $this->Html->link($score->sheet->id, ['controller' => 'Sheets', 'action' => 'view', $score->sheet->id]) : '' ?></td>
                <td><?= $score->has('version') ? $this->Html->link($score->version->id, ['controller' => 'Versions', 'action' => 'view', $score->version->id]) : '' ?></td>
                <td><?= $score->has('lamp') ? $this->Html->link($score->lamp->id, ['controller' => 'Lamps', 'action' => 'view', $score->lamp->id]) : '' ?></td>
                <td><?= $this->Number->format($score->score) ?></td>
                <td><?= $this->Number->format($score->bp) ?></td>
                <td><?= h($score->created) ?></td>
                <td><?= h($score->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $score->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $score->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $score->id], ['confirm' => __('Are you sure you want to delete # {0}?', $score->id)]) ?>
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
