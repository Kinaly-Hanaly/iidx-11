<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sheet Type'), ['action' => 'edit', $sheetType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sheet Type'), ['action' => 'delete', $sheetType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sheetType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sheet Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sheet Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sheets'), ['controller' => 'Sheets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sheet'), ['controller' => 'Sheets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sheetTypes view large-9 medium-8 columns content">
    <h3><?= h($sheetType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sheet Type Code') ?></th>
            <td><?= h($sheetType->sheet_type_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sheet Type Name') ?></th>
            <td><?= h($sheetType->sheet_type_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sheetType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sheetType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sheetType->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sheets') ?></h4>
        <?php if (!empty($sheetType->sheets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sheet Code') ?></th>
                <th scope="col"><?= __('Tune Id') ?></th>
                <th scope="col"><?= __('Play Type') ?></th>
                <th scope="col"><?= __('Sheet Type Id') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Textage Url 1p') ?></th>
                <th scope="col"><?= __('Textage Url 2p') ?></th>
                <th scope="col"><?= __('Level') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sheetType->sheets as $sheets): ?>
            <tr>
                <td><?= h($sheets->id) ?></td>
                <td><?= h($sheets->sheet_code) ?></td>
                <td><?= h($sheets->tune_id) ?></td>
                <td><?= h($sheets->play_type) ?></td>
                <td><?= h($sheets->sheet_type_id) ?></td>
                <td><?= h($sheets->notes) ?></td>
                <td><?= h($sheets->textage_url_1p) ?></td>
                <td><?= h($sheets->textage_url_2p) ?></td>
                <td><?= h($sheets->level) ?></td>
                <td><?= h($sheets->created) ?></td>
                <td><?= h($sheets->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sheets', 'action' => 'view', $sheets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sheets', 'action' => 'edit', $sheets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sheets', 'action' => 'delete', $sheets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sheets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
