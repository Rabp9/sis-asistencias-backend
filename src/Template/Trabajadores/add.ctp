<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Trabajadores'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="trabajadores form large-9 medium-8 columns content">
    <?= $this->Form->create($trabajadore) ?>
    <fieldset>
        <legend><?= __('Add Trabajadore') ?></legend>
        <?php
            echo $this->Form->control('nombres');
            echo $this->Form->control('apellidoPaterno');
            echo $this->Form->control('apellidoMaterno');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
