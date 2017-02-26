<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Registros'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Condiciones'), ['controller' => 'Condiciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Condicione'), ['controller' => 'Condiciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="registros form large-9 medium-8 columns content">
    <?= $this->Form->create($registro) ?>
    <fieldset>
        <legend><?= __('Add Registro') ?></legend>
        <?php
            echo $this->Form->control('trabajador_dni');
            echo $this->Form->control('condicion_id', ['options' => $condiciones, 'empty' => true]);
            echo $this->Form->control('fecha');
            echo $this->Form->control('horario_hora_in', ['empty' => true]);
            echo $this->Form->control('horario_hora_out', ['empty' => true]);
            echo $this->Form->control('observacion');
            echo $this->Form->control('hora_in', ['empty' => true]);
            echo $this->Form->control('hora_out', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
