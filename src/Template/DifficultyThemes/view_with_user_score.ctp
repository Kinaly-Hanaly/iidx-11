<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Difficulty Theme'), ['action' => 'edit', $difficultyTheme->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Difficulty Theme'), ['action' => 'delete', $difficultyTheme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $difficultyTheme->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Difficulty Themes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Difficulty Theme'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sheets'), ['controller' => 'Sheets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sheet'), ['controller' => 'Sheets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="difficultyThemes view large-9 medium-8 columns content">
    <h3><?= h($difficultyTheme->theme_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Theme Code') ?></th>
            <td><?= h($difficultyTheme->theme_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Theme Name') ?></th>
            <td><?= h($difficultyTheme->theme_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($difficultyTheme->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($difficultyTheme->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($difficultyTheme->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sheets') ?></h4>
        <?php if (!empty($difficultyTheme->sheets)): ?>
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
            <?php foreach ($difficultyTheme->sheets as $sheets): ?>
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
