<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Horarios Trabajadores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Horario'), ['controller' => 'Horarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="horariosTrabajadores form large-9 medium-8 columns content">
    <?= $this->Form->create($horariosTrabajadore) ?>
    <fieldset>
        <legend><?= __('Add Horarios Trabajadore') ?></legend>
        <?php
            echo $this->Form->control('horario_id', ['options' => $horarios]);
            echo $this->Form->control('trabajador_dni');
            echo $this->Form->control('estado_id', ['options' => $estados]);
            echo $this->Form->control('fechaInicio', ['empty' => true]);
            echo $this->Form->control('fechaFin', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
