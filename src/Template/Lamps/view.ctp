<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lamp'), ['action' => 'edit', $lamp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lamp'), ['action' => 'delete', $lamp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lamp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lamps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lamp'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Scores'), ['controller' => 'Scores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Score'), ['controller' => 'Scores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lamps view large-9 medium-8 columns content">
    <h3><?= h($lamp->lamp_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Lamp Code') ?></th>
            <td><?= h($lamp->lamp_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lamp Name') ?></th>
            <td><?= h($lamp->lamp_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lamp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lamp Score') ?></th>
            <td><?= $this->Number->format($lamp->lamp_score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($lamp->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($lamp->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Scores') ?></h4>
        <?php if (!empty($lamp->scores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Sheet Id') ?></th>
                <th scope="col"><?= __('Version Id') ?></th>
                <th scope="col"><?= __('Lamp Id') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col"><?= __('Bp') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($lamp->scores as $scores): ?>
            <tr>
                <td><?= h($scores->id) ?></td>
                <td><?= h($scores->user_id) ?></td>
                <td><?= h($scores->sheet_id) ?></td>
                <td><?= h($scores->version_id) ?></td>
                <td><?= h($scores->lamp_id) ?></td>
                <td><?= h($scores->score) ?></td>
                <td><?= h($scores->bp) ?></td>
                <td><?= h($scores->created) ?></td>
                <td><?= h($scores->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Scores', 'action' => 'view', $scores->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Scores', 'action' => 'edit', $scores->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Scores', 'action' => 'delete', $scores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scores->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
