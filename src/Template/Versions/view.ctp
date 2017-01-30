<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Version'), ['action' => 'edit', $version->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Version'), ['action' => 'delete', $version->id], ['confirm' => __('Are you sure you want to delete # {0}?', $version->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Versions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Version'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Scores'), ['controller' => 'Scores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Score'), ['controller' => 'Scores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tunes'), ['controller' => 'Tunes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tune'), ['controller' => 'Tunes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="versions view large-9 medium-8 columns content">
    <h3><?= h($version->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Version Name') ?></th>
            <td><?= h($version->version_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Version Abbreviated Name') ?></th>
            <td><?= h($version->version_abbreviated_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($version->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($version->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($version->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Scores') ?></h4>
        <?php if (!empty($version->scores)): ?>
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
            <?php foreach ($version->scores as $scores): ?>
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
    <div class="related">
        <h4><?= __('Related Tunes') ?></h4>
        <?php if (!empty($version->tunes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tune Code') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Version Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($version->tunes as $tunes): ?>
            <tr>
                <td><?= h($tunes->id) ?></td>
                <td><?= h($tunes->tune_code) ?></td>
                <td><?= h($tunes->title) ?></td>
                <td><?= h($tunes->version_id) ?></td>
                <td><?= h($tunes->created) ?></td>
                <td><?= h($tunes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tunes', 'action' => 'view', $tunes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tunes', 'action' => 'edit', $tunes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tunes', 'action' => 'delete', $tunes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tunes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
