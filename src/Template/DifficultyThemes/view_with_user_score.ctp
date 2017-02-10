<div id="wrap">
    <h1><?= h($difficultyTheme->theme_name) ?> - <?= h($user->djname) ?>(<?= h($user->iidxid) ?>)</h1>
    <p>Login as <?= h($login_user['djname']) ?></p>
    <?php foreach ($difficultyTheme->difficulty_themes_sheets as $difficulty => $sheets) : ?>

    <h2><?= h($difficulty) ?></h2>
    <ul class="uk-grid .uk-grid-collapse uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-5" data-uk-grid-margin>
        <?php foreach ($sheets as $sheet) : ?>
            <li><div class="uk-panel uk-panel-box sheet-tile lamp-<?= isset($sheet->scores[0]->lamp) ? h(mb_strtolower($sheet->scores[0]->lamp->lamp_code)) : 'n' ?>">
                <?= h($sheet->tune->title) ?> [<?= h($sheet->sheet_type->sheet_type_code) ?>]
                <?php if(isset($login_user['id']) && ($login_user['id'] == $user['id'])): ?>
                    <?php if(isset($sheet->scores[0]->id)): ?>
                        <?php echo $this->Form->create($sheet->scores[0], ['url' => ['controller' => 'Scores', 'action' => 'edit'], 'class' => 'uk-form']); ?>
                    <?php else: ?>
                        <?php echo $this->Form->create($sheet->scores[0], ['url' => ['controller' => 'Scores', 'action' => 'add'], 'class' => 'uk-form']); ?>
                        <?php echo $this->Form->hidden('user_id'); ?>
                        <?php echo $this->Form->hidden('sheet_id'); ?>
                    <?php endif; ?>
                    <?php echo $this->Form->input('lamp_id', ['label' => false, 'options' => $lamps, 'onchange' => 'UIkit.modal.blockUI(\'<i class="uk-icon-spin .uk-icon-large"></i>Saving...\'); this.form.submit();']); ?>
                    <?= $this->Form->end() ?>
                <?php endif; ?>
            </div></li>
        <?php endforeach; ?>
    </ul>
    <?php endforeach; ?>
</div><!-- #wrap -->
