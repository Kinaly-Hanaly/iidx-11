<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $version->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $version->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Versions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Scores'), ['controller' => 'Scores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Score'), ['controller' => 'Scores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tunes'), ['controller' => 'Tunes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tune'), ['controller' => 'Tunes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="versions form large-9 medium-8 columns content">
    <?= $this->Form->create($version) ?>
    <fieldset>
        <legend><?= __('Edit Version') ?></legend>
        <?php
            echo $this->Form->input('version_name');
            echo $this->Form->input('version_abbreviated_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
