<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sheet'), ['action' => 'edit', $sheet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sheet'), ['action' => 'delete', $sheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sheet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sheets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sheet'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tunes'), ['controller' => 'Tunes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tune'), ['controller' => 'Tunes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sheet Types'), ['controller' => 'SheetTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sheet Type'), ['controller' => 'SheetTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Scores'), ['controller' => 'Scores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Score'), ['controller' => 'Scores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Difficulty Themes'), ['controller' => 'DifficultyThemes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Difficulty Theme'), ['controller' => 'DifficultyThemes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sheets view large-9 medium-8 columns content">
    <h3><?= h($sheet->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sheet Code') ?></th>
            <td><?= h($sheet->sheet_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tune') ?></th>
            <td><?= $sheet->has('tune') ? $this->Html->link($sheet->tune->title, ['controller' => 'Tunes', 'action' => 'view', $sheet->tune->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sheet Type') ?></th>
            <td><?= $sheet->has('sheet_type') ? $this->Html->link($sheet->sheet_type->id, ['controller' => 'SheetTypes', 'action' => 'view', $sheet->sheet_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Textage Url 1p') ?></th>
            <td><?= h($sheet->textage_url_1p) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Textage Url 2p') ?></th>
            <td><?= h($sheet->textage_url_2p) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sheet->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notes') ?></th>
            <td><?= $this->Number->format($sheet->notes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $this->Number->format($sheet->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sheet->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sheet->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Play Type') ?></h4>
        <?= $this->Text->autoParagraph(h($sheet->play_type)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Scores') ?></h4>
        <?php if (!empty($sheet->scores)): ?>
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
            <?php foreach ($sheet->scores as $scores): ?>
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
        <h4><?= __('Related Difficulty Themes') ?></h4>
        <?php if (!empty($sheet->difficulty_themes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Theme Code') ?></th>
                <th scope="col"><?= __('Theme Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sheet->difficulty_themes as $difficultyThemes): ?>
            <tr>
                <td><?= h($difficultyThemes->id) ?></td>
                <td><?= h($difficultyThemes->theme_code) ?></td>
                <td><?= h($difficultyThemes->theme_name) ?></td>
                <td><?= h($difficultyThemes->created) ?></td>
                <td><?= h($difficultyThemes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DifficultyThemes', 'action' => 'view', $difficultyThemes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DifficultyThemes', 'action' => 'edit', $difficultyThemes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DifficultyThemes', 'action' => 'delete', $difficultyThemes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $difficultyThemes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
