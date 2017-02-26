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
                ['action' => 'delete', $condicione->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $condicione->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Condiciones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="condiciones form large-9 medium-8 columns content">
    <?= $this->Form->create($condicione) ?>
    <fieldset>
        <legend><?= __('Edit Condicione') ?></legend>
        <?php
            echo $this->Form->control('descripcion');
            echo $this->Form->control('asistencia');
            echo $this->Form->control('tardanza');
            echo $this->Form->control('estado_id', ['options' => $estados]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
