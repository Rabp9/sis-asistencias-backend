<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Horarios Trabajadore'), ['action' => 'edit', $horariosTrabajadore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Horarios Trabajadore'), ['action' => 'delete', $horariosTrabajadore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $horariosTrabajadore->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Horarios Trabajadores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Horarios Trabajadore'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Horario'), ['controller' => 'Horarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="horariosTrabajadores view large-9 medium-8 columns content">
    <h3><?= h($horariosTrabajadore->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Horario') ?></th>
            <td><?= $horariosTrabajadore->has('horario') ? $this->Html->link($horariosTrabajadore->horario->id, ['controller' => 'Horarios', 'action' => 'view', $horariosTrabajadore->horario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trabajador Dni') ?></th>
            <td><?= h($horariosTrabajadore->trabajador_dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $horariosTrabajadore->has('estado') ? $this->Html->link($horariosTrabajadore->estado->id, ['controller' => 'Estados', 'action' => 'view', $horariosTrabajadore->estado->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($horariosTrabajadore->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FechaInicio') ?></th>
            <td><?= h($horariosTrabajadore->fechaInicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FechaFin') ?></th>
            <td><?= h($horariosTrabajadore->fechaFin) ?></td>
        </tr>
    </table>
</div>
